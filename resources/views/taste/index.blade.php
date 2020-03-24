@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
	<!-- Next Tastes -->
	@if($nextTastes->count() > 0)
  <div class="form-center-card-ext-p">
		<div class="">
	    <h2 class="item-row item-title">Próximas Provas:</h2>
		</div>
	</div>
	@foreach($nextTastes as $taste)
	<div class="form-center-card-ext-p flex flex-wrap py-4 relative">
		<a class="align-center platform-edit-icon-holder" href= "/taste/{{$taste->id}}/edit">
			<svg class="platform-edit-icon" viewBox="0 0 469.336 469.336" style="" xml:space="preserve">
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
		<div class="item-row left-column justify-between">
			<div class="flex justify-between items-center mb-4">
				<div class="leading-none">
					<a class="block text-xl hover:underline" href="/plate/{{$taste->plate->id}}">{{ $taste->plate->name }}</a> 
					<a class="block text-sm hover:underline" href="/establishment/{{$taste->plate->establishment->id}}">{{ $taste->plate->establishment->name }}<span class="">, {{ $taste->plate->establishment->parish }}</span></a>
				</div>
				<div class="leading-normal">
					<div class="text-right px-2">{{ $taste->visit_at->locale('pt_PT')->translatedFormat('F \\, d') }}</div>
				</div>
			</div>
			<div class="flex justify-center mb-4">
				<a class="fill-current hover:text-platform-main-color" 
						href="https://www.google.com/maps/search/?api=1&query={{$taste->plate->establishment->location}}" target="_blank" class="hover:underline inline-block hhidden md:inline-block">
					<svg class="h-16" viewBox="0 0 496 496" xmlns="http://www.w3.org/2000/svg">
						<path d="m64 400c-17.648438 0-32 14.351562-32 32s14.351562 32 32 32 32-14.351562 32-32-14.351562-32-32-32zm0 48c-8.824219 0-16-7.175781-16-16s7.175781-16 16-16 16 7.175781 16 16-7.175781 16-16 16zm0 0"/>
						<path d="m448 0h-96v72h-32.40625c-4.027344-40.367188-38.179688-72-79.59375-72s-75.566406 31.632812-79.59375 72h-32.40625v-8c0-35.289062-28.710938-64-64-64s-64 28.710938-64 64v368c0 35.289062 28.710938 64 64 64h384c26.472656 0 48-21.527344 48-48v-400c0-26.472656-21.527344-48-48-48zm-272 80c0-35.289062 28.710938-64 64-64s64 28.710938 64 64v2.199219c0 12.679687-3.71875 24.953125-10.753906 35.503906l-47.46875 71.199219c-2.585938 3.875-8.976563 3.875-11.5625 0l-47.472656-71.199219c-7.023438-10.542969-10.742188-22.824219-10.742188-35.503906zm-48 112.648438 19.398438 15.519531c6.3125 5.046875 14.25 7.832031 22.335937 7.832031h5.378906c4.144531 0 8.109375 1.273438 11.480469 3.679688l37.148438 26.535156c5.167968 3.6875 8.257812 9.695312 8.257812 16.066406v21.71875c0 8.511719-5.425781 16.046875-13.496094 18.734375l-10.0625 3.355469c-14.617187 4.871094-24.441406 18.503906-24.441406 33.910156 0 8.511719-5.425781 16.046875-13.503906 18.742188l-24.734375 8.242187c-2.042969.671875-4.144531 1.015625-6.265625 1.015625h-11.496094zm-112-128.648438c0-26.472656 21.527344-48 48-48s48 21.527344 48 48v325.808594c-11.734375-13.335938-28.878906-21.808594-48-21.808594s-36.265625 8.472656-48 21.808594zm0 368c0-26.472656 21.527344-48 48-48s48 21.527344 48 48-21.527344 48-48 48-48-21.527344-48-48zm112 0v-48h11.496094c3.832031 0 7.632812-.617188 11.3125-1.832031l24.75-8.246094c14.617187-4.882813 24.441406-18.515625 24.441406-33.921875 0-8.511719 5.425781-16.046875 13.496094-18.734375l10.0625-3.355469c14.617187-4.871094 24.441406-18.503906 24.441406-33.910156v-21.71875c0-11.519531-5.601562-22.402344-14.976562-29.089844l-37.136719-26.527344c-6.085938-4.359374-13.269531-6.664062-20.773438-6.664062h-5.378906c-4.46875 0-8.847656-1.535156-12.335937-4.328125l-29.398438-23.519531v-84.152344h32.425781c1 13.761719 5.300781 27.015625 13.007813 38.574219l47.46875 71.203125c4.273437 6.398437 11.410156 10.222656 19.097656 10.222656s14.824219-3.824219 19.097656-10.214844l47.46875-71.199218c7.707032-11.5625 12.019532-24.816407 13.007813-38.578126h32.425781v232h-32.992188c-11.902343 0-23.273437 5.6875-30.414062 15.207032l-8.992188 11.984375c-4.90625 6.535156-7.601562 14.632812-7.601562 22.808593v21c0 7.6875-4.097656 14.921876-10.6875 18.871094l-10.855469 6.511719c-11.386719 6.832031-18.457031 19.328125-18.457031 32.601563 0 6.886718-3.296875 13.480468-8.808594 17.617187l-17.855468 13.390625h-99.144532c13.335938-11.734375 21.808594-28.878906 21.808594-48zm320 48h-215.992188l.792969-.59375c9.511719-7.148438 15.199219-18.511719 15.199219-30.414062 0-7.6875 4.097656-14.921876 10.6875-18.871094l10.855469-6.511719c11.386719-6.832031 18.457031-19.328125 18.457031-32.601563v-21c0-4.808593 1.519531-9.367187 4.40625-13.207031l8.992188-11.992187c4.128906-5.519532 10.714843-8.808594 17.609374-8.808594h32.992188v80h96c17.648438 0 32 14.351562 32 32s-14.351562 32-32 32zm32-67.753906c-8.496094-7.605469-19.71875-12.246094-32-12.246094h-80v-384h80c17.648438 0 32 14.351562 32 32zm0 0"/>
						<path d="m240 128c26.472656 0 48-21.527344 48-48s-21.527344-48-48-48-48 21.527344-48 48 21.527344 48 48 48zm0-80c17.648438 0 32 14.351562 32 32s-14.351562 32-32 32-32-14.351562-32-32 14.351562-32 32-32zm0 0"/>
						<path d="m320 352h16v16h-16zm0 0"/>
						<path d="m288 448h16v16h-16zm0 0"/>
						<path d="m352 432h16v16h-16zm0 0"/>
						<path d="m160 240h16v16h-16zm0 0"/>
						<path d="m192 272h16v16h-16zm0 0"/>
						<path d="m144 304h16v16h-16zm0 0"/>
					</svg>
				</a>
			</div>
			<div class="p-2 w-full flex justify-between mb-4 md:mb-0">
				<div>
					<span class="text-lg font-bold text-gray-800">{{$taste->plate->ratingAvg > 0 ? $taste->plate->ratingAvg : '-'}}</span><span class="text-sm">/5</span>
				</div>
				<div>
					<span class="text-lg font-bold text-gray-800">{{$taste->plate->price > 0 ? $taste->plate->price : '-'}}</span><span class="text-sm">€</span>
					@if ($taste->plate->priceAvg)
						<span class="text-sm">/~{{$taste->plate->priceAvg}}€</span>
					@endif
				</div>
			</div>
		</div>
		<div class="item-row right-column">
			<!-- Plate Cover -->
			<div class="p-2 h-25-screen self-center">
				@if ($taste->plate->cover->count() > 0)
					<img class="plate-cover-image mx-auto" src="/storage/uploads/{{$taste->plate->cover->first()->path}}" alt="{{$taste->plate->name}}">
				@else
					<img class="plate-cover-image mx-auto" src="/css/icons/francesinha_animated.png" alt="{{$taste->plate->name}}">
				@endif
			</div>
		</div>
	</div>
	@endforeach
	@endif
	<!-- History Tastes -->
	@if(($historyTastes->count() > 0) || ($unratedTastes->count() > 0))
  <div class="form-center-card-ext-p mt-5">
		<div class="">
	    <h2 class="item-row item-title">Histórico de Provas:</h2>
		</div>
	</div>
	@foreach($unratedTastes as $taste)
	<div class="form-center-card-ext-p flex flex-wrap py-4 relative">
		<a class="align-center platform-edit-icon-holder" href= "/taste/{{$taste->id}}/edit">
			<svg class="platform-edit-icon" viewBox="0 0 469.336 469.336" style="" xml:space="preserve">
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
		<div class="item-row left-column justify-between">
			<div class="flex justify-between items-center mb-4">
				<div class="leading-none">
					<a class="block text-xl hover:underline" href="/plate/{{$taste->plate->id}}">{{ $taste->plate->name }}</a> 
					<a class="block text-sm hover:underline" href="/establishment/{{$taste->plate->establishment->id}}">{{ $taste->plate->establishment->name }}<span class="">, {{ $taste->plate->establishment->parish }}</span></a>
				</div>
				<div class="leading-normal">
					<div class="text-right px-2">{{ $taste->visit_at->locale('pt_PT')->translatedFormat('F \\, d') }}</div>
				</div>
			</div>
			<div class="p-2 w-full flex justify-between mb-4 md:mb-0">
				<div>
				</div>
				<div>
					<span class="text-lg font-bold text-gray-800">{{$taste->price > 0 ? $taste->price : '-'}}</span><span class="text-sm">€</span>
				</div>
			</div>
		</div>
		<div class="item-row right-column">
			<!-- Plate Cover -->
			<div class="my-auto text-center mx-auto">
				<!--<h3 class="taste-rating-button">Avaliar</h3>-->
				<a href="/taste/{{$taste->id}}/rating/create"> 
					<svg class="taste-rating__star-icon" viewBox="0 0 512.001 512.001" xml:space="preserve">
						<path class="taste-rating--star-front deactive" d="M499.92,188.26l-165.839-15.381L268.205,19.91c-4.612-10.711-19.799-10.711-24.411,0l-65.875,152.97 L12.08,188.26c-11.612,1.077-16.305,15.52-7.544,23.216l125.126,109.922L93.044,483.874c-2.564,11.376,9.722,20.302,19.749,14.348 L256,413.188l143.207,85.034c10.027,5.954,22.314-2.972,19.75-14.348l-36.619-162.476l125.126-109.922 C516.225,203.78,511.532,189.337,499.92,188.26z"/>
						<path class="taste-rating--star-back deactive" d="M268.205,19.91c-4.612-10.711-19.799-10.711-24.411,0l-65.875,152.97L12.08,188.26 c-11.612,1.077-16.305,15.52-7.544,23.216l125.126,109.922L93.044,483.874c-2.564,11.376,9.722,20.302,19.749,14.348l31.963-18.979 c4.424-182.101,89.034-310.338,156.022-383.697L268.205,19.91z"/>
						<text x="50%" y="50%" class="taste-rating__star-text">?</text>
					</svg>
				</a>
			</div>
		</div>
	</div>
	@endforeach
	@foreach($historyTastes as $taste)
	<div class="form-center-card-ext-p flex flex-wrap py-4 relative">
		<a class="align-center platform-edit-icon-holder" href= "/taste/{{$taste->id}}/edit">
			<svg class="platform-edit-icon" viewBox="0 0 469.336 469.336" style="" xml:space="preserve">
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
		<div class="item-row left-column justify-between">
			<div class="flex justify-between items-center mb-4">
				<div class="leading-none">
					<a class="block text-xl hover:underline" href="/plate/{{$taste->plate->id}}">{{ $taste->plate->name }}</a> 
					<a class="block text-sm hover:underline" href="/establishment/{{$taste->plate->establishment->id}}">{{ $taste->plate->establishment->name }}<span class="">, {{ $taste->plate->establishment->parish }}</span></a>
				</div>
				<div class="leading-normal">
					<div class="text-right px-2">{{ $taste->visit_at->locale('pt_PT')->translatedFormat('F \\, d') }}</div>
				</div>
			</div>
			<div class="p-2 w-full flex justify-between mb-4 md:mb-0">
				<div>
				</div>
				<div>
					<span class="text-lg font-bold text-gray-800">{{$taste->price > 0 ? $taste->price : '-'}}</span><span class="text-sm">€</span>
				</div>
			</div>
		</div>
		<div class="item-row right-column">
			<!-- My Rating -->
			<div class="my-auto text-center mx-auto">
				<!--<h3 class="taste-rating-button"> {{ $taste->ratingAvg }}</h3>-->
				<a href="/taste/{{$taste->id}}/my-rating/"> 
					<svg class="taste-rating__star-icon" viewBox="0 0 512.001 512.001" xml:space="preserve">
						<path class="taste-rating--star-front active" d="M499.92,188.26l-165.839-15.381L268.205,19.91c-4.612-10.711-19.799-10.711-24.411,0l-65.875,152.97 L12.08,188.26c-11.612,1.077-16.305,15.52-7.544,23.216l125.126,109.922L93.044,483.874c-2.564,11.376,9.722,20.302,19.749,14.348 L256,413.188l143.207,85.034c10.027,5.954,22.314-2.972,19.75-14.348l-36.619-162.476l125.126-109.922 C516.225,203.78,511.532,189.337,499.92,188.26z"/>
						<path class="taste-rating--star-back active" d="M268.205,19.91c-4.612-10.711-19.799-10.711-24.411,0l-65.875,152.97L12.08,188.26 c-11.612,1.077-16.305,15.52-7.544,23.216l125.126,109.922L93.044,483.874c-2.564,11.376,9.722,20.302,19.749,14.348l31.963-18.979 c4.424-182.101,89.034-310.338,156.022-383.697L268.205,19.91z"/>
						<text x="50%" y="50%" class="taste-rating__star-text"> {{ $taste->ratingAvg }} </text>
					</svg>
				</a>
			</div>
		</div>
	</div>
	@endforeach
	@endif
</div>
@endsection
