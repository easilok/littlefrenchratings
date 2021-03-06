@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
  <div class="form-center-card-ext-p mt-5">
		<div class="border-b border-gray-400 mb-5">
	    <h2 class="item-row item-title text-xl text-platform-color font-bold">Criar Nova Prova</h2>
		</div>

    <div class="w-full flex justify-center justify-center">
			@if ($plate)
			<form method="POST" class="w-full justify-center" enctype="multipart/form-data" action="{{ url('/plate/'.$plate->id.'/taste') }}">
			@else
			<form method="POST" class="w-full justify-center" enctype="multipart/form-data" action="{{ url('/taste') }}">
			@endif
        @csrf
        <!-- Establishment -->
				@if ($plate)
        <div class="mb-4 item-row">
          <label for="establishment" class="form-label">
						Prato:
          </label>
					<span class="form-input border-b-0 italic inline-block">{{ $plate->name }} - {{ $plate->establishment->name }}, {{ $plate->establishment->parish }}</span>
				</div>
				@else
				Adicionar uma dropdown com todos os estabelecimentos
				@endif
        <!-- Date -->
				<div class="md:flex item-row">
					<div class="mb-4 md:w-1/2 md:pr-4">
						<label for="name" class="form-label">
							Data:
						</label>
						<input id="visit" type="date" class="form-input" 
							name="visit" value="{{ old('visit') }}"
							required >
						@if ($errors->has('visit'))
						<span class="input-validation-error" role="alert">
							<strong>{{ $errors->first('visit') }}</strong>
						</span>
						@endif
					</div>
					<!-- Price -->
					<div class="mb-4 md:w-1/2 md:pl-4">
						<label for="price" class="form-label">
							Preço:
						</label>
						<input id="price" type="text" class="form-input" 
							name="price" value="{{ old('price') }}" placeholder="12.0">
						@if ($errors->has('price'))
						<span class="input-validation-error" role="alert">
							<strong>{{ $errors->first('price') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<!-- User -->
				<div class="mb-4 item-row">
					<label for="user" class="form-label">
						Convidado:
					</label>
					<div class="relative">
						<select id="user" name="user" class="form-select">
						@foreach($users as $user)
								<option value="{{$user->id}}" 
								{{ $user->id === Auth::id() ? 'selected' : '' }}
								>{{$user->name}}</option>
						@endforeach
						</select>
						<div class="form-select-arrow">
							<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
						</div>
					</div>
					@if ($errors->has('user'))
					<span class="input-validation-error" role="alert">
						<strong>{{ $errors->first('user') }}</strong>
					</span>
					@endif
				</div>
				<!-- Create Button -->
				<div class="item-row item-footer flex justify-end">
					<button type="submit" class="btn-std btn-platform">
						Agendar
					</button>
				</div>
      </form>
		</div>
  </div>
	<!-- Next Tastes -->
	@isset($nextTastes)
	@if($nextTastes->count() > 0)
  <div class="form-center-card-ext-p mt-5 py-0">
		<div class="">
	    <div class="item-row item-title">Próximas Provas:</div>
		</div>
		@foreach($nextTastes as $taste)
    <div class="item-row form-card-list-item item-border-t">
			<div class="content">
				<div class="">
					<a class="hover:underline" href="/plate/{{$taste->plate->id}}">{{ $taste->plate->name }}</a> 
					- 
					<a class="hover:underline" href="/establishment/{{$taste->plate->establishment->id}}">{{ $taste->plate->establishment->name }}, {{ $taste->plate->establishment->parish }}</a>
				</div>
				<div class="text-right">{{ $taste->visit_at->toDateString() }}</div>
			</div>
		</div>
		@endforeach
	</div>
	@endif
	@endisset
	<!-- History Tastes -->
	@isset($historyTastes)
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
	@endisset
</div>
@endsection
