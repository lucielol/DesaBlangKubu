<nav class="fixed left-0 top-0 z-50 w-full bg-black/50 backdrop-blur-md" x-data="{ open: false }">
  <div class="mx-auto flex items-center justify-between px-4 py-2 sm:px-6 md:px-10">
    <!-- Logo -->
    <div class="flex items-center space-x-4">
      <a href="/" class="leading-tight">
        <div class="text-lg font-bold text-white">Desa Blang Kubu</div>
        <div class="text-sm text-white">Kabupaten Bireuen</div>
      </a>
    </div>

    <!-- Hamburger Button -->
    <div class="md:hidden">
      <button @click="open = !open" class="text-white focus:outline-none">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24"
          stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </button>
    </div>

    <!-- Desktop Menu -->
    <div class="hidden items-center space-x-6 text-sm font-semibold text-white md:flex">
      <a href="{{ route('home') }}"
        class="{{ request()->routeIs('home') ? 'border-b-2 border-white' : 'hover:text-yellow-300' }}">Home</a>
      <a href="{{ route('profile.index') }}"
        class="{{ request()->routeIs('profile.*') ? 'border-b-2 border-white' : 'hover:text-yellow-300' }}">Profil
        Desa</a>
      <a href="{{ route('infografis.index') }}"
        class="{{ request()->routeIs('infografis.*') ? 'border-b-2 border-white' : 'hover:text-yellow-300' }}">Infografis</a>
      <a href="{{ route('news.index') }}"
        class="{{ request()->routeIs('news.*') ? 'border-b-2 border-white' : 'hover:text-yellow-300' }}">Berita</a>

      <!-- Auth Menu -->
      <div class="relative" x-data="{ userOpen: false }">
        @auth
          <button @click="userOpen = !userOpen"
            class="flex items-center gap-2 hover:cursor-pointer hover:text-yellow-300 focus:outline-none">
            Halo, {{ Auth::user()->name }}
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div x-show="userOpen" @click.away="userOpen = false"
            class="absolute right-0 z-50 mt-2 w-40 rounded-md bg-white py-2 text-gray-800 shadow-lg">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
            <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="w-full px-4 py-2 text-left hover:bg-gray-100">Logout</button>
            </form>
          </div>
        @else
          <!-- Login / Register Button -->
          <div x-data="{
              open: {{ $errors->any() ? 'true' : 'false' }},
              tab: '{{ old('_token') && request()->has('register') ? 'register' : 'login' }}'
          }" x-init="if ({{ $errors->any() ? 'true' : 'false' }}) {
              open = true;
              @if (old('register_name') || old('register_email') || old('register_password') || old('register_password_confirmation')) tab = 'register';
			@else
			  tab = 'login'; @endif
          }" class="relative">
            <button @click="open = !open; if(!open) tab = 'login'"
              class="flex items-center justify-center gap-1 rounded-full border-2 border-white px-3 py-1 font-bold uppercase hover:border-yellow-300 hover:text-yellow-300 focus:outline-none">
              Masuk
            </button>
            <div x-show="open" x-transition @click.away="open = false"
              class="absolute right-0 z-50 mt-2 w-80 rounded-xl bg-white/95 p-5 text-gray-800 shadow-lg">
              <template x-if="tab === 'login'">
                @include('pages.home.login')
              </template>
              <template x-if="tab === 'register'">
                @include('pages.home.register')
              </template>
            </div>
          </div>
        @endauth
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="open" x-transition x-cloak
    class="absolute left-0 top-full z-40 h-screen w-full space-y-4 rounded-b-xl bg-black/50 px-4 py-6 text-white backdrop-blur-md md:hidden">
    <a href="{{ route('home') }}"
      class="block {{ request()->routeIs('home') ? 'border-b border-white pb-1' : 'hover:text-yellow-300' }}">Home</a>
    <a href="{{ route('profile.index') }}"
      class="block {{ request()->routeIs('profile.*') ? 'border-b border-white pb-1' : 'hover:text-yellow-300' }}">Profil
      Desa</a>
    <a href="{{ route('infografis.index') }}"
      class="block {{ request()->routeIs('infografis.*') ? 'border-b border-white pb-1' : 'hover:text-yellow-300' }}">Infografis</a>
    <a href="{{ route('news.index') }}"
      class="block {{ request()->routeIs('news.*') ? 'border-b border-white pb-1' : 'hover:text-yellow-300' }}">Berita</a>

    @guest
      <div x-data="{ openLogin: false, tab: 'login' }" class="w-full">
        <button @click="openLogin = !openLogin"
          class="mt-4 flex w-full items-center justify-center gap-1 rounded-full border-2 border-white px-3 py-2 font-bold uppercase hover:border-yellow-300 hover:text-yellow-300 focus:outline-none">
          <span x-text="tab === 'login' ? 'Masuk' : 'Daftar'"></span>
        </button>
        <div x-show="openLogin" x-transition class="fixed inset-0 z-50 flex items-center justify-center px-4">
          <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
          <div class="relative z-10 mx-auto w-full max-w-md rounded-xl bg-white/95 p-5 text-gray-800 shadow-lg">
            <button @click="openLogin = false"
              class="absolute right-2 top-2 text-2xl text-gray-400 hover:text-gray-700">&times;</button>
            <div class="mb-3 flex justify-center gap-2">
              <button @click="tab = 'login'"
                :class="tab === 'login' ? 'font-bold text-pink-600 underline' : 'text-gray-500'">Login</button>
              <span>|</span>
              <button @click="tab = 'register'"
                :class="tab === 'register' ? 'font-bold text-pink-600 underline' : 'text-gray-500'">Register</button>
            </div>
            <template x-if="tab === 'login'">
              @include('pages.home.login')
            </template>
            <template x-if="tab === 'register'">
              @include('pages.home.register')
            </template>
          </div>
        </div>
      </div>
    @endguest
  </div>
</nav>
