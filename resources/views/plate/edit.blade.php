@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
  <div class="form-center-card mt-5">
		<div class="remove-padding-x border-b border-gray-400 mb-5">
	    <div class="mb-6 text-xl text-platform-color font-bold">Editar <span class="italic">"{{$plate->name}}"<span></div>
		</div>

    <div class="w-full flex justify-center justify-center">
      <form method="POST" class="w-full justify-center" action="{{ url('/plate/'.$plate->id) }}" enctype="multipart/form-data">
        @csrf
				@method("PATCH")
        <!-- Name -->
        <div class="mb-4">
          <label for="name" class="form-label">
						Nome:
          </label>
          <input id="name" type="text" class="form-input" 
            name="name" value="{{ old('name') ? old('name') : $plate->name }}" placeholder="Nome" 
            required autofocus>
          @if ($errors->has('name'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div>
        <!-- Establishment -->
        <div class="mb-4">
          <label for="establishment" class="form-label">
						Estabelecimento:
          </label>
					<div class="relative">
						<select id="establishment" name="establishment" class="form-select">
						@foreach($establishments as $establishment)
								<option value="{{$establishment->id}}" 
									{{
										$establishment->id == $plate->establishment_id ? 'selected': ''
									}} 
								>{{$establishment->name}}</option>
						@endforeach
						</select>
						<div class="form-select-arrow">
							<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
						</div>
					</div>
          @if ($errors->has('establishment'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('establishment') }}</strong>
          </span>
          @endif
				</div>
        <!-- Price -->
        <div class="mb-4">
          <label for="price" class="form-label">
						Preço (€):
          </label>
          <input id="price" type="text" class="form-input" 
            name="price" value="{{ old('price') ? old('price') : $plate->price }}" placeholder="10.50">
          @if ($errors->has('price'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('price') }}</strong>
          </span>
          @endif
				</div>
        <!-- Obs -->
        <div class="mb-4">
          <label for="obs" class="form-label">
						Outras informações:
          </label>
          <input id="obs" type="text" class="form-input" 
            name="obs" value="{{ old('obs') ? old('obs') : $plate->obs }}" placeholder="Molho com azeite">
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
						Atualizar
					</button>
				</div>
      </form>
  </div>
</div>
@endsection
