@props(['slides'])

<div x-data="{
    slides: {{ Js::from($slides) }},
    currentSlideIndex: 1,
    previous() {
        if (this.currentSlideIndex > 1) {
            this.currentSlideIndex = this.currentSlideIndex - 1;
        } else {
            this.currentSlideIndex = this.slides.length;
        }
    },
    next() {
        if (this.currentSlideIndex < this.slides.length) {
            this.currentSlideIndex = this.currentSlideIndex + 1;
        } else {
            this.currentSlideIndex = 1;
        }
    }
}" class="relative w-full overflow-hidden">

	<!-- previous button -->
	<button type="button"
		class="absolute left-5 top-1/2 z-20 flex hidden -translate-y-1/2 items-center justify-center rounded-full bg-black/40 p-2 text-white transition hover:bg-black/60 md:block"
		aria-label="previous slide" x-on:click="previous()">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
			class="size-5 pr-0.5 md:size-6" aria-hidden="true">
			<path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
		</svg>
	</button>

	<!-- next button -->
	<button type="button"
		class="absolute right-5 top-1/2 z-20 flex hidden -translate-y-1/2 items-center justify-center rounded-full bg-black/40 p-2 text-white transition hover:bg-black/60 md:block"
		aria-label="next slide" x-on:click="next()">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="3"
			class="size-5 pl-0.5 md:size-6" aria-hidden="true">
			<path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
		</svg>
	</button>

	<!-- slides desktop -->
	<div class="relative hidden h-screen w-full md:block">
		<template x-for="(slide, index) in slides" :key="index">
			<div x-show="currentSlideIndex === index + 1" class="absolute inset-0" x-transition.opacity.duration.1000ms>
				<img class="absolute h-full w-full object-cover" :src="slide.imgSrc" :alt="slide.imgAlt" />
			</div>
		</template>
	</div>

	<!-- slides mobile (card style) -->
	<div class="mt-20 flex w-full justify-center px-4 md:hidden">
		<template x-for="(slide, index) in slides" :key="index">
			<div x-show="currentSlideIndex === index + 1"
				class="relative mx-auto w-full overflow-hidden rounded-xl bg-white shadow-lg transition-all duration-500">
				<div class="relative">
					<img class="h-48 w-full object-cover" :src="slide.imgSrc" :alt="slide.imgAlt" />
					<button type="button" x-on:click="previous()"
						class="absolute left-2 top-1/2 -translate-y-1/2 rounded-full bg-black/40 p-2 text-white transition hover:bg-black/60">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.75 19.5 8.25 12l7.5-7.5" />
						</svg>
					</button>
					<button type="button" x-on:click="next()"
						class="absolute right-2 top-1/2 -translate-y-1/2 rounded-full bg-black/40 p-2 text-white transition hover:bg-black/60">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
						</svg>
					</button>
				</div>
			</div>
		</template>
	</div>
</div>
