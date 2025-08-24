<!-- Tombol Buka Modal -->
<button id="btn-pengaduan"
	class="fixed bottom-8 right-8 z-[999] flex items-center gap-2 rounded-full bg-pink-600/50 px-6 py-3 text-lg font-semibold text-white shadow-lg backdrop-blur-md hover:cursor-pointer hover:bg-pink-700/60 focus:outline-none">
	<i class="fa fa-bullhorn"></i>
	Pengaduan
</button>

<!-- Modal -->
<div id="modal-pengaduan" class="fixed inset-0 z-50 hidden items-end justify-end transition-all duration-300 ease-in-out">
	<div id="modal-content-pengaduan-wrapper" class="relative mb-24 mr-8">
		<div
			class="w-80 translate-y-8 rounded-xl border border-gray-200 bg-white p-6 opacity-0 shadow-md transition-all duration-300 ease-in-out"
			id="modal-content-pengaduan" style="z-index:51">
			<button id="close-pengaduan"
				class="absolute right-3 top-3 text-2xl text-gray-400 hover:text-gray-700">&times;</button>
			<h2 class="mb-4 text-xl font-bold">Form Pengaduan</h2>
			@include('components.form-complaint')
		</div>
	</div>
</div>

<!-- Script -->
<script>
	document.addEventListener('DOMContentLoaded', function() {
		const btn = document.getElementById('btn-pengaduan');
		const modal = document.getElementById('modal-pengaduan');
		const modalContent = document.getElementById('modal-content-pengaduan');
		const close = document.getElementById('close-pengaduan');
		const wrapper = document.getElementById('modal-content-pengaduan-wrapper');

		function openModal() {
			modal.classList.remove('hidden');
			modal.classList.add('flex');
			setTimeout(() => {
				modalContent.classList.remove('translate-y-8', 'opacity-0');
				modalContent.classList.add('translate-y-0', 'opacity-100');
			}, 10);
		}

		function closeModal() {
			modalContent.classList.add('translate-y-8', 'opacity-0');
			modalContent.classList.remove('translate-y-0', 'opacity-100');
			setTimeout(() => {
				modal.classList.add('hidden');
				modal.classList.remove('flex');
			}, 300);
		}

		btn.addEventListener('click', () => {
			if (modal.classList.contains('hidden')) {
				openModal();
			} else {
				closeModal();
			}
		});

		close.addEventListener('click', closeModal);

		modal.addEventListener('click', (e) => {
			if (!wrapper.contains(e.target)) {
				closeModal();
			}
		});

		// Tutup modal jika tekan tombol Escape
		document.addEventListener('keydown', (e) => {
			if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
				closeModal();
			}
		});
	});
</script>
