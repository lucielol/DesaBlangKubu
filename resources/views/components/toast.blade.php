<div x-data="{
    notifications: [],
    displayDuration: 6000,
    addNotification(notification) {
        const id = Date.now()
        notification.id = id
        this.notifications.push(notification)

        setTimeout(() => {
            this.notifications = this.notifications.filter(n => n.id !== id)
        }, this.displayDuration)
    }
}" x-init="() => {
    // Laravel session-based toast
    @if(session('success'))
    addNotification({ variant: 'success', message: '{{ session('success') }}' });
    @endif

    @if(session('info'))
    addNotification({ variant: 'info', message: '{{ session('info') }}' });
    @endif

    @if(session()->has('error') || $errors->any())
    addNotification({ variant: 'danger', message: '{{ session('error') ?? $errors->first() }}' });
    @endif
}"
	class="fixed bottom-5 right-5 z-[9999] flex w-full max-w-sm flex-col space-y-3">

	<template x-for="notification in notifications" :key="notification.id">
		<div x-transition class="flex items-start gap-3 rounded-lg p-4 shadow-lg backdrop-blur"
			:class="{
			    'bg-blue-400/50 border border-blue-400 text-white': notification.variant === 'info',
			    'bg-green-400/50 border border-green-400 text-white': notification.variant === 'success',
			    'bg-yellow-400/50 border border-yellow-400 text-white': notification.variant === 'warning',
			    'bg-red-400/50 border border-red-400 text-white': notification.variant === 'danger',
			    'bg-gray-800 text-white': notification.variant === 'message'
			}">
			<div class="flex-1 text-sm">
				<p x-text="notification.message"></p>
			</div>

			<button @click="notifications = notifications.filter(n => n.id !== notification.id)">
				<svg class="mt-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
					<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
				</svg>
			</button>
		</div>
	</template>
</div>
