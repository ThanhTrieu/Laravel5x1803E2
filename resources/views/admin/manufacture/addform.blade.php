@extends('admin.layout')

@section('content')
	<div class="row">
		<div class="col-lg-12 col-md-12">
			<h2 class="text-center">This is form add manufacture</h2>
			<a class="btn btn-info" href="{{ route('admin.manufacture') }}" title="list Manfacture"> List Manfacture</a>
			<hr>

			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif
			
			<form action="{{ route('admin.handleAddManu') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="nameManu">Name Manfacture</label>
					<input type="text" name="nameManu" id="nameManu" class="form-control">
				</div>
				<div class="form-group">
					<label for="addressManu">Address Manfacture</label>
					<input type="text" name="addressManu" id="addressManu" class="form-control">
				</div>
				<button type="submit" name="btnSub" class="btn btn-primary"> Add + </button>
			</form>
		</div>
	</div>
@endsection