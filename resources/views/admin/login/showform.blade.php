<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="{{ asset('css/admin/bootstrap.min.css') }}">
	<style type="text/css">
		form{
			border: 1px solid #ccc;
			padding: 15px;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 offset-lg-3 col-md-6 offset-md-3">
				<h2 class="text-center">Admin login</h2>
				<div class="row">
					<div class="col-md-12">

					@if ($mess === 'fail')
						<h5 class="text-center">Username or password invaild</h5>
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
					</div>
				</div>	
				<form action="{{ route('admin.showForm') }}" method="POST">
					@csrf 
					<div class="form-group">
						<label for="user">Username</label>
						<input class="form-control" type="text" name="user" id="user">
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input class="form-control" type="password" name="pass" id="pass">
					</div>
					<button type="submit" name="btnSub" class="btn btn-primary">Login</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>