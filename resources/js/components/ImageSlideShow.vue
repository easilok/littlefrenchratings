<template>
	<div class="mx-auto relative inline-block" v-if="hasSlides">
		<!-- slides -->
		<img v-for="slide in slides" :key="slide.id"
			class="max-h-screen min-height-350"
			v-show="slides[activeSlide].id === slide.id"
			:src="imgPath(slide.path)">
		<!-- Prev/Next Arrows -->
		<div class="absolute inset-0 flex">
			<div class="flex items-center justify-start w-1/2">
				<button
					class="bg-teal-100 text-teal-500 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-6"
					@click="decrementSlide">
					&#8592;
				</button>
			</div>
			<div class="flex items-center justify-end w-1/2">
				<button
					class="bg-teal-100 text-teal-500 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -mr-6"
					@click="incrementSlide">
					&#8594;
				</button>
			</div>
		</div>
	</div>
</template>

<script>
export default {
    props: {
        slides: {
            type: Array,
        },
    },
    data: function() {
        return {
					activeSlide: 0,
        };
    },
    computed: {
			hasSlides() {
				return this.slides.length > 0;
			},
    },
    methods: {
			imgPath(path) {
				return '/storage/uploads/' + path;
			},
			incrementSlide() {
				if (this.activeSlide === this.slides.length - 1) {
					this.activeSlide = 0;
				} else {
					this.activeSlide += 1;
				}
			},
			decrementSlide() {
				if (this.activeSlide === 0) {
					this.activeSlide = this.slides.length - 1;
				} else {
					this.activeSlide -= 1;
				}
			},
    },
    mounted() {
    }
};
</script>
