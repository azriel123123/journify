<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pelan Pelan | Journey</title>
    <link rel="icon" href="{{ asset('img/frontend/homepage1/LogoJourney.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles */
        .wave-top {
            position: relative;
            background: #ecf8f7;
        }

        .wave-top svg {
            position: absolute;
            top: -1px;
            left: 0;
            width: 100%;
            height: 80px;
            fill: #ffffff;
        }

        .wave-bottom {
            position: relative;
            background: #ecf8f7;
        }

        .wave-bottom svg {
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 80px;
            fill: #ffffff;
        }

        /* Accordion icon rotation */
        details summary::-webkit-details-marker {
            display: none;
        }

        details[open]>summary>svg {
            transform: rotate(45deg);
        }
    </style>
</head>

<body class="bg-[#ecf8f7] text-slate-900 font-sans leading-relaxed">

    <!-- Navbar -->
    <header class="flex items-center justify-between p-6 max-w-7xl mx-auto">
        <!-- Kiri: Logo -->
        <div class="text-xl font-bold select-none cursor-default">MindSync</div>

        <!-- Tengah: Navigasi -->
        <nav class="space-x-6 text-slate-700 font-medium">
            <a href="#howitworks" class="hover:text-teal-600">How it works</a>
            <a href="#faq" class="hover:text-teal-600">FAQ</a>

            @auth
                @if (auth()->user()->hasRole('admin'))
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-teal-600">Dashboard Admin</a>
                @endif

                @if (auth()->user()->status == 'paid')
                    <a href="{{ route('journal') }}" class="hover:text-teal-600">Journal</a>
                @endif
            @endauth
        </nav>

        <!-- Kanan: Button -->
        <div>
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        class="bg-orange-400 text-white font-semibold px-5 py-2 rounded-full hover:bg-orange-500 transition"
                        type="submit">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">
                    <button
                        class="bg-orange-400 text-white font-semibold px-5 py-2 rounded-full hover:bg-orange-500 transition">
                        Get Started
                    </button>
                </a>
            @endauth
        </div>
    </header>


    <!-- Hero section -->
    <section
        class="px-6 max-w-7xl mx-auto flex flex-col md:flex-row items-center md:items-start gap-12 md:gap-24 pb-20 pt-8 md:pt-16">

        <div class="md:flex-1 max-w-xl">
            <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight mb-4">
                Dive Deep <br /> into your mind
            </h1>
            <p class="text-lg text-slate-700 mb-6">MindSync is a journaling app that helps you observe your thoughts and
                feelings deeply, understand your emotional patterns, and check your progress. It’s like a companion for
                mental health.</p>
            <form class="flex gap-3 mb-6" onsubmit="event.preventDefault(); alert('Search submitted!');"
                aria-label="Search app features">
                <input type="text" placeholder="Find" aria-label="Search input"
                    class="flex-grow px-4 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400" />
                <button type="submit"
                    class="bg-teal-500 text-white px-6 rounded-lg font-semibold hover:bg-teal-600 transition">Search</button>
            </form>
        </div>

        <div class="md:flex-1 flex justify-center relative">
            <img src="{{ asset('img/frontend/homepage1/LogoJourney.png') }}"
                alt="Stylized graphic of a dark orca whale swimming in circular motion in front of an orange sun on a pastel background"
                class="max-w-full h-auto" onerror="this.style.display='none'" />
        </div>
    </section>

    <!-- Wave divider -->
    <div class="wave-bottom">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,0 C480,60 960,0 1440,60 L1440,80 L0,80 Z"></path>
        </svg>
    </div>

    <!-- How It Works -->
    <section id="howitworks" class="max-w-7xl mx-auto px-6 py-20 bg-white rounded-t-3xl shadow-lg">
        <h2 class="text-3xl text-center font-extrabold mb-14">How It Works?</h2>
        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <article class="bg-[#F0F7F7] p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="mb-3 flex items-center text-teal-700">
                    <span class="font-bold mr-2">Step 1:</span> Journal Your Day
                </div>
                <p class="text-sm text-slate-700">Write about your emotions and experiences daily. This helps create
                    awareness and builds the habit of self-reflection.</p>
            </article>
            <article class="bg-[#F0F7F7] p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="mb-3 flex items-center text-teal-700">
                    <span class="font-bold mr-2">Step 2:</span> Stay Consistent
                </div>
                <p class="text-sm text-slate-700">Make journaling a routine. Consistency brings clarity and helps track
                    emotional progress over time.</p>
            </article>
            <article class="bg-[#F0F7F7] p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="mb-3 flex items-center text-teal-700">
                    <span class="font-bold mr-2">Step 3:</span> Spot Patterns
                </div>
                <p class="text-sm text-slate-700">Use analytics to identify recurring emotional triggers and themes in
                    your life for better mental management.</p>
            </article>
            <article class="bg-[#F0F7F7] p-6 rounded-lg shadow hover:shadow-lg transition">
                <div class="mb-3 flex items-center text-teal-700">
                    <span class="font-bold mr-2">Step 4:</span> Share Progress
                </div>
                <p class="text-sm text-slate-700">Optionally share summaries or progress reports with coaches,
                    therapists, or your support system.</p>
            </article>
        </div>
    </section>

    <!-- Discover Features -->
    <section class="max-w-7xl mx-auto px-6 py-20 bg-[#ecf8f7] relative rounded-b-3xl shadow-inner">
        <h2 class="text-3xl text-center font-extrabold mb-14">Discover Features</h2>
        <p class="max-w-xl mx-auto text-center text-slate-700 mb-10">See what MindSync can do for your mental health &
            well-being.</p>

        <div class="grid gap-6 md:grid-cols-3 max-w-5xl mx-auto">
            <!-- Fitur -->
            <div class="bg-white rounded-lg p-5 shadow hover:shadow-lg transition">
                <h3 class="font-semibold mb-1 flex items-center gap-2 text-teal-600">Voice Journaling</h3>
                <p class="text-sm text-slate-700">Dictate your thoughts aloud to easily capture emotions without typing,
                    perfect for busy moments.</p>
            </div>

            <div class="bg-white rounded-lg p-5 shadow hover:shadow-lg transition">
                <h3 class="font-semibold mb-1 flex items-center gap-2 text-teal-600">Instant Analytics</h3>
                <p class="text-sm text-slate-700">Real-time emotional pattern detection and sentiment analysis offer
                    immediate insights.</p>
            </div>

            <div class="bg-white rounded-lg p-5 shadow hover:shadow-lg transition">
                <h3 class="font-semibold mb-1 flex items-center gap-2 text-teal-600">Mood Tracker</h3>
                <p class="text-sm text-slate-700">Track daily mood shifts and correlate them with your journaling for
                    holistic mental health awareness.</p>
            </div>

            <div class="bg-white rounded-lg p-5 shadow hover:shadow-lg transition">
                <h3 class="font-semibold mb-1 flex items-center gap-2 text-teal-600">Behavioral Analytics</h3>
                <p class="text-sm text-slate-700">Identify behavioral trends with data-driven insights to inform therapy
                    or coaching plans.</p>
            </div>

            <div class="bg-white rounded-lg p-5 shadow hover:shadow-lg transition">
                <h3 class="font-semibold mb-1 flex items-center gap-2 text-teal-600">Shareable Summaries</h3>
                <p class="text-sm text-slate-700">Create easy-to-understand summaries of your progress to share with
                    trusted contacts.</p>
            </div>

            <div class="bg-white rounded-lg p-5 shadow hover:shadow-lg transition">
                <h3 class="font-semibold mb-1 flex items-center gap-2 text-teal-600">Secure & Private</h3>
                <p class="text-sm text-slate-700">Your data is encrypted and only accessible by you, ensuring privacy
                    and security.</p>
            </div>

            <!-- Gambar di tengah -->
            <div class="md:col-span-3 text-center pt-10">
                <img src="{{ asset('img/frontend/homepage1/JourneyH2.jpeg') }}" alt="Journey Screenshot"
                    class="mx-auto w-1/2 h-auto rounded-lg shadow" />
            </div>
        </div>
    </section>


    <!-- Wave divider -->
    <div class="wave-top">
        <svg viewBox="0 0 1440 80" preserveAspectRatio="none" aria-hidden="true">
            <path d="M0,80 C480,20 960,80 1440,20 L1440,0 L0,0 Z"></path>
        </svg>
    </div>

    <!-- What They Say About Us -->
    <section class="max-w-7xl mx-auto px-6 py-20 bg-white rounded-t-3xl shadow-lg">
        <h2 class="text-3xl text-center font-extrabold mb-12">What They Say About Us</h2>
        <p class="text-center max-w-xl mx-auto text-slate-600 mb-12">We are trusted by users worldwide to enhance their
            mental health journey.</p>

        <div class="grid gap-8 md:grid-cols-2 max-w-5xl mx-auto">
            <blockquote class="bg-slate-900 text-slate-100 p-6 rounded-lg shadow-lg">
                <p>"MindSync transformed the way I understand my emotions. The voice journaling feature is a lifesaver
                    for my busy days."</p>
                <footer class="mt-4 font-semibold">– Alex P., Therapist</footer>
            </blockquote>
            <blockquote class="bg-slate-900 text-slate-100 p-6 rounded-lg shadow-lg">
                <p>"The instant analytics help me spot behavioral patterns I never noticed before. Highly recommend for
                    coaches."</p>
                <footer class="mt-4 font-semibold">– Maria L., Life Coach</footer>
            </blockquote>
            <blockquote class="bg-slate-900 text-slate-100 p-6 rounded-lg shadow-lg">
                <p>"Secure, private, and intuitive. MindSync is my go-to app for mental wellbeing tracking."</p>
                <footer class="mt-4 font-semibold">– Jeremy W., User</footer>
            </blockquote>
            <blockquote class="bg-slate-900 text-slate-100 p-6 rounded-lg shadow-lg">
                <p>"The shareable summaries make progress communication with my coach seamless and reassuring."</p>
                <footer class="mt-4 font-semibold">– Linda K., Athlete</footer>
            </blockquote>
        </div>
    </section>

    <!-- Who Is It For -->
    <section class="max-w-7xl mx-auto px-6 py-20 bg-[#ecf8f7] rounded-b-3xl shadow-inner">
        <h2 class="text-3xl text-center font-extrabold mb-10">Who Is It For?</h2>
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

            <details class="bg-white rounded-lg p-6 shadow cursor-pointer" aria-labelledby="therapy-label"
                role="region">
                <summary class="font-bold text-lg mb-3" id="therapy-label">Therapy</summary>
                <p class="text-slate-700 text-sm">Ideal for individuals seeking structured self-awareness or
                    supplementing professional therapy sessions to track progress and feelings over time.</p>
            </details>

            <details class="bg-white rounded-lg p-6 shadow cursor-pointer" aria-labelledby="coaching-label"
                role="region">
                <summary class="font-bold text-lg mb-3" id="coaching-label">Coaching & Business</summary>
                <p class="text-slate-700 text-sm">Support emotional intelligence growth and monitor well-being to
                    enhance productivity and leadership effectiveness within teams.</p>
            </details>

            <details class="bg-white rounded-lg p-6 shadow cursor-pointer" aria-labelledby="sport-label"
                role="region">
                <summary class="font-bold text-lg mb-3" id="sport-label">Sport</summary>
                <p class="text-slate-700 text-sm">Athletes can optimize mental resilience and emotional control by
                    logging their mood and reactions pre/post training or competition.</p>
            </details>

        </div>
    </section>

    <!-- Why MindSync? -->
    <section class="max-w-7xl mx-auto px-6 py-20 bg-white rounded-t-3xl shadow-lg">
        <h2 class="text-3xl text-center font-extrabold mb-10">Why MindSync?</h2>
        <p class="max-w-3xl mx-auto text-center text-slate-700 mb-12">MindSync makes journaling easy and insightful.
            Unlike regular journals or simple notebook trackers, MindSync uses advanced emotional detection and
            summaries to help you understand yourself better and grow your mental wellness journey efficiently and
            privately.</p>
        <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6 bg-orange-50 rounded-lg p-6 shadow-lg">

            <div>
                <h3 class="font-semibold mb-4 text-teal-700">MindSync Features</h3>
                <ul class="space-y-3 text-slate-700 list-disc list-inside marker:text-teal-400">
                    <li>Voice journaling to capture raw emotions quickly</li>
                    <li>Instant analytics to reveal emotional patterns</li>
                    <li>Behavioral insights to enhance self-awareness</li>
                    <li>Data encryption ensuring your privacy and security</li>
                </ul>
            </div>

            <div>
                <h3 class="font-semibold mb-4 text-slate-500">Typical Journal Apps</h3>
                <ul class="space-y-3 text-slate-500 list-disc list-inside marker:text-slate-300 line-through">
                    <li>Manual typing only, no voice input</li>
                    <li>No automatic emotional analytics</li>
                    <li>Limited behavior tracking and insights</li>
                    <li>Lack of privacy-focused encryption</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    @if (!auth()->check() || auth()->user()->status == 'unpaid')
        <section class="max-w-7xl mx-auto px-6 py-20 bg-[#ecf8f7] rounded-b-3xl shadow-inner">
            <h2 class="text-3xl text-center font-extrabold mb-10">Pricing</h2>
            <p class="text-center max-w-xl mx-auto text-slate-700 mb-10">Choose the plan that fits you best.</p>
            <div class="max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">

                <div class="bg-white rounded-lg p-8 shadow hover:shadow-lg transition flex flex-col">
                    <h3 class="text-2xl font-bold mb-4">Free</h3>
                    <p class="flex-grow text-sm text-slate-700">Basic features with limited journaling entries per
                        month,
                        perfect for trying out the app.</p>
                    <ul class="mt-4 text-slate-700 space-y-2 list-disc list-inside">
                        <li>Limited daily journaling</li>
                        <li>Basic mood tracker</li>
                        <li>Access to shareable summaries</li>
                    </ul>
                    <button
                        class="mt-auto bg-teal-500 text-white py-2 rounded-lg mt-6 hover:bg-teal-600 transition font-semibold">
                        Start For Free
                    </button>
                </div>

                <div class="bg-slate-900 text-white rounded-lg p-8 shadow-lg flex flex-col border-4 border-orange-400">
                    <h3 class="text-2xl font-bold mb-4">Premium</h3>
                    <p class="text-lg mb-6">$17/month</p>
                    <p class="flex-grow text-sm">Unlock all features including unlimited entries, instant analytics,
                        behavioral insights, and prioritized support.</p>
                    <ul class="mt-4 space-y-2 list-disc list-inside">
                        <li>Unlimited journaling</li>
                        <li>Advanced voice & behavioral analytics</li>
                        <li>Secure, encrypted data storage</li>
                        <li>Priority customer support</li>
                    </ul>
                    <button id="pay-button"
                        class="mt-auto bg-orange-400 text-white py-2 rounded-lg mt-6 hover:bg-orange-500 transition font-semibold">
                        Create Premium
                    </button>
                </div>

                <div class="bg-white rounded-lg p-8 shadow hover:shadow-lg transition flex flex-col">
                    <h3 class="text-2xl font-bold mb-4">Enterprise</h3>
                    <p class="flex-grow text-sm text-slate-700">Custom tailored solutions for organizations, therapy
                        groups, and businesses requiring dedicated integration and support.</p>
                    <ul class="mt-4 text-slate-700 space-y-2 list-disc list-inside">
                        <li>Team management tools</li>
                        <li>Custom analytics dashboard</li>
                        <li>Dedicated onboarding and support</li>
                        <li>Enhanced data compliance</li>
                    </ul>
                    <button
                        class="mt-auto bg-teal-900 text-white py-2 rounded-lg mt-6 hover:bg-teal-800 transition font-semibold">
                        Contact Us
                    </button>
                </div>

            </div>
        </section>
    @endif

    <!-- FAQ -->
    <section id="faq" class="max-w-7xl mx-auto px-6 py-20 bg-white rounded-3xl shadow-lg">
        <h2 class="text-3xl text-center font-extrabold mb-14">FAQ</h2>
        <p class="max-w-xl mx-auto text-center text-slate-600 mb-10">We answer some common questions about MindSync.
        </p>

        <div class="max-w-4xl mx-auto space-y-6">

            <details class="border border-slate-300 rounded-lg p-5 cursor-pointer" role="region"
                aria-labelledby="q1">
                <summary id="q1" class="font-semibold flex justify-between items-center">
                    <span>How does the emotional analysis work?</span>
                    <svg class="ml-4 w-6 h-6 transition-transform" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                </summary>
                <p class="mt-3 text-slate-700 text-sm">We use natural language processing algorithms to analyze your
                    journal entries, detecting emotional keywords and sentiment trends.</p>
            </details>

            <details class="border border-slate-300 rounded-lg p-5 cursor-pointer" role="region"
                aria-labelledby="q2" open>
                <summary id="q2" class="font-semibold flex justify-between items-center">
                    <span>Why did you choose to use emotions in the app?</span>
                    <svg class="ml-4 w-6 h-6 transition-transform" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24" aria-hidden="true" style="transform: rotate(45deg);">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                </summary>
                <p class="mt-3 text-slate-700 text-sm">Because emotions offer a strong and universal way to understand
                    human mental states, allowing us to provide meaningful insights to users seeking mental wellness.
                </p>
            </details>

            <details class="border border-slate-300 rounded-lg p-5 cursor-pointer" role="region"
                aria-labelledby="q3">
                <summary id="q3" class="font-semibold flex justify-between items-center">
                    <span>Why does the AI ask so many questions?</span>
                    <svg class="ml-4 w-6 h-6 transition-transform" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                </summary>
                <p class="mt-3 text-slate-700 text-sm">Asking questions encourages deeper reflection and richer data
                    input, which helps improve the quality of emotional insights and recommendations.</p>
            </details>

            <details class="border border-slate-300 rounded-lg p-5 cursor-pointer" role="region"
                aria-labelledby="q4">
                <summary id="q4" class="font-semibold flex justify-between items-center">
                    <span>Do the developers see my conversations?</span>
                    <svg class="ml-4 w-6 h-6 transition-transform" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
                    </svg>
                </summary>
                <p class="mt-3 text-slate-700 text-sm">No, all your journal entries and voice data are encrypted and
                    stored securely. Only you can access your personal data.</p>
            </details>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="max-w-7xl mx-auto px-6 py-20 bg-orange-400 rounded-3xl mt-20 text-white text-center shadow-lg">
        <h2 class="text-3xl font-extrabold mb-6">Let's stay synced</h2>
        <p class="max-w-xl mx-auto mb-8">Subscribe to our newsletter for mental health tips, app updates, and exclusive
            deals.</p>
        <form class="max-w-lg mx-auto flex gap-4"
            onsubmit="event.preventDefault(); alert('Subscribed: ' + this.email.value); this.email.value='';"
            aria-label="Subscribe to newsletter">
            <input id="email" name="email" type="email" placeholder="Enter your email address" required
                class="flex-grow px-4 py-3 rounded-lg text-slate-900 font-medium focus:outline-none" />
            <button type="submit"
                class="bg-slate-900 hover:bg-slate-800 transition rounded-lg px-6 font-semibold">Subscribe</button>
        </form>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 pt-14 pb-10 mt-20 text-slate-300">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">

            <div class="space-y-6">
                <div class="text-white font-bold text-lg select-none cursor-default">MindSync</div>
                <p class="text-sm max-w-xs">Making mental wellness journaling easy, insightful, and private across
                    devices and life stages.</p>
                <div class="flex space-x-6 mt-2">
                    <a href="#" aria-label="Twitter" class="hover:text-white transition" title="Twitter">
                        <img src="https://placehold.co/24x24?text=T" alt="Twitter social icon letter T"
                            onerror="this.style.display='none'" />
                    </a>
                    <a href="#" aria-label="Facebook" class="hover:text-white transition" title="Facebook">
                        <img src="https://placehold.co/24x24?text=F" alt="Facebook social icon letter F"
                            onerror="this.style.display='none'" />
                    </a>
                    <a href="#" aria-label="LinkedIn" class="hover:text-white transition" title="LinkedIn">
                        <img src="https://placehold.co/24x24?text=L" alt="LinkedIn social icon letter L"
                            onerror="this.style.display='none'" />
                    </a>
                    <a href="#" aria-label="Instagram" class="hover:text-white transition" title="Instagram">
                        <img src="https://placehold.co/24x24?text=I" alt="Instagram social icon letter I"
                            onerror="this.style.display='none'" />
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Company</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition">About us</a></li>
                    <li><a href="#" class="hover:text-white transition">Careers</a></li>
                    <li><a href="#" class="hover:text-white transition">Blog</a></li>
                    <li><a href="#" class="hover:text-white transition">Press</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Support</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white transition">Help Center</a></li>
                    <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white transition">Terms of Service</a></li>
                    <li><a href="#" class="hover:text-white transition">Contact Us</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-semibold mb-4">Download App</h4>
                <div class="flex flex-col space-y-4">
                    <a href="#" aria-label="Download on Google Play"
                        class="inline-flex items-center bg-slate-800 rounded-lg text-white px-4 py-2 hover:bg-slate-700 transition">
                        <img src="https://placehold.co/24x24?text=G" alt="Google Play icon" class="h-6 w-6 mr-3"
                            onerror="this.style.display='none'" />
                        <span>Google Play</span>
                    </a>
                    <a href="#" aria-label="Download on App Store"
                        class="inline-flex items-center bg-slate-800 rounded-lg text-white px-4 py-2 hover:bg-slate-700 transition">
                        <img src="https://placehold.co/24x24?text=A" alt="App Store icon" class="h-6 w-6 mr-3"
                            onerror="this.style.display='none'" />
                        <span>App Store</span>
                    </a>
                </div>
            </div>

        </div>
        <div class="text-center mt-10 text-slate-500 text-sm select-none">&copy; 2024 MindSync Inc. All rights
            reserved.</div>
    </footer>

    {{-- Midtrans --}}
 <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="Mid-client-f7GuPo7TCLutIMGM"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function() {
        fetch('/payment/token', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.token) {
                    window.snap.pay(data.token, {
                        onSuccess: function() {
                            window.location.href = "{{ route('journal') }}";
                        },
                        onPending: function() {
                            window.location.href = "{{ url('/') }}";
                        },
                        onError: function() {
                            window.location.href = "{{ url('/') }}";
                        },
                        onClose: function() {
                            alert('Kamu belum menyelesaikan pembayaran!');
                        }
                    });
                } else {
                    alert('Gagal mendapatkan token');
                }
            })
            .catch(error => {
                console.error('Error saat ambil token:', error);
            });
    });
</script>
</body>

</html>
