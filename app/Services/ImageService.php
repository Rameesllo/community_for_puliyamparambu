<?php

namespace App\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;

class ImageService
{
    /**
     * Compress an uploaded image, store it in the database, and return the File model.
     *
     * The image is resized to fit within $maxDimension x $maxDimension pixels
     * and compressed to JPEG at $quality (0–100). This typically shrinks a
     * 1MB photo down to around 10–30 KB.
     */
    public function compressAndStore(UploadedFile $uploadedFile, int $maxDimension = 400, int $quality = 60): File
    {
        $sourcePath = $uploadedFile->getRealPath();
        $mimeType = $uploadedFile->getMimeType();

        // Load image into GD based on type
        $source = match (true) {
            str_contains($mimeType, 'jpeg'), str_contains($mimeType, 'jpg') => imagecreatefromjpeg($sourcePath),
            str_contains($mimeType, 'png') => imagecreatefrompng($sourcePath),
            str_contains($mimeType, 'gif') => imagecreatefromgif($sourcePath),
            str_contains($mimeType, 'webp') => imagecreatefromwebp($sourcePath),
            default => imagecreatefromjpeg($sourcePath),
        };

        [$origWidth, $origHeight] = getimagesize($sourcePath);

        // Calculate new dimensions keeping aspect ratio
        if ($origWidth > $origHeight) {
            $newWidth = min($origWidth, $maxDimension);
            $newHeight = (int) round($origHeight * ($newWidth / $origWidth));
        } else {
            $newHeight = min($origHeight, $maxDimension);
            $newWidth = (int) round($origWidth * ($newHeight / $origHeight));
        }

        // Create new canvas and resample
        $canvas = imagecreatetruecolor($newWidth, $newHeight);

        // Preserve transparency for PNG
        if (str_contains($mimeType, 'png')) {
            imagealphablending($canvas, false);
            imagesavealpha($canvas, true);
            $transparent = imagecolorallocatealpha($canvas, 255, 255, 255, 127);
            imagefilledrectangle($canvas, 0, 0, $newWidth, $newHeight, $transparent);
        }

        imagecopyresampled($canvas, $source, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
        imagedestroy($source);

        // Capture output as JPEG (smallest file size)
        ob_start();
        imagejpeg($canvas, null, $quality);
        $compressed = ob_get_clean();
        imagedestroy($canvas);

        return File::create([
            'filename' => pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME).'.jpg',
            'mime_type' => 'image/jpeg',
            'content' => base64_encode($compressed),
        ]);
    }

    /**
     * Delete a stored file from the database if the given ID is numeric.
     */
    public function deleteById(?string $fileId): void
    {
        if ($fileId && is_numeric($fileId)) {
            File::where('id', (int) $fileId)->delete();
        }
    }
}
