<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dynamic Journal Layout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        inter: ['Inter', 'sans-serif']
                    }
                }
            }
        };
    </script>
</head>

<body class="bg-gradient-to-tr from-indigo-100 via-pink-100 to-yellow-100 min-h-screen text-gray-900 font-inter">

    <div class="max-w-7xl mx-auto px-4 py-10 flex flex-col md:flex-row gap-10">
        <!-- Main Content -->
        <main class="flex-1"><!-- Tombol Back -->
            <div class="mb-6 mx-4 md:mx-8">
                <button onclick="history.back()"
                    class="inline-flex items-center text-indigo-700 hover:text-indigo-900 font-semibold transition text-base">
                    <i class="fas fa-arrow-left mr-2"></i> Back
                </button>
            </div>
            
            <!-- Mood Categories -->
            <section class="mb-10 mx-4 md:mx-8">
                <h2 class="text-3xl font-extrabold mb-6 text-indigo-800 drop-shadow-md">Mood Categories</h2>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                    @forelse($categories as $category)
                        <a href="{{ route('journal.create', ['category' => $category->id, 'day' => 1]) }}"
                            class="relative block overflow-hidden rounded-2xl cursor-pointer transform transition hover:scale-105 z-0 hover:z-10 group">
                            <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                class="w-full h-[140px] object-cover brightness-75 rounded-2xl group-hover:brightness-90 transition" />
                            <div
                                class="absolute bottom-3 left-4 text-white font-bold text-xl drop-shadow-md select-none">
                                {{ $category->name }}
                            </div>
                        </a>

                    @empty
                        <p class="text-gray-600 col-span-full">No categories found.</p>
                    @endforelse
                </div>

            </section>

            <!-- Journal Cards -->
            <section>
                <h2 class="text-3xl font-extrabold mb-8 text-indigo-800 drop-shadow-md mx-4 md:mx-8">Your Journals</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mx-4 md:mx-8">
                    <!-- Contoh Journal -->
                    @forelse($journals as $journal)
                        <a href="{{ route('journal.edit', ['category' => $journal->category_id, 'id' => $journal->id]) }}">
                            <article
                            class="relative group bg-white/10 border border-white/20 backdrop-blur-2xl rounded-3xl overflow-hidden p-8 shadow-xl transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 hover:border-white/30">

                            <!-- Icon mood: bisa lo kembangin dari jawaban -->
                            <div
                                class="absolute top-4 right-4 bg-white/20 rounded-full p-2 text-xl text-indigo-700 backdrop-blur-sm shadow-md">
                                😊
                            </div>

                            <!-- Gradient overlay -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-white/5 via-white/0 to-white/5 rounded-3xl group-hover:from-white/10 transition duration-300">
                            </div>

                            <!-- Content -->
                            <h3 class="relative z-10 text-2xl font-bold mb-4 text-indigo-900 drop-shadow-sm">
                                {{ $journal->title }}
                            </h3>
                            <p class="relative z-10 text-indigo-800 mb-6 leading-relaxed">
                                {{ Str::limit($journal->answer1, 100) }}
                            </p>
                            <time class="relative z-10 text-sm text-indigo-700 font-semibold"
                                datetime="{{ $journal->created_at->toDateString() }}">
                                {{ $journal->created_at->format('F j, Y') }}
                            </time>
                        </article>
                        </a>
                    @empty
                        <p class="text-center text-gray-600 col-span-full">No journals yet.</p>
                    @endforelse

                    <!-- Salin dan ganti kontennya -->
                </div>
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
