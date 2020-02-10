@extends('layouts.app')

@section('content')
<div class="container mx-auto center-card-container">
    @if ($errors->any())
    <div class="italic bg-gray-300 text-red-500 px-6">
        <ul class="list-disc">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (Session::has('status'))
      @if (Session::get('status') !== "")
        <div class="mb-4 text-base italic bg-blue-200 text-white p-2 rounded">
          {{Session::get('status')}}
        </div>
      @endif
    @endif

 <div class="form-center-card mt-5">
    <div class="mb-6 text-xl text-platform-color font-bold">Mudar Palavra-Passe</div>

    <div class="w-full flex justify-center">
      <form method="POST" class="w-full justify-center" action="{{ url('/user/password') }}">
      @csrf
      @method('PATCH')
      <input id="user_id" name="user_id" type="hidden" value="{{ $user->id }}">
        <!-- Name -->
        <div class="mb-4">
          <label class="form-label" for="name">
            {{ __('Name') }}
          </label>
          <input id="name" type="name" class="form-input form-input-readonly" 
            name="name" value="{{ $user->name }}" placeholder="Nome" 
            readonly>
        </div>
        <!-- Password -->
        <div class="mb-4">
          <label class="form-label" for="password">
            {{ __('Password') }}
          </label>
          <input id="password" type="password" class="form-input" 
            name="password" placeholder="Palavra-Passe" 
            required autofocus>
          @if ($errors->has('password'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
          </span>
          @endif
        </div>
        <!-- Confirm Password -->
        <div class="mb-4">
          <label class="form-label" for="password-confirm">
            {{ __('Confirm Password') }}
          </label>
          <input id="password-confirm" type="password" class="form-input" 
            name="password-confirm" placeholder="Confirme a Palavra-Passe" 
            required>
        </div>
				<div class="flex justify-end mt-6"> 
	        <button type="submit" class="btn-std btn-platform">Guardar</button>
				</div>
      </form>
  </div>
</div>
@endsection
