@extends ('layouts.app')

@section('content')

<div class="container mx-auto">

	<!-- Generic Information -->
	<article class="rounded-lg border border-gray-400 shadow-lg flex w-full flex-wrap my-4">
		<!-- Plate Properties -->
		<div class="w-full md:w-3/5 md:border-r md:border-gray-400">
			<div class="flex flex-col justify-between h-full">
				<div class="px-4 py-4">
					<div class="w-full tracking-wider mb-2 pb-2">
						@if (Gate::allows('edit'))
						<a href= "/plate/{{$plate->id}}/edit">
							<svg class="fill-current text-platform-color field-icon mr-2" viewBox="0 0 469.336 469.336" style="" xml:space="preserve">
								<g>
									<g>
										<path d="M456.836,76.168l-64-64.054c-16.125-16.139-44.177-16.17-60.365,0.031L45.763,301.682
											c-1.271,1.282-2.188,2.857-2.688,4.587L0.409,455.73c-1.063,3.722-0.021,7.736,2.719,10.478c2.031,2.033,4.75,3.128,7.542,3.128
											c0.979,0,1.969-0.136,2.927-0.407l149.333-42.703c1.729-0.5,3.302-1.418,4.583-2.69l289.323-286.983
											c8.063-8.069,12.5-18.787,12.5-30.192S464.899,84.237,456.836,76.168z M285.989,89.737l39.264,39.264L120.257,333.998
											l-14.712-29.434c-1.813-3.615-5.5-5.896-9.542-5.896H78.921L285.989,89.737z M26.201,443.137L40.095,394.5l34.742,34.742
											L26.201,443.137z M149.336,407.96l-51.035,14.579l-51.503-51.503l14.579-51.035h28.031l18.385,36.771
											c1.031,2.063,2.708,3.74,4.771,4.771l36.771,18.385V407.96z M170.67,390.417v-17.082c0-4.042-2.281-7.729-5.896-9.542
											l-29.434-14.712l204.996-204.996l39.264,39.264L170.67,390.417z M441.784,121.72l-47.033,46.613l-93.747-93.747l46.582-47.001
											c8.063-8.063,22.104-8.063,30.167,0l64,64c4.031,4.031,6.25,9.385,6.25,15.083S445.784,117.72,441.784,121.72z"/>
									</g>
								</g>
							</svg>
						</a>
						@endif
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
				@if ($nextTaste)
				<div class="plate__schedule-next">
					Próxima visita &#x2192; {{$nextTaste}}
				</div>
				@endif
				@if (Gate::allows('view'))
				<div class="plate-schedule">
					<a href="/plate/{{$plate->id}}/taste/create/" 
						 class="plate-schedule__link">
						<svg viewBox="0 0 512 512" xml:space="preserve" class="check-in-icon mr-1 fill-current">
							<g>
								<path d="M256,53.333c-64.688,0-117.333,52.635-117.333,117.333S191.313,288,256,288s117.333-52.635,117.333-117.333
									S320.688,53.333,256,53.333z M256,266.667c-52.938,0-96-43.063-96-96s43.063-96,96-96s96,43.063,96,96
									S308.938,266.667,256,266.667z"/>
								<path d="M291.125,184.458l-24.458,24.458v-102.25C266.667,100.771,261.896,96,256,96s-10.667,4.771-10.667,10.667v102.25
									l-24.458-24.458c-4.167-4.167-10.917-4.167-15.083,0c-4.167,4.167-4.167,10.917,0,15.083l42.667,42.667
									c2.083,2.083,4.813,3.125,7.542,3.125s5.458-1.042,7.542-3.125l42.667-42.667c4.167-4.167,4.167-10.917,0-15.083
									C302.042,180.292,295.292,180.292,291.125,184.458z"/>
								<path d="M256,0C161.896,0,85.333,76.563,85.333,170.667c0,28.26,7.063,56.271,20.479,81.115L246.666,506.5
									c1.875,3.396,5.459,5.5,9.334,5.5s7.458-2.104,9.333-5.5l140.896-254.813c13.375-24.75,20.438-52.76,20.438-81.021
									C426.667,76.563,350.104,0,256,0z M387.521,241.448L256,479.292l-131.479-237.75c-11.667-21.635-17.854-46.146-17.854-70.875
									c0-82.344,67-149.333,149.333-149.333s149.333,66.99,149.333,149.333C405.333,195.396,399.146,219.906,387.521,241.448z"/>
							</g>
						</svg>
						<span class="text-xl self-center">Marcar Visita</span>
					</a>
				</div>
				@endif
			</div>
		</div>
		<!-- Plate Cover -->
		<div class="p-2 w-full md:w-2/5 border-t border-gray-400 md:border-0 flex">
			<div class="w-full self-center">
				@if ($plate->cover->count() > 0)
					<img class="plate-cover-image mx-auto" src="/storage/uploads/{{$plate->cover->first()->path}}" alt="{{$plate->name}}">
				@else
					<img class="plate-cover-image mx-auto" src="/css/icons/francesinha_animated.png" alt="{{$plate->name}}">
				@endif
			</div>
		</div>
	</article>
	<!-- Plate Photos -->
	@if ($plate->images->count() > 0)
	<article class="rounded-lg border border-gray-400 shadow-lg w-full my-4">
		<div class="px-4 py-4 w-full tracking-wider border-b border-gray-400">
			<h2 class="text-2xl">Registo Fotográfico:</h2>
		</div>
		<div class="p-6 w-full flex flex-wrap">
			<image-slideshow :slides=@json($plate->images) slide-counter></image-slideshow>
		</div>
	</article>
	@endif
	<!-- Plate Establishment Location -->
	<article class="rounded-lg border border-gray-400 shadow-lg w-full my-4">
		<div class="px-4 py-4 w-full">
			<div class="w-full overflow-hidden">
				<iframe height="320px" class="w-full" src="https://www.google.com/maps/embed/v1/place?
															q={{$plate->establishment->location}}
															&key={{ env('GOOGLE_API_KEY', '') }}
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
	@if ($latestRatings->count() > 0)
	<article class="rounded-lg border border-gray-400 shadow-lg w-full my-4">
		<div class="px-4 py-4 w-full tracking-wider border-b border-gray-400">
			<h2 class="text-2xl">Últimas Avaliações:</h2>
		</div>
		@foreach ($latestRatings as $rating)
		<div class="px-4 py-4 w-full flex flex-col">
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
