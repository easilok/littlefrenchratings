@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
	<!-- Next Tastes -->
	@if($nextTastes->count() > 0)
  <div class="form-center-card-ext-p mt-5 py-0">
		<div class="border-b border-gray-400">
	    <div class="item-row item-title text-xl text-platform-color font-bold">Próximas Provas:</div>
		</div>
		@foreach($nextTastes as $taste)
    <div class="item-row flex justify-center justify-center py-3{{ $loop-> last ? '' : 'border-b border-gray-400' }}">
			<div class="w-1/2">
				<a href="/plate/{{$taste->plate->id}}">{{ $taste->plate->name }}</a> - <a href="/establishment/{{$taste->plate->establishment->id}}">{{ $taste->plate->establishment->name }}, {{ $taste->plate->establishment->parish }}</a>
			</div>
			<div class="w-1/2 text-right">{{ $taste->visit_at }}</div>
		</div>
		@endforeach
	</div>
	@endif
	<!-- History Tastes -->
	@if($historyTastes->count() > 0)
  <div class="form-center-card-ext-p mt-5">
		<div class="border-b border-gray-400">
	    <div class="item-row item-title text-xl text-platform-color font-bold">Histórico de Provas:</div>
		</div>
		@foreach($historyTastes as $taste)
    <div class="item-row flex justify-center justify-center remove-padding-x py-3 {{ $loop->last ? '' : 'border-b border-gray-400' }}">
			<div class="w-1/2">
				<a href="/plate/{{$taste->plate->id}}">{{ $taste->plate->name }}</a> - <a href="/establishment/{{$taste->plate->establishment->id}}">{{ $taste->plate->establishment->name }}, {{ $taste->plate->establishment->parish }}</a>
			</div>
			<div class="w-1/2 text-right">{{ $taste->visit_at }}</div>
		</div>
		@endforeach
	</div>
	@endif
</div>
@endsection
