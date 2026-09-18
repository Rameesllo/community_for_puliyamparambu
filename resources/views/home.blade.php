<x-layouts.app title="Home — Puliyamparambu Youth Community">

    <!-- ===== HERO ===== -->
    <section class="hero-gradient min-h-screen flex items-center relative overflow-hidden pt-16">
        <div class="absolute top-20 right-10 w-72 h-72 bg-blue-500/20 rounded-full blur-3xl animate-float pointer-events-none"></div>
        <div class="absolute bottom-20 left-10 w-96 h-96 bg-blue-700/15 rounded-full blur-3xl animate-float-delay pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="text-center lg:text-left animate-fade-in-up">
                    <span class="inline-block mb-4 px-4 py-1.5 rounded-full bg-blue-500/20 text-blue-300 text-sm font-semibold border border-blue-500/30">
                        🌟 Empowering Youth Since 2020
                    </span>
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                        Together We <span class="gradient-text">Rise,</span><br/>
                        Together We <span class="gradient-text">Shine</span>
                    </h1>
                    <p class="text-slate-300 text-lg sm:text-xl leading-relaxed mb-8 max-w-xl mx-auto lg:mx-0">
                        Puliyamparambu Youth Community — a vibrant hub for Plus Two and college students to learn, grow, and serve our beloved community.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="{{ route('events') }}"
                           class="btn-pulse inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold text-base hover:from-blue-600 hover:to-blue-800 shadow-xl shadow-blue-500/30 transition-all duration-300 hover:-translate-y-1">
                            View Events
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                        </a>
                        <a href="{{ route('about') }}"
                           class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl border border-white/20 text-white font-semibold text-base hover:bg-white/10 transition-all duration-300">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="hidden lg:flex justify-center">
                    <div class="relative">
                        <div class="w-80 h-80 rounded-3xl bg-gradient-to-br from-blue-600/40 to-blue-900/60 backdrop-blur border border-white/10 flex flex-col items-center justify-center shadow-2xl animate-float">
                            <div class="text-8xl mb-4">🎓</div>
                            <div class="text-white font-bold text-xl text-center px-4">Puliyamparambu</div>
                            <div class="text-blue-300 text-sm mt-1">Youth Community</div>
                            <div class="mt-6 flex gap-3">
                                <div class="px-3 py-1 rounded-full bg-blue-500/30 text-blue-200 text-xs">Education</div>
                                <div class="px-3 py-1 rounded-full bg-orange-500/30 text-orange-200 text-xs">Culture</div>
                                <div class="px-3 py-1 rounded-full bg-green-500/30 text-green-200 text-xs">Service</div>
                            </div>
                        </div>
                        <div class="absolute -top-4 -right-4 bg-white rounded-2xl shadow-xl px-4 py-2 animate-float-delay">
                            <div class="text-xs text-slate-500 font-medium">Members</div>
                            <div class="text-xl font-bold text-blue-600">200+</div>
                        </div>
                        <div class="absolute -bottom-4 -left-4 bg-white rounded-2xl shadow-xl px-4 py-2 animate-float">
                            <div class="text-xs text-slate-500 font-medium">Events / Year</div>
                            <div class="text-xl font-bold text-orange-500">25+</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center text-slate-400 text-xs gap-2">
                <span>Scroll down</span>
                <div class="w-5 h-8 border-2 border-slate-500 rounded-full flex items-start justify-center pt-1">
                    <div class="w-1 h-2 bg-slate-400 rounded-full animate-bounce"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== STATS BAR ===== -->
    <section class="bg-white border-b border-slate-100 py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                @foreach([
                    [$stats['active_members'], 'Active Members'],
                    [$stats['events_per_year'], 'Events Per Year'],
                    [$stats['years_active'], 'Years of Service'],
                    [$stats['programs'], 'Programs Running']
                ] as $stat)
                    <div>
                        <div class="stat-number">{{ $stat[0] }}</div>
                        <div class="text-slate-500 text-sm mt-1 font-medium">{{ $stat[1] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== ABOUT SECTION ===== -->
    <section id="about-community" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Who We Are</span>
                    <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900 leading-tight">
                        A Community Built<br/><span class="gradient-text">By Youth, For Youth</span>
                    </h2>
                    <p class="mt-5 text-slate-600 text-lg leading-relaxed">
                        The Puliyamparambu Youth Community was founded with a simple mission: to bring together the bright young minds of our locality and channel their energy into meaningful activities.
                    </p>
                    <p class="mt-4 text-slate-600 leading-relaxed">
                        We primarily focus on Plus Two and college students, providing them with a platform to develop leadership skills, participate in cultural events, and contribute to social causes.
                    </p>
                    <div class="mt-8 flex flex-wrap gap-3">
                        @foreach(['Leadership','Education','Cultural Events','Social Service','Sports'] as $tag)
                            <span class="px-4 py-2 rounded-full bg-blue-50 text-blue-700 text-sm font-medium border border-blue-100">{{ $tag }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    @foreach([['🎓','Education First','Supporting students with resources and mentorship.'],['🤝','Community Bond','Strengthening local ties and neighborhood spirit.'],['🏆','Achievements','Celebrating wins, big and small, together.'],['💡','Innovation','Encouraging creative thinking and new ideas.']] as $card)
                        <div class="card-hover p-5 rounded-2xl bg-gradient-to-br from-slate-50 to-blue-50 border border-blue-100">
                            <div class="text-3xl mb-3">{{ $card[0] }}</div>
                            <h3 class="font-bold text-slate-800 text-sm mb-2">{{ $card[1] }}</h3>
                            <p class="text-slate-500 text-xs leading-relaxed">{{ $card[2] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- ===== UPCOMING EVENTS ===== -->
    <section id="upcoming-events" class="py-20 section-alt">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">What is Happening</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Upcoming Events</h2>
                <p class="mt-3 text-slate-500 max-w-xl mx-auto">Join us for exciting programs, workshops, and celebrations happening in our community.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($upcomingEvents as $event)
                    <div class="card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100">
                        <div class="h-3 bg-gradient-to-r from-blue-500 to-blue-700"></div>
                        <div class="p-6">
                            <div class="text-4xl mb-4">📅</div>
                            <h3 class="font-bold text-slate-900 text-lg mb-2">{{ $event->title }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4">{{ Str::limit($event->description, 100) }}</p>
                            <div class="flex flex-col gap-1 text-xs text-slate-400">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    <span class="font-medium text-slate-600">{{ $event->date->format('M d, Y') }} at {{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    <span>{{ $event->location }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-10 text-slate-500">
                        No upcoming events right now. Check back soon!
                    </div>
                @endforelse
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('events') }}" class="inline-flex items-center gap-2 px-8 py-3 rounded-xl border-2 border-blue-500 text-blue-600 font-semibold hover:bg-blue-500 hover:text-white transition-all duration-300">
                    View All Events
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ===== WHAT WE DO ===== -->
    <section id="what-we-do" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Our Activities</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">What We Do</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach([['📖','Educational Programs','Study circles, exam preparation sessions, and career guidance workshops for Plus Two and college students.'],['🎭','Cultural Events','Annual cultural fests, street plays, music competitions, and art exhibitions showcasing local talent.'],['⚽','Sports and Recreation','Football, cricket, chess, and athletic tournaments that foster teamwork and healthy competition.'],['🌱','Social Service','Blood donation camps, tree planting drives, helping the elderly, and neighborhood cleanliness campaigns.'],['💻','Tech and Skills','Digital literacy workshops, coding bootcamps, and entrepreneurship sessions for the modern youth.'],['🕌','Religious Harmony','Celebrating all festivals together, promoting unity, respect, and peaceful coexistence.']] as $item)
                    <div class="card-hover group p-7 rounded-2xl border border-slate-100 hover:border-blue-100 bg-white hover:bg-blue-50/30 transition-colors">
                        <div class="w-14 h-14 rounded-2xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center text-2xl mb-5 transition-colors">{{ $item[0] }}</div>
                        <h3 class="font-bold text-slate-900 text-lg mb-3">{{ $item[1] }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">{{ $item[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== TEAM PREVIEW ===== -->
    <section id="our-team" class="py-20 section-alt">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Leadership</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Our Team</h2>
                <p class="mt-3 text-slate-500 max-w-xl mx-auto">Meet the passionate individuals steering our community forward.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse($teamMembers as $index => $member)
                    @php
                        $colors = ['bg-gradient-to-br from-blue-400 to-blue-700', 'bg-gradient-to-br from-orange-400 to-orange-600', 'bg-gradient-to-br from-green-400 to-green-600', 'bg-gradient-to-br from-purple-400 to-purple-600'];
                        $color = $colors[$index % count($colors)];
                        $initials = strtoupper(substr($member->name, 0, 2));
                    @endphp
                    <div class="card-hover bg-white rounded-2xl p-6 text-center shadow-sm border border-slate-100">
                        @if($member->profile_image)
                            <img src="{{ Storage::url($member->profile_image) }}" alt="{{ $member->name }}" class="w-20 h-20 rounded-full mx-auto mb-4 object-cover shadow-lg border-2 border-white" />
                        @else
                            <div class="w-20 h-20 rounded-full {{ $color }} flex items-center justify-center text-white font-bold text-xl mx-auto mb-4 shadow-lg">{{ $initials }}</div>
                        @endif
                        <h3 class="font-bold text-slate-900 text-base">{{ $member->name }}</h3>
                        <p class="text-blue-500 text-sm font-medium mt-1">{{ $member->role }}</p>
                    </div>
                @empty
                    <div class="col-span-full text-center py-6 text-slate-500">
                        Our team profile will be updated soon!
                    </div>
                @endforelse
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('team') }}" class="inline-flex items-center gap-2 px-8 py-3 rounded-xl border-2 border-blue-500 text-blue-600 font-semibold hover:bg-blue-500 hover:text-white transition-all duration-300">
                    Meet Full Team
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ===== LATEST ANNOUNCEMENTS ===== -->
    <section id="latest-announcements" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-orange-500 font-semibold text-sm uppercase tracking-wider">Updates</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Latest Announcements</h2>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($latestAnnouncements as $announcement)
                    <div class="card-hover bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100 flex flex-col">
                        <div class="h-2 bg-gradient-to-r from-orange-400 to-orange-600"></div>
                        <div class="p-6 flex flex-col flex-1">
                            <h3 class="font-bold text-slate-900 text-lg mb-2 leading-tight">{{ $announcement->title }}</h3>
                            <div class="flex items-center gap-1.5 text-xs text-slate-400 mb-4">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $announcement->published_at?->format('M d, Y') }}
                            </div>
                            <p class="text-slate-500 text-sm leading-relaxed mb-4 flex-1">{{ Str::limit($announcement->content, 120) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-6 text-slate-500">
                        No new announcements right now.
                    </div>
                @endforelse
            </div>
            <div class="mt-10 text-center">
                <a href="{{ route('announcements') }}" class="inline-flex items-center gap-2 px-8 py-3 rounded-xl border-2 border-orange-500 text-orange-600 font-semibold hover:bg-orange-500 hover:text-white transition-all duration-300">
                    View All Announcements
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- ===== WHY JOIN ===== -->
    <section id="why-join" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Why Us</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Why Join Our Community?</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6 max-w-4xl mx-auto">
                @foreach([['🚀','Grow Faster','Surround yourself with driven peers and mentors who inspire you to be your best.'],['🤝','Real Connections','Build genuine friendships and a network that lasts a lifetime.'],['🏅','Recognition','Your efforts are seen and celebrated — from event participation to leadership roles.'],['📣','Your Voice Matters','We are a democratic community. Every member has a say in what we do.'],['🌍','Give Back','Feel the satisfaction of making a tangible difference in your neighborhood.'],['💼','Career Edge','Volunteer experience, event management, and leadership skills look great on any resume.']] as $reason)
                    <div class="flex items-start gap-4 p-5 rounded-2xl hover:bg-blue-50 transition-colors group">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center text-xl flex-shrink-0 transition-colors">{{ $reason[0] }}</div>
                        <div>
                            <h3 class="font-bold text-slate-900 mb-1">{{ $reason[1] }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">{{ $reason[2] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ===== CALL TO ACTION ===== -->
    <section id="join-cta" class="py-20 hero-gradient relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-10 left-10 w-64 h-64 bg-blue-400 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-10 right-10 w-80 h-80 bg-orange-400 rounded-full blur-3xl animate-float-delay"></div>
        </div>
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-3xl sm:text-5xl font-bold text-white mb-6">
                Ready to be Part of<br/><span class="gradient-text">Something Great?</span>
            </h2>
            <p class="text-slate-300 text-lg mb-10 max-w-2xl mx-auto">
                Whether you are a Plus Two student, a college-goer, or any youth from Puliyamparambu — your seat at our table is ready.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('events') }}" class="btn-pulse inline-flex items-center justify-center gap-2 px-10 py-4 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold text-lg hover:from-blue-600 hover:to-blue-800 shadow-2xl shadow-blue-500/40 transition-all duration-300 hover:-translate-y-1">
                    Join an Event
                </a>
                <a href="{{ route('about') }}" class="inline-flex items-center justify-center gap-2 px-10 py-4 rounded-2xl border-2 border-white/30 text-white font-semibold text-lg hover:bg-white/10 transition-all duration-300">
                    Know More
                </a>
            </div>
        </div>
    </section>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-slate-900 text-slate-300 py-14">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-10">
                <div class="sm:col-span-2 lg:col-span-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-400 to-blue-700 flex items-center justify-center text-white font-bold text-lg">P</div>
                        <div>
                            <div class="text-white font-bold text-sm leading-tight">Puliyamparambu</div>
                            <div class="text-blue-400 text-xs">Youth Community</div>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">Empowering the youth of Puliyamparambu through education, culture, and community service.</p>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-sm">
                        @foreach([['home','Home'],['events','Events'],['team','Team'],['announcements','Announcements'],['about','About']] as $l)
                            <li><a href="{{ route($l[0]) }}" class="text-slate-400 hover:text-blue-400 transition-colors">{{ $l[1] }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Programs</h4>
                    <ul class="space-y-2 text-sm text-slate-400">
                        <li>Study Circles</li><li>Cultural Fest</li><li>Sports League</li><li>Blood Donation</li><li>Tech Workshops</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-semibold mb-4">Contact</h4>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>Puliyamparambu, Kerala</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>community@puliyamparambu.org</li>
                        <li class="flex items-center gap-2"><svg class="w-4 h-4 text-blue-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>+91 98765 43210</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 pt-8 flex flex-col sm:flex-row justify-between items-center gap-4 text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} Puliyamparambu Youth Community. All rights reserved.</p>
                <p>Made with love in Kerala, India</p>
            </div>
        </div>
    </footer>

</x-layouts.app>
