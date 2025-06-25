<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Journal</title>
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
        <main class="flex-1">
            <section class="mx-4 md:mx-8 mb-10">
                <!-- Tombol Back -->
                <div class="mb-6">
                    <button onclick="history.back()"
                        class="inline-flex items-center text-indigo-700 hover:text-indigo-900 font-semibold transition text-base">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </button>
                </div>

                <!-- Judul -->
                <h2 class="text-3xl font-extrabold mb-8 text-indigo-800 drop-shadow-md">Read & Edit Journal</h2>

                <form method="POST" action="{{ route('journal.update', ['category' => $journal->category_id, 'id' => $journal->id]) }}"
                    class="space-y-5 bg-white/40 border border-white/30 backdrop-blur-2xl rounded-3xl shadow-xl p-8">
                    @csrf
                    @method('PUT')

                    <!-- Judul Jurnal -->
                    <div>
                        <label class="block text-lg font-semibold text-indigo-800 mb-2">Journal Title</label>
                        <input type="text" name="title"
                            class="w-full p-4 rounded-xl border border-indigo-200 bg-white/60 focus:outline-none focus:ring-2 focus:ring-indigo-300 shadow-inner"
                            placeholder="Enter your journal title..." value="{{ old('title', $journal->title) }}" required />
                    </div>

                    <!-- Pertanyaan 1 -->
                    <div>
                        <label
                            class="block text-lg font-semibold text-indigo-800 mb-2">{{ $questions->question1 }}</label>
                        <textarea name="answer1" rows="3"
                            class="w-full p-4 rounded-xl border border-indigo-200 bg-white/60 focus:outline-none focus:ring-2 focus:ring-indigo-300 resize-none shadow-inner"
                            placeholder="Your answer..." required>{{ old('answer1', $journal->answer1) }}</textarea>
                    </div>

                    <!-- Pertanyaan 2 -->
                    <div>
                        <label
                            class="block text-lg font-semibold text-indigo-800 mb-2">{{ $questions->question2 }}</label>
                        <textarea name="answer2" rows="3"
                            class="w-full p-4 rounded-xl border border-indigo-200 bg-white/60 focus:outline-none focus:ring-2 focus:ring-indigo-300 resize-none shadow-inner"
                            placeholder="Your answer..."required>{{ old('answer2', $journal->answer2) }}</textarea>
                    </div>

                    <!-- Pertanyaan 3 -->
                    <div>
                        <label
                            class="block text-lg font-semibold text-indigo-800 mb-2">{{ $questions->question3 }}</label>
                        <textarea name="answer3" rows="3"
                            class="w-full p-4 rounded-xl border border-indigo-200 bg-white/60 focus:outline-none focus:ring-2 focus:ring-indigo-300 resize-none shadow-inner"
                            placeholder="Your answer..." required>{{ old('answer3', $journal->answer3) }}</textarea>
                    </div>

                    <!-- Deskripsi Tambahan -->
                    <div>
                        <label class="block text-lg font-semibold text-indigo-800 mb-2">Additional Notes or
                            Description</label>
                        <textarea name="description" rows="4"
                            class="w-full p-4 rounded-xl border border-indigo-200 bg-white/60 focus:outline-none focus:ring-2 focus:ring-indigo-300 resize-none shadow-inner"
                            placeholder="Write any additional notes or reflection...">{{ old('description', $journal->description) }}</textarea>
                    </div>

                    <!-- Submit -->
                    <div class="text-right">
                        <button type="submit"
                            class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition">
                            Save Change Journal
                        </button>
                    </div>
                </form>

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
