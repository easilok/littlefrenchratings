@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
  <div class="form-center-card mt-5">
		<div class="remove-padding-x border-b border-gray-400 mb-5">
	    <div class="mb-6 text-xl text-platform-color font-bold">Criar Novo Prato</div>
		</div>

    <div class="w-full flex justify-center justify-center">
			@if ($establishment)
			<form method="POST" class="w-full justify-center" enctype="multipart/form-data" action="{{ url('/establishment/'.$establishment->id.'/plate') }}">
			@else
			<form method="POST" class="w-full justify-center" enctype="multipart/form-data" action="{{ url('/plate') }}">
			@endif
        @csrf
        <!-- Establishment -->
				@if ($establishment)
        <div class="mb-4">
          <label for="establishment" class="form-label">
						Estabelecimento:
          </label>
					<span class="form-input border-b-0 italic inline-block">{{$establishment->name}}</span>
				</div>
				@else
				Adicionar uma dropdown com todos os estabelecimentos
				@endif
        <!-- Name -->
        <div class="mb-4">
          <label for="name" class="form-label">
						Nome:
          </label>
          <input id="name" type="text" class="form-input" 
            name="name" value="{{ old('name') }}" placeholder="Nome" 
            required autofocus>
          @if ($errors->has('name'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div>
        <!-- Price -->
        <div class="mb-4">
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
        <!-- Obs -->
        <div class="mb-4">
          <label for="obs" class="form-label">
						Observações:
          </label>
          <input id="obs" type="text" class="form-input" 
            name="obs" value="{{ old('obs') }}" placeholder="Informação adicional que deseje disponibilizar">
          @if ($errors->has('obs'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('obs') }}</strong>
          </span>
          @endif
				</div>
				<!-- Image -->
				<div class="mb-4">
					<label for="photo" class="form-label">Imagem de capa para o prato:</label>
					<input id="photo" type="file" class="form-input" name="photo">
					@if ($errors->has('photo'))
					<span class="input-validation-error">
						<strong>{{ $errors->first('photo') }}</strong>
					</span>
					@endif
				</div>
				<!-- Imagens -->
				<div class="mb-4">
					<label for="photos" class="form-label">Outras Imagens:</label>
					<input id="photos" type="file" class="form-input" name="photos[]" multiple>
					@if ($errors->has('photos'))
					<span class="input-validation-error">
						<strong>{{ $errors->first('photos') }}</strong>
					</span>
					@endif
				</div>
				<!-- Create Button -->
				<div class="flex justify-end">
					<button type="submit" class="btn-std btn-platform">
						Criar
					</button>
				</div>
      </form>
  </div>
</div>
@endsection
