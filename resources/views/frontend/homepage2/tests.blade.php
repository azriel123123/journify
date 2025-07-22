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
    <main class="lg:col-span-8 space-y-10">
      <section class="bg-white p-6 rounded-2xl shadow-md flex items-center justify-between gap-6 opacity-0 translate-y-8 scale-95">
        <div>
          <h2 class="text-xl font-bold text-gray-900 mb-1">Start your day with a journal</h2>
          <p class="text-sm text-gray-600">Take a few minutes to reflect and write.</p>
        </div>
        <button class="bg-secondary hover:bg-orange-500 text-white px-5 py-2 rounded-lg text-sm font-semibold transition duration-300">
          ✍ Create Journal
        </button>
      </section>
      <header class="opacity-0 translate-y-8 scale-95">
        <h1 class="text-4xl font-bold text-gray-900 mb-1">Welcome back, Azriel 👋</h1>
        <p class="text-lg text-gray-600">Hope today is full of reflection and growth!</p>
      </header>
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
      <section class="bg-blue-50 p-6 rounded-xl border border-blue-200 shadow opacity-0 translate-y-8 scale-95">
        <h2 class="font-semibold text-blue-800 text-sm mb-2">✨ Daily Quote</h2>
        <blockquote class="text-gray-700 italic text-lg leading-relaxed">
          “The journey of a thousand miles begins with a single step.”
        </blockquote>
        <p class="text-sm text-gray-500 mt-2 text-right">– Lao Tzu</p>
      </section>
      <section class="opacity-0 translate-y-8 scale-95">
        <h2 class="text-lg font-semibold mb-3">Mood Categories</h2>
        <div class="flex gap-3 overflow-x-auto pb-2">
          <div class="bg-moodHappy rounded-xl px-4 py-3 min-w-[90px] text-center shadow-sm card">😊<div class="text-sm mt-1">Happy</div></div>
          <div class="bg-moodSad rounded-xl px-4 py-3 min-w-[90px] text-center shadow-sm card">😢<div class="text-sm mt-1">Sad</div></div>
          <div class="bg-moodNeutral rounded-xl px-4 py-3 min-w-[90px] text-center shadow-sm card">😐<div class="text-sm mt-1">Neutral</div></div>
          <div class="bg-moodAngry rounded-xl px-4 py-3 min-w-[90px] text-center shadow-sm card">😡<div class="text-sm mt-1">Angry</div></div>
          <div class="bg-moodTired rounded-xl px-4 py-3 min-w-[90px] text-center shadow-sm card">😴<div class="text-sm mt-1">Tired</div></div>
        </div>
      </section>
      <section class="opacity-0 translate-y-8 scale-95">
        <div class="mb-4">
          <h2 class="text-lg font-semibold">Your Journals</h2>
          <span class="text-sm text-gray-500">You have <span class="font-bold text-gray-700">5 journals</span></span>
        </div>
        <div class="divide-y divide-gray-200 rounded-xl bg-white shadow-md overflow-hidden">
          <div class="p-5 item smooth-anim">
            <div class="flex justify-between items-center mb-1">
              <h3 class="text-base font-bold text-gray-900">A Joyful Morning</h3>
              <span class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full font-medium">😊 Happy</span>
            </div>
            <p class="text-sm text-gray-600">Woke up energized, birds chirping, felt grateful to be alive.</p>
            <p class="text-xs text-gray-400 mt-2">📅 July 6, 2025</p>
          </div>
          <div class="p-5 item smooth-anim">
            <div class="flex justify-between items-center mb-1">
              <h3 class="text-base font-bold text-gray-900">Missing Friends</h3>
              <span class="text-xs bg-pink-100 text-pink-700 px-3 py-1 rounded-full font-medium">😢 Sad</span>
            </div>
            <p class="text-sm text-gray-600">Thinking about my old friends and good memories.</p>
            <p class="text-xs text-gray-400 mt-2">📅 July 5, 2025</p>
          </div>
        </div>
      </section>
    </main>
    <aside class="lg:col-span-4 sticky top-0 h-[calc(100vh-80px)] space-y-6 opacity-0 translate-y-8 scale-95">
      <div class="bg-white rounded-2xl shadow-md p-5 h-full flex flex-col justify-between">
        <div>
          <p class="text-sm text-gray-500 mb-2">Now Playing</p>
          <img src="{{ asset('img/news/img01.jpg') }}" alt="JKT48" class="rounded-xl mb-3 w-full object-cover">
          <div class="text-base font-semibold text-gray-900">Seventeen</div>
          <p class="text-sm text-gray-600 mb-2">JKT48</p>
        </div>
        <audio class="w-full mt-auto" controls>
          <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg" />
        </audio>
      </div>
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
</body>

</html>
