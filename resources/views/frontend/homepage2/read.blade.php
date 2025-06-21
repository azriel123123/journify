ini view <!-- resources/views/journal/view.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>View Journal</title>
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
        <!-- Back Button -->
        <div class="mb-6">
          <button onclick="history.back()"
            class="inline-flex items-center text-indigo-700 hover:text-indigo-900 font-semibold transition text-base">
            <i class="fas fa-arrow-left mr-2"></i> Back
          </button>
        </div>

        <!-- Title -->
        <h2 class="text-3xl font-extrabold mb-8 text-indigo-800 drop-shadow-md">View Journal</h2>

        <!-- Form -->
        <form class="space-y-10 bg-white/40 border border-white/30 backdrop-blur-2xl rounded-3xl shadow-xl p-8">

          <!-- Judul -->
          <div>
            <label class="block text-lg font-semibold text-indigo-800 mb-2">Title</label>
            <input id="title" type="text" disabled value="My Peaceful Sunday"
              class="editable w-full p-4 rounded-xl border border-indigo-200 bg-white/60 shadow-inner focus:outline-none focus:ring-2 focus:ring-indigo-300" />
            <div class="mt-2 text-right">
              <button type="button" onclick="toggleEdit('title')" class="edit-btn px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold shadow">Edit</button>
            </div>
          </div>

          <!-- Question 1 -->
          <div>
            <label class="block text-lg font-semibold text-indigo-800 mb-2">How do you feel today?</label>
            <textarea id="q1" rows="3" disabled
              class="editable w-full p-4 rounded-xl border border-indigo-200 bg-white/60 shadow-inner resize-none focus:outline-none focus:ring-2 focus:ring-indigo-300">I'm feeling calm and content today.</textarea>
            <div class="mt-2 text-right">
              <button type="button" onclick="toggleEdit('q1')" class="edit-btn px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold shadow">Edit</button>
            </div>
          </div>

          <!-- Question 2 -->
          <div>
            <label class="block text-lg font-semibold text-indigo-800 mb-2">Highlight of the Day</label>
            <textarea id="q2" rows="3" disabled
              class="editable w-full p-4 rounded-xl border border-indigo-200 bg-white/60 shadow-inner resize-none focus:outline-none focus:ring-2 focus:ring-indigo-300">Watching the sunset with a cup of tea.</textarea>
            <div class="mt-2 text-right">
              <button type="button" onclick="toggleEdit('q2')" class="edit-btn px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold shadow">Edit</button>
            </div>
          </div>

          <!-- Question 3 -->
          <div>
            <label class="block text-lg font-semibold text-indigo-800 mb-2">What are you grateful for?</label>
            <textarea id="q3" rows="3" disabled
              class="editable w-full p-4 rounded-xl border border-indigo-200 bg-white/60 shadow-inner resize-none focus:outline-none focus:ring-2 focus:ring-indigo-300">Grateful for quiet moments and health.</textarea>
            <div class="mt-2 text-right">
              <button type="button" onclick="toggleEdit('q3')" class="edit-btn px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold shadow">Edit</button>
            </div>
          </div>

          <!-- Additional Notes -->
          <div>
            <label class="block text-lg font-semibold text-indigo-800 mb-2">Additional Notes</label>
            <textarea id="q4" rows="4" disabled
              class="editable w-full p-4 rounded-xl border border-indigo-200 bg-white/60 shadow-inner resize-none focus:outline-none focus:ring-2 focus:ring-indigo-300">Reflected on how slowing down helps clarity.</textarea>
            <div class="mt-2 text-right">
              <button type="button" onclick="toggleEdit('q4')" class="edit-btn px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold shadow">Edit</button>
            </div>
          </div>
        </form>
      </section>
    </main>

    <!-- Sidebar -->
    <aside class="w-full md:w-80 bg-white rounded-3xl shadow-xl p-8 flex flex-col items-center sticky top-10 h-fit">
      <h2 class="text-3xl font-extrabold mb-8 text-indigo-700 drop-shadow-md">Music Player</h2>
      <img class="rounded-3xl shadow-lg mb-6 w-64 h-64 object-cover"
        src="https://storage.googleapis.com/a1aa/image/c14602bb-4ee5-42a4-a96f-723cc2d4c7e6.jpg" alt="Album cover" />
      <div class="text-center mb-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-1">Dreamscape</h3>
        <p class="text-gray-600 text-sm">Artist: Synthwave Collective</p>
      </div>
      <audio class="w-full rounded-xl shadow-inner mb-6" controls>
        <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg" />
      </audio>
      <div class="flex justify-center space-x-10 text-indigo-600 text-3xl select-none">
        <button type="button" aria-label="Previous track"
          class="hover:text-indigo-900 transition-transform active:scale-90">
          <i class="fas fa-backward"></i>
        </button>
        <button type="button" aria-label="Play/Pause"
          class="hover:text-indigo-900 transition-transform active:scale-90">
          <i class="fas fa-play"></i>
        </button>
        <button type="button" aria-label="Next track"
          class="hover:text-indigo-900 transition-transform active:scale-90">
          <i class="fas fa-forward"></i>
        </button>
      </div>
    </aside>
  </div>

  <script>
    function toggleEdit(id) {
      const el = document.getElementById(id);
      const btn = el.parentElement.querySelector('.edit-btn');

      if (el.disabled) {
        el.disabled = false;
        el.focus();
        btn.textContent = "Save";
        btn.classList.remove('bg-indigo-600');
        btn.classList.add('bg-green-600');
      } else {
        el.disabled = true;
        btn.textContent = "Edit";
        btn.classList.remove('bg-green-600');
        btn.classList.add('bg-indigo-600');
        console.log(`Saved [${id}]:`, el.value);
      }
    }
  </script>
</body>

</html>