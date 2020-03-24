@extends('layouts.app')

@section('content')
<div class="container mx-auto ">
  <div class="form-center-card-ext-p mt-5 relative">
		<div class="border-b border-gray-400 mb-5">
	    <h2 class="item-row item-title text-xl text-platform-color font-bold">Editar Prova</h2>
		</div>

    <div class="w-full flex justify-center justify-center">
			@if ($taste->ratings->count() == 0)
			<!-- Remove Icon -->
			<delete-form url="{{ url('/taste/'.$taste->id) }}">
				<template v-slot:args>
					@csrf
					@method("DELETE")
				</template>
			</delete-form>
			@endif

			<form method="POST" class="w-full justify-center" action="{{ url('/taste/'.$taste->id) }}">
        @csrf
				@method("PATCH")
        <!-- Establishment -->
        <div class="mb-4 item-row">
          <label for="establishment" class="form-label">
						Prato:
          </label>
					<span class="form-input border-b-0 italic inline-block">{{ $taste->plate->name }} - {{ $taste->plate->establishment->name }}, {{ $taste->plate->establishment->parish }}</span>
				</div>
        <!-- Date -->
				<div class="md:flex item-row">
					<div class="mb-4 md:w-1/2 md:pr-4">
						<label for="name" class="form-label">
							Data:
						</label>
						<input id="visit" type="date" class="form-input" 
							name="visit" value="{{ $taste->visit_at->toDateString() }}"
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
							name="price" value="{{ $taste->price }}" placeholder="12.0">
						@if ($errors->has('price'))
						<span class="input-validation-error" role="alert">
							<strong>{{ $errors->first('price') }}</strong>
						</span>
						@endif
					</div>
				</div>
				<!-- Save Button -->
				<div class="item-row item-footer flex justify-end">
					<button type="submit" class="btn-std btn-platform">
						Atualizar
					</button>
				</div>
      </form>
		</div>
  </div>
</div>
@endsection
