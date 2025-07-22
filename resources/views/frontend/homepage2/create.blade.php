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

                    <!-- Judul Halaman -->
                    <h2 class="text-3xl font-extrabold mb-2 text-indigo-800 drop-shadow-md">Create Journal</h2>
                    <p class="text-lg text-indigo-700 mb-8">Hari ke-{{ $day }}</p>


                    <form method="GET" action="{{ route('journal.create') }}" class="mb-6">
                        <label class="block text-lg font-semibold text-indigo-800 mb-2">Pilih Kategori</label>
                        <select name="category" onchange="this.form.submit()"
                            class="w-full appearance-none pl-4 pr-8 py-3 rounded-2xl border border-indigo-300 bg-white text-indigo-700 font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-300 transition">
                            <option value="">-- Pilih Kategori --</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"
                                    {{ $category && $cat->id == $category->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>



                    <!-- Dropdown Pilih Hari -->

                    <div class="mb-6">
                        <label for="daySelect" class="block text-lg font-semibold text-indigo-800 mb-3">Pilih
                            Hari</label>
                        <div class="relative">
                            <i
                                class="fas fa-calendar-day absolute left-4 top-1/2 transform -translate-y-1/2 text-indigo-500"></i>
                            <select id="daySelect" onchange="if(this.value) window.location.href=this.value"
                                class="w-full appearance-none pl-12 pr-8 py-3 rounded-2xl border border-indigo-300 bg-white text-indigo-700 font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-indigo-300 transition">
                                @for ($i = 1; $i <= $totalHari; $i++)
                                    <option
                                        value="{{ route('journal.create', ['category' => $category->id, 'day' => $i]) }}"
                                        {{ $i == $day ? 'selected' : '' }}>
                                        Hari ke-{{ $i }}
                                    </option>
                                @endfor
                            </select>
                            <i
                                class="fas fa-chevron-down absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
                        </div>
                    </div>


                    @if ($questions)
                        <!-- Form -->
                        <form method="POST" action="{{ route('journal.store') }}"> @csrf @method('POST')

                            <!-- Judul Jurnal (readonly) -->
                            <div>
                                <label class="block text-lg font-semibold text-indigo-800 mb-2">Journal Title</label>
                                <input type="text" name="title" value="{{ $questions->title }}" readonly
                                    class="w-full p-4 rounded-xl border border-indigo-200 bg-gray-100 focus:outline-none shadow-inner text-gray-700 font-semibold" />
                            </div>

                            <!-- Pertanyaan 1 -->
                            <div>
                                <label
                                    class="block text-lg font-semibold text-indigo-800 mb-2">{{ $questions->question1 }}</label>
                                <textarea name="answer1" rows="3" required
                                    class="w-full p-4 rounded-xl border border-indigo-200 bg-white/60 focus:outline-none focus:ring-2 focus:ring-indigo-300 resize-none shadow-inner"
                                    placeholder="Your answer..."></textarea>
                            </div>

                            <!-- Pertanyaan 2 -->
                            <div>
                                <label
                                    class="block text-lg font-semibold text-indigo-800 mb-2">{{ $questions->question2 }}</label>
                                <textarea name="answer2" rows="3" required
                                    class="w-full p-4 rounded-xl border border-indigo-200 bg-white/60 focus:outline-none focus:ring-2 focus:ring-indigo-300 resize-none shadow-inner"
                                    placeholder="Your answer..."></textarea>
                            </div>

                            <!-- Pertanyaan 3 -->
                            <div>
                                <label
                                    class="block text-lg font-semibold text-indigo-800 mb-2">{{ $questions->question3 }}</label>
                                <textarea name="answer3" rows="3" required
                                    class="w-full p-4 rounded-xl border border-indigo-200 bg-white/60 focus:outline-none focus:ring-2 focus:ring-indigo-300 resize-none shadow-inner"
                                    placeholder="Your answer..."></textarea>
                            </div>

                            <!-- Deskripsi Tambahan -->
                            <div>
                                <label class="block text-lg font-semibold text-indigo-800 mb-2">Additional Notes</label>
                                <textarea name="description" rows="4"
                                    class="w-full p-4 rounded-xl border border-indigo-200 bg-white/60 focus:outline-none focus:ring-2 focus:ring-indigo-300 resize-none shadow-inner"
                                    placeholder="Write any notes or reflections..."></textarea>
                            </div>

                            <!-- hidden input penting -->
                            <input type="hidden" name="category_id" value="{{ $category->id }}">
                            <input type="hidden" name="day" value="{{ $day }}">

                            <!-- Submit -->
                            <div class="text-right">
                                <button type="submit"
                                    class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-xl shadow-md transition">
                                    Save Journal
                                </button>
                            </div>
                        </form>
                    @else
                        <div
                            class="bg-white/60 border border-red-300 text-red-800 font-semibold text-center rounded-xl p-6 shadow">
                            Pertanyaan tidak tersedia pada hari ini.
                        </div>
                    @endif



                </section>
            </main>

            <!-- Sidebar Lagu -->
            <aside class="w-full md:w-80 bg-white rounded-3xl shadow-xl p-6 flex flex-col sticky top-10 h-fit">
                <h2 class="text-2xl font-bold mb-4 text-indigo-700">Now Playing</h2>

                @if ($currentLagu)
                    <img src="{{ asset('storage/' . $currentLagu->image) }}"
                        class="rounded-xl mb-4 w-full h-48 object-cover" alt="Cover Lagu">
                    <div class="mb-2">
                        <h3 class="text-lg font-semibold">{{ $currentLagu->judul }}</h3>
                        <p class="text-sm text-gray-600">{{ $currentLagu->penyanyi }}</p>
                    </div>
                    <audio controls class="w-full mb-6">
                        <source src="{{ asset('storage/' . $currentLagu->file) }}" type="audio/mpeg">
                    </audio>
                @else
                    <div class="text-gray-500 italic text-center mb-6">
                        Belum ada lagu dipilih.
                    </div>
                @endif

                <hr class="mb-4">

                <h3 class="text-lg font-semibold text-gray-700 mb-2">Playlist</h3>

                @if ($laguList->isNotEmpty())
                    <ul class="space-y-2">
                        @foreach ($laguList as $lagu)
                            <li class="flex justify-between items-center hover:bg-gray-100 p-2 rounded cursor-pointer"
                                onclick="window.location.href='{{ route('journal.play', $lagu->id) }}?category_id={{ $category->id }}&context=create&day={{ $day }}'">
                                <div>
                                    <p class="text-sm font-medium text-gray-800">{{ $lagu->judul }}</p>
                                    <p class="text-xs text-gray-500">{{ $lagu->penyanyi }}</p>
                                </div>
                                <i class="fas fa-play text-indigo-600"></i>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500 italic text-center">
                        Pilih kategori terlebih dahulu untuk melihat playlist.
                    </p>
                @endif
            </aside>

        </div>

    </body>

    </html>
