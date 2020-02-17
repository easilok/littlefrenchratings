@extends ('layouts.app')

@section('content')

<div class="container mx-auto">

@forelse ($establishments as $establishment)
	<article class="rounded-lg border border-gray-400 shadow-lg flex w-full flex-wrap my-4">
		<div class="px-4 pt-8 pb-4 border-b border-gray-400 w-full flex flex-wrap">
			<div class="w-full tracking-wider mb-2">
				<span class="text-2xl"><a class="hover:underline" href="/establishment/{{$establishment->id}}">{{$establishment->name}}</a></span>
				<span>- {{$establishment->parish}}</span>
			</div>
			@if ($establishment->address)
			<span class="mx-2 my-1 w-full">
				{{$establishment->address}}, 
				{{$establishment->parish}}
				@if ($establishment->city)
					, {{$establishment->city}}
				@endif
			</span>
			@endif
			@if ($establishment->email)
			<span class="mx-2 my-1 w-full"><a href="mailto:{{$establishment->email}}">
				<img class="inline-block mr-2" src="/svg/icons/paper-plane.svg" style="height:20px" alt="email">{{$establishment->email}}
			</a></span>
			@endif
			@if ($establishment->plates->count())
			<span class="mx-2 my-3 w-full">Pratos:
				@foreach($establishment->plates as $plate)
					<a class="hover:text-orange-500 hover:underline" href="/plate/{{$plate->id}}">{{$plate->name}}</a>{{$loop->last ? '' : ','}}
				@endforeach
			</span>
			@endif
		</div>
		<div class="p-4 w-full flex flex-wrap justify-between">
			<div class="w-full mb-3 sm:mb-0 sm:w-1/3">Avaliação Média:
			@if ($establishment->ratingAvg)
				{{$establishment->ratingAvg}}
			@else
				N/A
			@endif
			</div>
			@if ($establishment->gps)
			<div class="w-full mb-3 sm:mb-0 sm:w-1/3">
				<a href="geo:{{$establishment->gps}}" target="_blank" class="hover:underline md:hidden">
					<img class="inline-block mr-2" style="height: 20px;" src="/svg/icons/map.svg" alt="GPS"><span>{{$establishment->gps}}</span>
				</a>
				<a href="https://www.google.com/maps/search/?api=1&query={{$establishment->gps}}" target="_blank" class="hover:underline hidden md:block">
					<img class="inline-block mr-2" style="height: 20px;" src="/svg/icons/map.svg" alt="GPS"><span>{{$establishment->gps}}</span>
				</a>
			</div>
			@endif
			@if ($establishment->telephone1)
			<div class="w-full mb-3 sm:mb-0 sm:w-1/3"><a href="tel:{{$establishment->telephone1}}" class="hover:underline">
				<img class="inline-block mr-2" style="height: 20px;" src="/svg/icons/telephone.svg" alt="telephone"><span>{{$establishment->telephone1}}</span>
			</a></div>
			@endif
		</div>
	</article>
@empty
	<p>Ainda não existem estabelecimentos</p>
@endforelse

</div>

@endsection
