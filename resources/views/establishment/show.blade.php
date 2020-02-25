@extends ('layouts.app')

@section('content')

<div class="container mx-auto">

	@if (Gate::allows('edit'))
	<div class="w-full py-3">
		<a class="btn-std btn-blue" href="/establishment/{{$establishment->id}}/edit">Editar</a>
	</div>
	@endif

	<article class="rounded-lg border border-gray-400 shadow-lg flex w-full flex-wrap my-4">
		<div class="w-full md:w-3/5 md:border-r md:border-gray-400">
			<div class="flex flex-col justify-between h-full">
				<div class="px-4 py-4">
					<div class="w-full tracking-wider pb-2">
						<span class="text-2xl"><a class="hover:underline" href="/establishment/{{$establishment->id}}">{{$establishment->name}}</a></span>
						<span>- {{$establishment->parish}}</span>
						<!--<a href="geo:{{$establishment->location}}" target="_blank" class="hover:underline md:hidden inline-block">
							<img class="inline-block mr-2" style="height: 20px;" src="/svg/icons/map.svg" alt="GPS">
						</a>-->
						<a href="https://www.google.com/maps/search/?api=1&query={{$establishment->location}}" target="_blank" class="hover:underline inline-block hhidden md:inline-block">
							<img class="inline-block mr-2" style="height: 20px;" src="/svg/icons/map.svg" alt="GPS">
						</a>
					</div>
					<div class="p-2 w-full">
						<span class="text-lg font-bold text-gray-800">{{$establishment->ratingAvg > 0 ? $establishment->ratingAvg : '-'}}</span><span class="text-sm">/5</span>
					</div>
					@if ($establishment->address)
					<div class="p-2 w-full">
						{{$establishment->address}}, 
						{{$establishment->parish}}
						@if ($establishment->city)
							, {{$establishment->city}}
						@endif
					</div>
					@endif
					@if ($establishment->email)
					<div class="p-2 w-full"><a href="mailto:{{$establishment->email}}">
						<img class="inline-block mr-2" src="/svg/icons/paper-plane.svg" style="height:20px" alt="email">{{$establishment->email}}
					</a></div>
					@endif
					@if ($establishment->telephone1)
					<div class="p-2 w-full"><a href="tel:{{$establishment->telephone1}}">
						<img class="inline-block mr-2" src="/svg/icons/telephone.svg" style="height:20px" alt="email">{{$establishment->telephone1}}
					</a></div>
					@endif
					@if ($establishment->timetable)
					<div class="p-2 w-full">
						Horário: {{$establishment->timetable}}
					</div>
					@endif
				</div>
				@if ($establishment->obs)
				<div class="p-4 border-t border-gray-400 w-full italic text-sm">
					{{$establishment->obs}}
				</div>
				@endif
			</div>
		</div>
		<div class="px-4 py-4 w-full md:w-2/5 border-t border-gray-400 md:border-0">
			<div class="w-full overflow-hidden">
					<!--<iframe src="https://www.google.com/maps/search/?api=1&query={{$establishment->gps}}&output=embed"></iframe>-->
				<!--<iframe class="" src="http://maps.google.com/maps?q={{$establishment->gps}}&z=20&t=k&iwloc=&output=embed" 
								frameborder="0"
								scrolling="yes"
								marginheight="0"
								marginwidth="0"
				>
				</iframe>-->
				<iframe height="320px" class="w-full" src="http://www.google.com/maps/embed/v1/place?
															q={{$establishment->location}}
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
	<article class="rounded-lg border border-gray-400 shadow-lg w-full my-4">
		<div class="px-4 py-4 flex flex-wrap w-full">
			<div class="w-full tracking-wider mb-2 pb-2">
				<span class="text-2xl">Pratos:</span>
			</div>
			@foreach ($establishment->plates as $plate)
			<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex flex-col p-2 justify-between">
				<div class="m-auto">
					@if ($plate->cover->count() > 0)
						<img class="rounded-lg" src="/storage/uploads/{{$plate->cover->first()->path}}" alt="{{$plate->name}}">
					@else
						<img class="rounded-lg" src="/css/icons/francesinha_animated.png" alt="{{$plate->name}}">
					@endif
				</div>
				<div class="text-sm text-center py-2">
					<a class="hover:underline" href="/plate/{{$plate->id}}">{{$plate->name}}</a>
					{{$plate->ratingAvg > 0 ? '('.$plate->ratingAvg.')' : ''}}
				</div>
			</div>
			@endforeach
			<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 flex flex-col p-2 justify-between">
				<a class="cursor-pointer" alt="Adicionar Prato" href="/establishment/{{$establishment->id}}/plate/create">
					<div class="rounded-lg shadow-lg border-gray-400 border-2 p-20 p-24 fill-current text-gray-500 hover:text-black hover:border-black">
						<svg viewBox="0 0 492 492" xml:space="preserve">
						<g>
							<g>
								<path d="M465.064,207.566l0.028,0H284.436V27.25c0-14.84-12.016-27.248-26.856-27.248h-23.116
									c-14.836,0-26.904,12.408-26.904,27.248v180.316H26.908c-14.832,0-26.908,12-26.908,26.844v23.248
									c0,14.832,12.072,26.78,26.908,26.78h180.656v180.968c0,14.832,12.064,26.592,26.904,26.592h23.116
									c14.84,0,26.856-11.764,26.856-26.592V284.438h180.624c14.84,0,26.936-11.952,26.936-26.78V234.41
									C492,219.566,479.904,207.566,465.064,207.566z"/>
							</g>
						</g>
						</svg>
					</div>
				</a>
			<div>
		</div>
	</article>
	@if ($latestRatings)
	<article class="rounded-lg border border-gray-400 shadow-lg w-full my-4">
		<div class="px-4 py-4 w-full tracking-wider">
			<span class="text-2xl">Últimas Avaliações:</span>
		</div>
		@foreach ($latestRatings as $rating)
		<div class="px-4 py-4 w-full border-t border-gray-400 flex flex-col">
			<div class="flex justify-between py-2">
				<div class="flex flex-col self-center">
					<span>{{$rating['user']->name}} <span class="text-sm inline-block"><a class="hover:underline" href="/plate/{{$rating['plate']->id}}">({{$rating['plate']->name}})</a></span></span>
					<span>{{$rating['visit_at']}}</span>
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
