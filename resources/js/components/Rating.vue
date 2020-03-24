<template>
	<div class="form-center-card-ext-p py-4">
		<div class="item-row">
			<h4 class="item-title">{{rating.name}}</h4>
			<input v-if="rating.type < 2" type="hidden" :value="RatingValue" :name="ratingValueInput">
			<input v-if="rating.type > 0" type="hidden" :value="RatingText" :name="ratingTextInput">
				
			<div v-if="rating.type < 2" class="mt-5">
				<label class="form-label">Avaliação</label>
				<svg v-for="index in 5" :key="index" @click="RatingValue = index"
						class="ratings__star-icon" viewBox="0 0 512.001 512.001" xml:space="preserve">
					<path class="ratings--star-front" :class="[RatingValue >= index ? 'active' : 'normal']" d="M499.92,188.26l-165.839-15.381L268.205,19.91c-4.612-10.711-19.799-10.711-24.411,0l-65.875,152.97 L12.08,188.26c-11.612,1.077-16.305,15.52-7.544,23.216l125.126,109.922L93.044,483.874c-2.564,11.376,9.722,20.302,19.749,14.348 L256,413.188l143.207,85.034c10.027,5.954,22.314-2.972,19.75-14.348l-36.619-162.476l125.126-109.922 C516.225,203.78,511.532,189.337,499.92,188.26z"/>
					<path class="ratings--star-back" :class="[RatingValue >= index ? 'active' : 'normal']" d="M268.205,19.91c-4.612-10.711-19.799-10.711-24.411,0l-65.875,152.97L12.08,188.26 c-11.612,1.077-16.305,15.52-7.544,23.216l125.126,109.922L93.044,483.874c-2.564,11.376,9.722,20.302,19.749,14.348l31.963-18.979 c4.424-182.101,89.034-310.338,156.022-383.697L268.205,19.91z"/>
				</svg>
				<span v-if="hasError(ratingValueInput)"class="input-validation-error" role="alert">
					<strong>{{ error(ratingValueInput) }}</strong>
				</span>
			</div>
			<div v-if="rating.type > 0" class="mt-5">
				<label class="form-label">Observações</label>
				<textarea class="ratings__text" rows=4 v-model="RatingText">
				</textarea>
				<span v-if="hasError(ratingTextInput)"class="input-validation-error" role="alert">
					<strong>{{ error(ratingTextInput) }}</strong>
				</span>
			</div>
		</div>
	</div>
</template>

<script>
export default {
    props: {
        rating: {
            type: Object,
        },
				errors: {
				},
				old: {
				},
    },
    data: function() {
        return {
					RatingValue: 0,
					RatingText: "",
        };
    },
    computed: {
			ratingValueInput() {
				return this.rating.slug + "_value";
			},
			ratingTextInput() {
				return this.rating.slug + "_text";
			}
    },
    methods: {
			hasError(field) {
				return this.errors.hasOwnProperty(field);
			},
			error(field) {
				if (this.hasError(field)) {
					return this.errors[field][0];
				}
			},
    },
    mounted() {
			if (this.old.hasOwnProperty(this.ratingValueInput)) {
				this.RatingValue = parseInt(this.old[this.ratingValueInput]);
				if (Number.isNaN(this.RatingValue)) {
					this.RatingValue = 0;
				}
			}
			if (this.old.hasOwnProperty(this.ratingTextInput)) {
				this.RatingText = this.old[this.ratingTextInput];
			}
    }
};
</script>

