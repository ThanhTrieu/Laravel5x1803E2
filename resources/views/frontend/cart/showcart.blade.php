@extends('frontend.layout')

@section('content')
	<div class="col-lg-12 col-md-12">
		<h3 class="text-center">This is info cart</h3>
		<hr>
		<table class="table">
			<thead>
				<tr>
					<th> # </th>
					<th> Name </th>
					<th>Image</th>
					<th>Price</th>
					<th>QTY</th>
					<th>Money</th>
					<th colspan="2" width="5%" class="text-center">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($cart as $key => $item)
					<tr>
						<td>{{ $key + 1 }}</td>
						<td>{{ $item['name'] }}</td>
						<td>
							<img src="{{ $item['attributes']['img'] }}" alt="">
						</td>
						<td>{{ $item['price'] }}</td>
						<td>
							<input type="text" value="{{ $item['quantity'] }}">
						</td>
						<td>
							{{ number_format($item['price'] * $item['quantity']) }}
						</td>
						<td>
							<button class="btn btn-primary" title="Edit" onclick="updateCart({{ $item['id'] }}, this)">Edit</button>
						</td>
						<td>
							<a class="btn btn-danger" href="{{ route('frontend.deletecart',['id'=>$item['id']]) }}" title="Delete">Delete</a>
						</td>
					</tr>
				@endforeach
				
			</tbody>
		</table>
	</div>
	<script>
		function updateCart(id, obj){
			let qty = $(obj).parent().prev().prev().find('input').val().trim();
			let url = "{{ route('frontend.updatecart') }}" + "/" + id + "/" + qty;
			window.location.href = url;
		}
	</script>
@endsection