@extends('layouts.app')

@section('content')
<div class="container mx-auto">
	@if (Session::has('status'))
			@if (Session::get('status') !== "")
			<div class="mb-4 text-base italic bg-green-500 text-white tracking-wide py-2 px-4 rounded">
					{{Session::get('status')}}
			</div>
			@endif
	@endif
	@if ($errors->any())
	<div class="alert alert-danger">
			<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
			</ul>
	</div>
	@endif
  <div class="form-center-card mt-5">
    <h2 class="mb-6 text-xl text-platform-color font-bold">{{ $user->name }}</h2>

    <div class="w-full flex justify-center justify-center">
      <form method="POST" class="w-full justify-center" action="{{ url('/users/'.$user->id) }}">
        @csrf
				@method('PATCH')
        <!-- Nome -->
        <div class="mb-4">
          <label for="name" class="form-label">
            {{ __('Name') }}
          </label>
          <input id="name" type="name" class="form-input" 
            name="name" value="{{ $user->name }}" placeholder="" 
            required>
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
            name="email" value="{{ $user->email }}" placeholder="Email" 
            required autofocus>
          @if ($errors->has('email'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
				</div>
				<!-- Password -->
        <div class="mb-4">
          <label for="password" class="form-label" for="password">
            Palavra-passe
          </label>
          <input id="password" type="password" class="form-input" 
            name="password" value="" placeholder="Insira a nova palavra-passe" 
             >
          @if ($errors->has('password'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
				<!-- Confirm password -->
        <div class="mb-4">
          <label for="password-confirm" class="form-label" for="password-confirm">
            Confimação Palavra-Passe
          </label>
          <input id="password-confirm" type="password" class="form-input" 
            name="password-confirm" value="" placeholder="Confirme a sua palavra-passe" 
            >
        </div>
				<!-- User Role -->
        <div class="mb-4">
					<label for="role" class="form-label" for="role">
						Grupo de Permissões
					</label>
					<div class="relative">
						<select id="role" name="role" class="form-select">
						@foreach($roles as $role)
							@if ($role->id === $userRole->id)
								<option value="{{$role->id}}" selected >{{$role->name}}</option>
							@else
								<option value="{{$role->id}}">{{$role->name}}</option>
							@endif
						@endforeach
						</select>
						<div class="form-select-arrow">
							<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
						</div>
					</div>
        </div>
				<div class="flex justify-end">
					<button type="submit" class="btn-std btn-platform">
						{{ __('Change') }}
					</button>
				</div>
      </form>
  </div>
</div>
@endsection
