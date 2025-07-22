<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Journal Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: '#4F46E5',
                        secondary: '#F97316',
                        moodHappy: '#DBEAFE',
                        moodSad: '#FCE7F3',
                        moodNeutral: '#DCFCE7',
                        moodAngry: '#FECACA',
                        moodTired: '#FFE4B5',
                    },
                },
            },
        };
    </script>
    <style>
        body {
            background: linear-gradient(135deg, #FFF6F0, #FDFBFB);
        }

        .item:hover {
            background-color: #f3f4f6;
        }

        .smooth-anim {
            transition: all 0.3s ease;
        }
    </style>
</head>

<body class="font-inter text-gray-800 relative">
    @if (session('affirmation'))
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md text-center">
                <h2 class="text-xl font-bold mb-2">{{ session('affirmation')->headline }}</h2>
                <p class="text-gray-700">{{ session('affirmation')->isi }}</p>
                <button onclick="this.parentElement.parentElement.remove()"
                    class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Tutup
                </button>
            </div>
        </div>
    @endif

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 lg:grid-cols-12 gap-10">
        <main class="lg:col-span-8 space-y-10">
            <header class="opacity-0 translate-y-8 scale-95">
                <h1 class="text-4xl font-bold text-gray-900 mb-1">Welcome back, {{ $user->name }}</h1>
                <p class="text-lg text-gray-600">Hope today is full of reflection and growth!</p>
            </header>

            <section
                class="bg-white p-6 rounded-2xl shadow-md flex items-center justify-between gap-6 opacity-0 translate-y-8 scale-95">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Start your day with a journal</h2>
                    <p class="text-sm text-gray-600">Take a few minutes to reflect and write.</p>
                </div>
                <a href="{{ route('journal.create') }}">
                    <button
                        class="bg-secondary hover:bg-orange-500 text-white px-5 py-2 rounded-lg text-sm font-semibold transition duration-300">
                        ✍ Create Journal
                    </button>
                </a>
            </section>

            <section class="grid grid-cols-1 sm:grid-cols-2 gap-6 opacity-0 translate-y-8 scale-95">
                <div class="bg-white rounded-2xl shadow-md p-6 card">
                    <div class="text-3xl mb-2">😊</div>
                    <p class="text-sm text-gray-500">Mood Types</p>
                    <p class="text-xl font-semibold text-gray-900">5</p>
                </div>
                <div class="bg-white rounded-2xl shadow-md p-6 card">
                    <div class="text-3xl mb-2">📅</div>
                    <p class="text-sm text-gray-500">Last Entry</p>
                    <p class="text-xl font-semibold text-gray-900">July 6, 2025</p>
                </div>
            </section>

            {{-- Bagian Quotes/ afrimasi --}}
            <section class="bg-blue-50 p-6 rounded-xl border border-blue-200 shadow opacity-0 translate-y-8 scale-95">
                <h2 class="font-semibold text-blue-800 text-sm mb-2">✨ Daily Quote</h2>
                <blockquote class="text-gray-700 italic text-lg leading-relaxed">
                    “The journey of a thousand miles begins with a single step.”
                </blockquote>
                <p class="text-sm text-gray-500 mt-2 text-right">– Lao Tzu</p>
            </section>

            <section
                class="bg-white p-6 rounded-2xl shadow-md flex items-center justify-between gap-6 opacity-0 translate-y-8 scale-95">
                <div>
                    <h2 class="text-xl font-bold text-gray-900 mb-1">Start your day with a journal</h2>
                    <p class="text-sm text-gray-600">Take a few minutes to reflect and write.</p>
                </div>
                <a href="{{ route('journal.history') }}">
                    <button
                        class="bg-secondary hover:bg-orange-500 text-white px-5 py-2 rounded-lg text-sm font-semibold transition duration-300">Your
                        Journal History
                    </button>
                </a>
            </section>

        </main>
        <!-- Sidebar -->
        <aside class="w-full md:w-80 bg-white rounded-3xl shadow-xl p-6 flex flex-col sticky top-10 h-fit">
            <h2 class="text-2xl font-bold mb-4 text-indigo-700">Now Playing</h2>

            @if ($currentLagu)
                <img src="{{ asset('storage/' . $currentLagu->image) }}"
                    class="rounded-xl mb-4 w-full h-48 object-cover" alt="">
                <div class="mb-2">
                    <h3 class="text-lg font-semibold">{{ $currentLagu->judul }}</h3>
                    <p class="text-sm text-gray-600">{{ $currentLagu->penyanyi }}</p>
                </div>
                <audio controls class="w-full mb-6">
                    <source src="{{ asset('storage/' . $currentLagu->file) }}" type="audio/mpeg">
                </audio>
            @endif

            <hr class="mb-4">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Playlist</h3>
            <ul class="space-y-2">
                @foreach ($laguList as $lagu)
                    {{-- index.blade.php --}}
                    <li class="flex justify-between items-center hover:bg-gray-100 p-2 rounded cursor-pointer"
                        onclick="window.location.href='{{ route('journal.play', $lagu->id) }}'">
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ $lagu->judul }}</p>
                            <p class="text-xs text-gray-500">{{ $lagu->penyanyi }}</p>
                        </div>
                        <i class="fas fa-play text-indigo-600"></i>
                    </li>
                @endforeach
            </ul>
        </aside>

    </div>
    <script>
        gsap.utils.toArray('section, header, aside').forEach((el, i) => {
            gsap.to(el, {
                opacity: 1,
                y: 0,
                scale: 1,
                duration: 0.9,
                delay: i * 0.15,
                ease: "expo.out"
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const audio = document.querySelector('audio');
            const playBtn = document.querySelector('button[aria-label="Play/Pause"]');
            const playIcon = playBtn.querySelector('i');

            playBtn.addEventListener('click', function() {
                if (audio.paused) {
                    audio.play();
                    playIcon.classList.remove('fa-play');
                    playIcon.classList.add('fa-pause');
                } else {
                    audio.pause();
                    playIcon.classList.remove('fa-pause');
                    playIcon.classList.add('fa-play');
                }
            });
        });
    </script>

</body>

</html>
