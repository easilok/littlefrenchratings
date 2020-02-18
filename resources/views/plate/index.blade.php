@extends ('layouts.app')

@section('content')

<div class="container mx-auto">

	<section class="flex flex-wrap w-full">
	@forelse ($plates as $plate)
		<article class="p-2 w-full sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/4 flex">
			<div class="rounded-lg border border-gray-400 shadow-lg flex w-full flex-wrap my-4">
				<div class="px-4 pt-8 pb-4 border-b border-gray-400 w-full flex flex-wrap">
					<div class="w-full tracking-wider mb-2">
						<span class="text-2xl"><a class="hover:underline" href="/plate/{{$plate->id}}">{{$plate->name}}</a></span>
						<span>- <a href="/establishment/{{$plate->establishment->id}}" class="hover:underline">{{$plate->establishment->name}}</a></span>
					</div>
					<span class="mx-2 my-1 w-full">
						Avaliação Média: 
					@if ($plate->ratingCount > 0)
						{{$plate->ratingAvg}}
					@else
						Sem avaliações.
					@endif
					</span>
					{{-- @if ($plate->images->count > 0) --}}
					<div class="mx-2 my-3 w-full px-4">
							{{-- <img src="$plate->images->first()->path" alt="$plate->name"> --}}
							<img src="/css/icons/nibble_francesinhas.jpg" alt="$plate->name">
					</span>
					{{-- @endif --}}
				</div>
			</div>
		</article>
	@empty
		<p class="w-full text-center">Ainda não existem pratos</p>
	@endforelse
	</section>

</div>

@endsection
