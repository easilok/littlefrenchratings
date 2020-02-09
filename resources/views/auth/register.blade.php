@extends('layouts.app')

@section('content')
<div class="container mx-auto">
  <div class="form-center-card mt-5">
    <div class="mb-6 text-xl text-teal-500 font-bold">{{ __('Register') }}</div>

    <div class="w-full flex justify-center justify-center mb-6">
      <form method="POST" class="w-full justify-center" action="{{ route('register') }}'">
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
            name="email" value="{{ old('email') }}" placeholder="Email" 
            required autofocus>
          @if ($errors->has('email'))
          <span class="input-validation-error" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
          </span>
          @endif
        </div>
        <strong> FALTA AS PASS </strong>
        <button type="submit" class="btn-std btn-blue">
          {{ __('Register') }}
        </button>
      </form>
  </div>
</div>
@endsection
