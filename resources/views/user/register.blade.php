@extends('layouts.app')

@section('content')
<div class="container mx-auto center-card-container">
  <div class="form-center-card mt-5">
    <div class="mb-6 text-xl text-platform-color font-bold">{{ __('Register') }}</div>

    <div class="w-full flex justify-center justify-center">
      <form method="POST" class="w-full justify-center" action="{{ url('/user/register') }}">
        @csrf
        <!-- Name -->
        <div class="mb-4">
          <label for="name" class="form-label" for="name">
            {{ __('Name') }}
          </label>
          <input id="name" type="name" class="form-input" 
            name="name" value="{{ old('name') }}" placeholder="Nome" 
            required autofocus>
          @if ($errors->has('name'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
          </span>
          @endif
        </div>
        <!-- Email -->
        <div class="mb-4">
          <label for="email" class="form-label" for="email">
            {{ __('E-Mail Address') }}
          </label>
          <input id="email" type="email" class="form-input" 
            name="email" value="{{ old('email') }}" placeholder="Email" required
            >
          @if ($errors->has('email'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
				<!-- User Role -->
        <div class="mb-4">
					<label for="role" class="form-label">
						Grupo de Permissões
					</label>
					<div class="relative">
						<select id="role" name="role" class="form-select">
						@foreach($roles as $role)
								<option value="{{$role->id}}" 
									{{
										old('role') 
										? (old('role') == $role->id ? 'selected': '') 
										: ($loop->first ? 'selected' : '')
									}} 
								>{{$role->name}}</option>
						@endforeach
						</select>
						<div class="form-select-arrow">
							<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
						</div>
					</div>
        </div>
				<div class="flex justify-end">
					<button type="submit" class="btn-std btn-platform">
						{{ __('Register') }}
					</button>
				</div>
      </form>
  </div>
</div>
@endsection
