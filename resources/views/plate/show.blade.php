@extends ('layouts.app')

@section('content')

<div class="container mx-auto">

	@if (Gate::allows('edit'))
	<div class="w-full py-3">
		<a class="btn-std btn-blue" href="/plate/{{$plate->id}}/edit">Editar</a>
	</div>
	@endif
	<!-- Generic Information -->
	<article class="rounded-lg border border-gray-400 shadow-lg flex w-full flex-wrap my-4">
		<!-- Plate Properties -->
		<div class="w-full md:w-3/5 md:border-r md:border-gray-400">
			<div class="flex flex-col justify-between h-full">
				<div class="px-4 py-4">
					<div class="w-full tracking-wider mb-2 pb-2">
						<span class="text-2xl">{{$plate->name}}</span>
						<span class="text-sm">- <a class="hover:underline" href="/establishment/{{$plate->establishment->id}}">{{$plate->establishment->name}}, {{$plate->establishment->parish}}</a></span>
					</div>
					@if ($plate->obs)
					<div class="pl-4 pt-0 p-2 w-full italic">
						{{$plate->obs}} 
					</div>
					@endif
					<div class="p-2 w-full flex justify-between">
						<div>
							<span class="text-lg font-bold text-gray-800">{{$plate->ratingAvg > 0 ? $plate->ratingAvg : '-'}}</span><span class="text-sm">/5</span>
						</div>
						<div>
							<span class="text-lg font-bold text-gray-800">{{$plate->price > 0 ? $plate->price : '-'}}</span><span class="text-sm">€</span>
							@if ($plate->priceAvg)
								<span class="text-sm">/~{{$plate->priceAvg}}€</span>
							@endif
						</div>
					</div>
					@if ($plate->establishment->address)
					<div class="p-2 w-full">
						{{$plate->establishment->address}}, 
						{{$plate->establishment->parish}}
						@if ($plate->establishment->city)
							, {{$plate->establishment->city}}
						@endif
					</div>
					@endif
					@if ($plate->establishment->email)
					<div class="p-2 w-full"><a href="mailto:{{$plate->establishment->email}}">
						<img class="inline-block mr-2" src="/svg/icons/paper-plane.svg" style="height:20px" alt="email">{{$plate->establishment->email}}
					</a></div>
					@endif
					@if ($plate->establishment->telephone1)
					<div class="p-2 w-full"><a href="tel:{{$plate->establishment->telephone1}}">
						<img class="inline-block mr-2" src="/svg/icons/telephone.svg" style="height:20px" alt="email">{{$plate->establishment->telephone1}}
					</a></div>
					@endif
					@if ($plate->establishment->timetable)
					<div class="p-2 w-full">
						Horário: {{$plate->establishment->timetable}}
					</div>
					@endif
				</div>
			</div>
		</div>
		<!-- Plate Cover -->
		<div class="p-2 w-full md:w-2/5 border-t border-gray-400 md:border-0 flex">
			<div class="w-full self-center">
				@if ($plate->cover->count() > 0)
					<img src="/storage/uploads/{{$plate->cover->first()->path}}" alt="{{$plate->name}}">
				@else
					<img class="rounded" src="/css/icons/francesinha_animated.png" alt="{{$plate->name}}">
				@endif
			</div>
		</div>
	</article>
	<!-- Plate Photos -->
	<article class="rounded-lg border border-gray-400 shadow-lg w-full my-4">
		<div class="p-6 w-full flex ">
			<image-slideshow :slides=@json($plate->images)></image-slideshow>
{{--
			<div class="mx-auto relative inline-block" x-data="{ activeSlide: 0, slides: {{$plate->images}} }">
				<!-- slides -->
				<template x-for="slide in slides" :key="slide.id">
					<img
						class="max-h-screen min-height-350"
						x-show="slides[activeSlide].id === slide.id"
						:src="'/storage/uploads/'+slide.path">
				</template>
				<!-- Prev/Next Arrows -->
				<div class="absolute inset-0 flex">
					<div class="flex items-center justify-start w-1/2">
						<button
							class="bg-teal-100 text-teal-500 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -ml-6"
							x-on:click="activeSlide = activeSlide === 0 ? slides.length - 1 : activeSlide - 1">
							&#8592;
						</button>
					</div>
					<div class="flex items-center justify-end w-1/2">
						<button
							class="bg-teal-100 text-teal-500 hover:text-orange-500 font-bold hover:shadow-lg rounded-full w-12 h-12 -mr-6"
							x-on:click="activeSlide = activeSlide === slides.length - 1 ? 0 : activeSlide + 1">
							&#8594;
						</button>
					</div>
				</div>
			</div>
--}}
		</div>
	</article>
	<!-- Plate Establishment Location -->
	<article class="rounded-lg border border-gray-400 shadow-lg w-full my-4">
		<div class="px-4 py-4 w-full">
			<div class="w-full overflow-hidden">
				<iframe height="320px" class="w-full" src="http://www.google.com/maps/embed/v1/place?
															q={{$plate->establishment->location}}
															&key=AIzaSyC6F2I5PmR3YM9gx4xC39JnwN5GMJAfnq4
															&zoom=18&maptype=satellite"  allowfullscreen
								frameborder="0"
								scrolling="yes"
								marginheight="0"
								marginwidth="0"
				>
				</iframe>
			</div>
		</div>
	</article>
	<!-- Ratings -->
	@if ($latestRatings)
	<article class="rounded-lg border border-gray-400 shadow-lg w-full my-4">
		<div class="px-4 py-4 w-full tracking-wider">
			<span class="text-2xl">Últimas Avaliações:</span>
		</div>
		@foreach ($latestRatings as $rating)
		<div class="px-4 py-4 w-full border-t border-gray-400 flex flex-col">
			<div class="flex justify-between py-2">
				<div class="flex flex-col self-center">
					{{$rating['user']->name}}<br>
					{{$rating['visit_at']}}
				</div>
				<div class="self-center">
					<span class="text-lg font-bold text-gray-800">{{$rating['average'] > 0 ? $rating['average'] : '-'}}</span><span class="text-sm">/5</span>
				</div>
			</div>	
			@if ($rating['max'] && $rating['min'])
			<div class="flex justify-between flex-col sm:flex-row py-2">
				<span class="pb-4 sm:pb-0">
					<svg class="h-4 inline-block fill-current text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <path d="M7 10v8h6v-8h5l-8-8-8 8h5z"/>
					</svg>
					{{$rating['max']->rating->name}} ({{$rating['max']->rating_value}}<span class="text-xs">/5</span>)
				</span>
				<span>
					<svg class="h-4 inline-block fill-current text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
						<path d="M7 10V2h6v8h5l-8 8-8-8h5z"/>
					</svg>
					{{$rating['min']->rating->name}} ({{$rating['min']->rating_value}}<span class="text-xs">/5</span>)
				</span>
			</div>	
			@endif
			<div class="flex justify-between flex-col sm:flex-row mt-2 py-2">
				<span class="text-sm italic px-2">{{$rating['general']}}</span>
			</div>	
		</div>
		@endforeach
	</article>
	@endif
</div>

@endsection
