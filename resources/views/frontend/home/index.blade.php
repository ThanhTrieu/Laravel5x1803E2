@extends('frontend.layout')

@section('content')
	<div class="col-lg-12 col-md-12">
		<h2 class="text-center"> This is home</h2>
		<hr>
		<div class="row">
		@foreach ($data as $key => $item)		
			<div class="col-md-4 col-lg-4">
				<div>
					<img src="{{ $item['images'] }}" alt="">
				</div>

				<p> Name : {{ $item['name'] }}</p>
				<p>Price : {{ $item['price'] }}</p>
				<a href="{{ route('frontend.addCart',['id'=>$item['id']]) }}" title="add cart" class="btn btn-primary"> Add Catr + </a>
			</div>
		@endforeach
		</div>
	</div>
@endsection