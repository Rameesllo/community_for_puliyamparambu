<x-layouts.app title="About — Puliyamparambu Youth Community"
               metaDescription="Learn about the history, mission, and values of Puliyamparambu Youth Community.">

    <!-- Page Header -->
    <section class="hero-gradient pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute bottom-0 right-0 w-80 h-80 bg-orange-400 rounded-full blur-3xl animate-float-delay"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block mb-4 px-4 py-1.5 rounded-full bg-blue-500/20 text-blue-300 text-sm font-semibold border border-blue-500/30">
                🌍 Our Story
            </span>
            <h1 class="text-4xl sm:text-5xl font-bold text-white mb-4">About Our Community</h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                Rooted in Puliyamparambu. Driven by youth. Serving with heart.
            </p>
        </div>
    </section>

    <!-- Story / History -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Our Story</span>
                    <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900 leading-tight">
                        From a Small Idea <br/><span class="gradient-text">To a Thriving Movement</span>
                    </h2>
                    <p class="mt-5 text-slate-600 leading-relaxed">
                        It started with just a handful of Plus Two students who wanted to do something meaningful during their summer vacation in 2020. What began as a small study group quickly grew into a full-fledged youth organization.
                    </p>
                    <p class="mt-4 text-slate-600 leading-relaxed">
                        Today, the Puliyamparambu Youth Community is home to over 200 active members from across the locality. We have organized 100+ events, raised funds for community welfare, and helped dozens of students with educational support.
                    </p>
                    <p class="mt-4 text-slate-600 leading-relaxed">
                        We welcome every youth from Puliyamparambu — regardless of school, college, or background — to join our family and contribute in their own unique way.
                    </p>
                </div>
                <!-- Timeline -->
                <div class="relative pl-8 border-l-2 border-blue-100">
                    @foreach([
                        ['2020','Foundation','A small group of Plus Two students started the community with a study circle.'],
                        ['2021','First Cultural Fest','Organized the first major cultural event with 300+ attendees.'],
                        ['2022','Social Service Wing','Launched a dedicated social service wing for community welfare activities.'],
                        ['2023','Sports League','Started the annual inter-ward sports league with 12 teams.'],
                        ['2024','Tech and Digital','Introduced tech workshops and a community social media presence.'],
                        ['2025','200+ Members','Crossed 200 active members and 100+ events milestone.'],
                    ] as $timeline)
                        <div class="relative mb-8 last:mb-0">
                            <div class="absolute -left-10 w-4 h-4 rounded-full bg-blue-500 border-4 border-blue-100"></div>
                            <div class="bg-blue-50 rounded-2xl p-5 hover:bg-blue-100 transition-colors">
                                <div class="text-blue-600 font-bold text-sm mb-1">{{ $timeline[0] }}</div>
                                <h4 class="font-bold text-slate-800 mb-1">{{ $timeline[1] }}</h4>
                                <p class="text-slate-500 text-sm">{{ $timeline[2] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-20 section-alt">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white rounded-3xl p-10 shadow-sm border border-blue-100">
                    <div class="w-14 h-14 rounded-2xl bg-blue-50 flex items-center justify-center text-2xl mb-6">🎯</div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Our Mission</h3>
                    <p class="text-slate-600 leading-relaxed">
                        To empower the youth of Puliyamparambu by providing meaningful opportunities for personal growth, social service, cultural expression, and academic excellence — building the leaders of tomorrow, today.
                    </p>
                </div>
                <div class="bg-white rounded-3xl p-10 shadow-sm border border-orange-100">
                    <div class="w-14 h-14 rounded-2xl bg-orange-50 flex items-center justify-center text-2xl mb-6">🌟</div>
                    <h3 class="text-2xl font-bold text-slate-900 mb-4">Our Vision</h3>
                    <p class="text-slate-600 leading-relaxed">
                        A Puliyamparambu where every young person has the support, the platform, and the confidence to reach their full potential — and where a strong, united community is the foundation for a bright future.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">What We Stand For</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">Our Core Values</h2>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach([
                    ['🤲','Service First','We believe in giving back to our community before anything else.'],
                    ['🕊️','Unity in Diversity','We celebrate our differences and stand together as one.'],
                    ['📖','Learning Always','We are committed to continuous learning and knowledge sharing.'],
                    ['💪','Empowerment','We lift each other up and create opportunities for everyone.'],
                    ['🌿','Sustainability','We act with the future in mind — for our community and our planet.'],
                    ['💎','Integrity','We are honest, transparent, and accountable in everything we do.'],
                ] as $value)
                    <div class="card-hover p-7 rounded-2xl bg-gradient-to-br from-slate-50 to-blue-50 border border-blue-100">
                        <div class="text-3xl mb-4">{{ $value[0] }}</div>
                        <h3 class="font-bold text-slate-900 text-lg mb-2">{{ $value[1] }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">{{ $value[2] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- How to Join -->
    <section class="py-20 section-alt">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-14">
                <span class="text-blue-500 font-semibold text-sm uppercase tracking-wider">Get Involved</span>
                <h2 class="mt-2 text-3xl sm:text-4xl font-bold text-slate-900">How to Join</h2>
                <p class="mt-3 text-slate-500">Becoming a member is simple. Here is how:</p>
            </div>
            <div class="space-y-6">
                @foreach([
                    ['01','Reach Out','Contact any current member or our secretary. You can also message us on our WhatsApp community group.'],
                    ['02','Attend an Event','Come to any of our events as a guest. Get to know us and see what we do before committing.'],
                    ['03','Register as a Member','Fill in a simple registration form (available at any event or from the secretary). Membership is free!'],
                    ['04','Start Contributing','Choose an area you love — education, sports, culture, or social service — and dive in.'],
                ] as $step)
                    <div class="flex items-start gap-6 p-6 bg-white rounded-2xl shadow-sm border border-slate-100">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center text-white font-bold text-xl flex-shrink-0">
                            {{ $step[0] }}
                        </div>
                        <div>
                            <h3 class="font-bold text-slate-900 text-lg mb-1">{{ $step[1] }}</h3>
                            <p class="text-slate-500 text-sm leading-relaxed">{{ $step[2] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Get in Touch</h2>
            <p class="text-slate-500 mb-10">Have a question or want to know more? We would love to hear from you.</p>
            <div class="grid sm:grid-cols-3 gap-6">
                @foreach([
                    ['📍','Location','Puliyamparambu, Kerala, India'],
                    ['📧','Email','community@puliyamparambu.org'],
                    ['📞','Phone','+91 98765 43210'],
                ] as $contact)
                    <div class="card-hover p-6 rounded-2xl bg-blue-50 border border-blue-100 text-center">
                        <div class="text-3xl mb-3">{{ $contact[0] }}</div>
                        <div class="font-bold text-slate-800 text-sm mb-1">{{ $contact[1] }}</div>
                        <div class="text-slate-500 text-sm">{{ $contact[2] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-slate-400 py-8 text-center text-sm">
        <p>&copy; {{ date('Y') }} Puliyamparambu Youth Community · <a href="{{ route('home') }}" class="text-blue-400 hover:text-blue-300 transition-colors">Back to Home</a></p>
    </footer>

</x-layouts.app>
