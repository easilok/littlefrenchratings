@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
  <div class="form-center-card-ext-p mt-5">
		<h2 class="item-row item-title">Avaliar - <span class="ratings__title">{{$taste->plate->name}} - {{$taste->plate->establishment->name}}</span></h2>
	</div>
	<div class="w-full flex justify-center justify-center">
		<form method="POST" class="w-full justify-center" enctype="multipart/form-data" action="{{ url('/taste/'.$taste->id.'/rating') }}">
			@csrf
			<!-- Create Button -->
			@foreach( $ratings as $rating)
			<rating :rating='@json($rating)'
							:errors='@json($errors->toArray())'
							:old='@json(Session::getOldInput())'
			></rating>
			@endforeach
			<div class="item-row item-footer flex justify-end mx-2">
				<button type="submit" class="ratings__submit btn-std btn-platform">
					Avaliar
				</button>
			</div>
		</form>
	</div>
</div>
@endsection
