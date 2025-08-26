@extends('layouts.dashboard')
@section('title', 'Daftar Pengaduan Masyarakat')

@section('content')
  <div class="overflow-x-auto rounded-lg border border-gray-300">
    <table class="min-w-full divide-y divide-gray-200 text-xs sm:text-sm md:table">
      <thead>
        <tr class="bg-gray-100">
          <th class="w-0 border-r border-gray-200 px-4 py-2 text-center text-xs font-medium uppercase text-gray-500">NO
          </th>
          <th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">Nama</th>
          <th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">No. HP</th>
          <th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">Kategori
          </th>
          <th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">Isi</th>
          <th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">Gambar</th>
          <th class="border-r border-gray-200 px-4 py-2 text-left text-xs font-medium uppercase text-gray-500">Tanggal</th>
          <th class="px-4 py-2 text-center text-xs font-medium uppercase text-gray-500">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200 bg-white text-sm">
        @forelse($complaints as $complaint)
          <tr class="hover:bg-gray-50">
            <td class="border-r border-gray-200 px-4 py-2 text-center">{{ $loop->index + 1 }}</td>
            <td class="border-r border-gray-200 px-4 py-2">{{ $complaint->name }}</td>
            <td class="border-r border-gray-200 px-4 py-2">{{ $complaint->no_hp }}</td>
            <td class="border-r border-gray-200 px-4 py-2">{{ ucfirst($complaint->status) }}</td>
            <td class="border-r border-gray-200 px-4 py-2">{{ $complaint->content }}</td>
            <td class="border-r border-gray-200 px-4 py-2">
              @if ($complaint->image)
                <a href="{{ asset('storage/complaints/' . basename($complaint->image)) }}"
                  onclick="
										const w = 1200, h = 1000;
										const left = (window.screen.width/2) - (w/2);
										const top = (window.screen.height/2) - (h/2);
										window.open(this.href, 'popup', `width=${w},height=${h},left=${left},top=${top}`);
										return false;"
                  class="text-blue-600 underline">Lihat</a>
              @else
                -
              @endif
            </td>
            <td class="border-r border-gray-200 px-4 py-2">{{ $complaint->created_at->format('d/m/Y H:i') }}</td>
            <td class="flex justify-center gap-2 px-4 py-2">
              <form action="#approve" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit" title="Setujui"
                  class="cursor-pointer rounded bg-white text-green-600 transition hover:bg-green-100 hover:text-green-800">
                  <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                </button>
              </form>
              <form action="#reject" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit" title="Tolak"
                  class="cursor-pointer rounded bg-white text-red-600 transition hover:bg-red-100 hover:text-red-800">
                  <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="px-3 py-2 text-center italic text-sm text-gray-500">Belum ada pengaduan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="border-t border-gray-300 p-3">
      {{ $complaints->links() }}
    </div>
  </div>
@endsection
