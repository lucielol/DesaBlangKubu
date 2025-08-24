@props([
    'title' => '',
    'image' => null,
])

<div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-200">
  @if ($image)
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover">
  @endif

  <div class="p-4 space-y-3">
    @if ($title)
      <h2 class="text-lg font-semibold text-gray-800">{{ $title }}</h2>
    @endif

    <div class="text-gray-600 text-sm">
      {{ $slot }}
    </div>

    @isset($footer)
      <div class="pt-2 border-t text-sm text-right text-gray-500">
        {{ $footer }}
      </div>
    @endisset
  </div>
</div>
