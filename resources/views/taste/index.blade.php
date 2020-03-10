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
			<div class="flex justify-between items-center">
				<div class="leading-none mb-4">
					<a class="block text-xl hover:underline" href="/plate/{{$taste->plate->id}}">{{ $taste->plate->name }}</a> 
					<a class="block text-sm hover:underline" href="/establishment/{{$taste->plate->establishment->id}}">{{ $taste->plate->establishment->name }}<span class="">, {{ $taste->plate->establishment->parish }}</span></a>
				</div>
				<div class="leading-normal">
					<div class="text-right">{{ $taste->visit_at->locale('pt_PT')->translatedFormat('F \\, d') }}</div>
					<a class="flex hover:underline mb-4" href="https://www.google.com/maps/search/?api=1&query={{$taste->plate->establishment->location}}" target="_blank" class="hover:underline inline-block hhidden md:inline-block">
						<span class="text-sm">Direções</span><img class="inline-block ml-2 h-4" style="" src="/svg/icons/map.svg" alt="GPS">
					</a>
				</div>
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
	@if($historyTastes->count() > 0)
  <div class="form-center-card-ext-p mt-5">
		<div class="">
	    <h2 class="item-row item-title">Histórico de Provas:</h2>
		</div>
		@foreach($unratedTastes as $taste)
    <div class="item-row form-card-list-item item-border-t">
			<div class="content">
				<div class="">
					<a class="hover:underline" href="/plate/{{$taste->plate->id}}">{{ $taste->plate->name }}</a> - <a class="hover:underline" href="/establishment/{{$taste->plate->establishment->id}}">{{ $taste->plate->establishment->name }}, {{ $taste->plate->establishment->parish }}</a>
				</div>
				<div class="text-right">{{ $taste->visit_at->toDateString() }}</div>
			</div>
			<a class="action-icon" href= "/taste/{{$taste->id}}/edit">
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
		</div>
		@endforeach
		@foreach($historyTastes as $taste)
    <div class="item-row form-card-list-item item-border-t">
			<div class="content">
				<div class="">
					<a class="hover:underline" href="/plate/{{$taste->plate->id}}">{{ $taste->plate->name }}</a> - <a class="hover:underline" href="/establishment/{{$taste->plate->establishment->id}}">{{ $taste->plate->establishment->name }}, {{ $taste->plate->establishment->parish }}</a>
				</div>
				<div class="text-right">{{ $taste->visit_at->toDateString() }}</div>
			</div>
			<a class="action-icon" href= "/taste/{{$taste->id}}/edit">
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
		</div>
		@endforeach
	</div>
	@endif
</div>
@endsection
