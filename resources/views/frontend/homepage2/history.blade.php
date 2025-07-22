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
    <div class="relative z-10 max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 lg:grid-cols-12 gap-10">
        <div class="lg:col-span-9 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($journals as $journal)
                <div class="max-w-xs rounded-2xl bg-white p-5 shadow-lg relative">
                    <!-- Header Info -->
                    <div class="text-sm text-gray-500 mb-2">{{ $journal->created_at->format('d M Y') }}</div>
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $journal->title }}</h2>
                    <p class="text-sm text-gray-800">
                        {{ Str::limit($journal->answer1, 100) }}
                        <br>
                        {{ Str::limit($journal->answer2, 100) }}
                        <br>
                        {{ Str::limit($journal->answer3, 100) }}
                    </p>

                    <!-- Arrow -->
                    <div class="text-right mb-4">
                        <a href="" class="text-gray-500 hover:text-gray-800">
                        </a>
                    </div>

                    <!-- Footer -->
                    <div class="flex items-center justify-between border-t pt-4">
                        <div class="flex items-center space-x-2">
                            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="icon"
                                class="w-6 h-6" />
                            <span class="text-sm text-gray-700">Journal Entry</span>
                        </div>
                        <a href="{{ route('journal.edit', ['category' => $journal->category->id, 'id' => $journal->id]) }}" class="bg-black text-white text-sm px-4 py-1 rounded-full">View</a>
                    </div>
                </div>

            @empty
                <p class="text-gray-500">Belum ada journal yang dibuat.</p>
            @endforelse
        </div>


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
