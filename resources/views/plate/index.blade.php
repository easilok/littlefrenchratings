@extends ('layouts.app')

@section('content')

<div class="container mx-auto">

	<section class="flex flex-wrap w-full">
	@forelse ($plates as $plate)
		<article class="p-2 w-full sm:w-1/2 md:w-1/2 lg:w-1/3 xl:w-1/4 flex">
			<div class="rounded-lg border border-gray-400 shadow-lg w-full my-4">
				<div class="px-4 pt-8 pb-4 w-full flex flex-wrap">
					<div class="w-full tracking-wider mb-2">
						<span class="text-2xl"><a class="hover:underline" href="/plate/{{$plate->id}}">{{$plate->name}}</a></span>
						<span>- <a href="/establishment/{{$plate->establishment->id}}" class="hover:underline">{{$plate->establishment->name}}</a></span>
					</div>
					<span class="mx-2 my-1 w-full flex justify-between">
						<div>
							<span class="text-lg font-bold text-gray-800">{{$plate->ratingAvg > 0 ? $plate->ratingAvg : '-'}}</span><span class="text-sm">/5</span>
						</div>
						<div>
							<span class="font-bold text-gray-800">{{$plate->price > 0 ? $plate->price : '-'}}</span><span class="text-sm">€</span>
						</div>
					</span>
					<div class="mx-2 my-3 w-full">
						@if ($plate->cover->count() > 0)
						<img class="plate-cover-image mx-auto" src="/storage/uploads/{{$plate->cover->first()->path}}" alt="{{$plate->name}}">
						@else
						<img class="plate-cover-image mx-auto" src="/css/icons/francesinha_animated.png" alt="{{$plate->name}}">
						@endif
					</div>
				</div>
			</div>
		</article>
	@empty
		<p class="w-full text-center">Ainda não existem pratos</p>
	@endforelse
	</section>

</div>

@endsection
