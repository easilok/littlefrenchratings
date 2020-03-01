@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
  <div class="form-center-card mt-5">
		<div class="remove-padding-x border-b border-gray-400 mb-5">
	    <div class="mb-6 text-xl text-platform-color font-bold">Criar Novo Estabelecimento</div>
		</div>

    <div class="w-full flex justify-center justify-center">
      <form method="POST" class="w-full justify-center" action="{{ url('/establishment') }}">
        @csrf
        <!-- Name -->
        <div class="mb-4">
          <label for="name" class="form-label" for="name">
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
        <!-- Address -->
        <div class="mb-4">
          <label for="address" class="form-label" for="address">
						Morada:
          </label>
          <input id="address" type="text" class="form-input" 
            name="address" value="{{ old('address') }}" placeholder="Morada:">
          @if ($errors->has('address'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('address') }}</strong>
          </span>
          @endif
				</div>
        <!-- Parish -->
        <div class="mb-4">
          <label for="parish" class="form-label" for="parish">
						Localidade:
          </label>
          <input id="parish" type="text" class="form-input" 
            name="parish" value="{{ old('parish') }}" placeholder="Localidade:">
          @if ($errors->has('parish'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('parish') }}</strong>
          </span>
          @endif
				</div>
        <!-- City -->
        <div class="mb-4">
          <label for="city" class="form-label" for="city">
						Cidade:
          </label>
          <input id="city" type="text" class="form-input" 
            name="city" value="{{ old('city') }}" placeholder="Cidade:">
          @if ($errors->has('city'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('city') }}</strong>
          </span>
          @endif
				</div>
        <!-- GPS -->
        <div class="mb-4">
          <label for="gps" class="form-label" for="gps">
						Coordenas GPS:
          </label>
          <input id="gps" type="text" class="form-input" 
            name="gps" value="{{ old('gps') }}" placeholder="41.8213º, 8.2134º">
          @if ($errors->has('gps'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('gps') }}</strong>
          </span>
          @endif
				</div>
				<!-- Location Source -->
        <div class="mb-4">
					<label for="source" class="form-label">
						Dados para uso na localização:
					</label>
					<div class="relative">
						<select id="source" name="source" class="form-select">
						@foreach($sources as $source)
								<option value="{{$source->id}}" 
									{{
										old('source') 
										? (old('source') == $source->id ? 'selected': '') 
										: ($loop->first ? 'selected' : '')
									}} 
								>{{$source->name}}</option>
						@endforeach
						</select>
						<div class="form-select-arrow">
							<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
						</div>
					</div>
        </div>
        <!-- Telephone1 -->
        <div class="mb-4">
          <label for="telephone1" class="form-label" for="telefone1">
						Telefone (1):
          </label>
          <input id="telephone1" type="text" class="form-input" 
            name="telephone1" value="{{ old('telephone1') }}" placeholder="+351227778090">
          @if ($errors->has('telephone1'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('telephone1') }}</strong>
          </span>
          @endif
				</div>
        <!-- telephone2 -->
        <div class="mb-4">
          <label for="telephone2" class="form-label" for="telephone2">
						Telefone (2):
          </label>
          <input id="telephone2" type="text" class="form-input" 
            name="telephone2" value="{{ old('telephone2') }}" placeholder="+351227778090">
          @if ($errors->has('telephone2'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('telephone2') }}</strong>
          </span>
          @endif
				</div>
        <!-- Telephone3 -->
        <div class="mb-4">
          <label for="telephone3" class="form-label" for="telephone3">
						Telefone (3):
          </label>
          <input id="telephone3" type="text" class="form-input" 
            name="telephone3" value="{{ old('telephone3') }}" placeholder="+351227778090">
          @if ($errors->has('telephone3'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('telephone3') }}</strong>
          </span>
          @endif
				</div>
        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="form-label" for="email">
						Email:
          </label>
          <input id="email" type="email" class="form-input" 
            name="email" value="{{ old('email') }}" placeholder="Email"
            >
          @if ($errors->has('email'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
        <!-- Card -->
        <div class="my-8">
          <label for="telephone3" class="form-checkbox-label" for="telephone3">
						<span class="mr-4">
							Multibanco
						</span>
						<input id="card" type="checkbox" class="form-checkbox" 
            name="card" {{ old('card') ? 'checked' : '' }}>
          </label>
				</div>
        <!-- Timetable -->
        <div class="mb-4">
          <label for="timetable" class="form-label" for="timetable">
						Horário:
          </label>
          <input id="timetable" type="text" class="form-input" 
            name="timetable" value="{{ old('timetable') }}" placeholder="Seg-Sex: 10:00 - 17:00">
          @if ($errors->has('timetable'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('timetable') }}</strong>
          </span>
          @endif
				</div>
        <!-- Obs -->
        <div class="mb-4">
          <label for="obs" class="form-label" for="obs">
						Outras informações:
          </label>
          <input id="obs" type="text" class="form-input" 
            name="obs" value="{{ old('obs') }}" placeholder="Possui Wifi, etc.">
          @if ($errors->has('obs'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('obs') }}</strong>
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
