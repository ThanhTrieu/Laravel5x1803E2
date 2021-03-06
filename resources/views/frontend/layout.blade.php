<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Home - page</title>
		<link rel="stylesheet" href="{{ asset('css/frontend/bootstrap.min.css') }}">
		
		<script type="text/javascript" src="{{ asset('js/admin/jquery-3.3.1.min.js') }}"></script>
	</head>
	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
				<a class="navbar-brand" href="#">@lang('common.logo')</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item active">
							<a class="nav-link" href="#"> @lang('common.home') <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">@lang('common.link')</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								@lang('common.dropdown')
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#">Disabled</a>
						</li>
					</ul>
					<form class="form-inline my-2 my-lg-0">

						<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">@lang('common.search')</button>

						<select class="form-control ml-3" name="chooselang" id="chooselang" onchange="changeLanguage(this);">
							<option {{ Session::get('locale') === 'en' ? "selected='selected'" : '' }} value="en">English</option>
							<option {{ Session::get('locale') === 'vi' ? "selected='selected'" : '' }} value="vi">Viet Nam</option>
						</select>
					</form>
				</div>
			</nav>
		</div>

		<script type="text/javascript">
			function changeLanguage(obj){
				let nameLang = $(obj).val().trim();
				let url = "{{ route('changelang') }}" + "/" + nameLang;
				window.location.href = url;
			}
		</script>
		
		<div class="container mt-5 py-5">
			<div class="row">
				@yield('content')
			</div>
		</div>

		<footer class="bg-dark py-5">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<h3 class="text-center" style="color: white;"> This is footer</h3>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>