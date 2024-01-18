<html>
	<head>
		<link href="{{ URL::asset('css/app.css'); }}" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
		<title>@yield('title')</title>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-light bg-light">
				<div class="container-fluid">
					<a href="{{ route('index') }}" class="navbar-brand me-auto"><img src="{{ URL::asset('images/logo.jpg'); }}" style="height: 70px;"></a>
					<a href="{{ route('index') }}#company" class="nav-item nav-link">О компании</a>
					<a href="{{ route('index') }}#courses" class="nav-item nav-link">Курсы</a>
					@guest
					<a href="{{ route('register') }}" class="nav-item nav-link">Регистрация</a>
					<a href="{{ route('login') }}" class="nav-item nav-link">Вход</a>
					@endguest
					@auth
					@if (Auth::user()->is_admin)
						<a href="{{ route('admin.home') }}" class="nav-item nav-link">Панель администратора</a>
					@endif
					<a href="{{ route('home') }}" class="nav-item nav-link">Заявки</a>
						<form action="{{ route('logout') }}" method="POST" class="form-inline" style="margin:0; border: none;">
							@csrf
							<input type="submit" class="btn btn-danger" value="Выход"/>
						</form>
					@endauth
				</div>
			</nav>
		</header>
		<div class="container">
			@yield('content')
		</div>
		<footer>
			<p><center>Сделал: Петунин Иван Евгеньевич</center></p>
		</footer>
	</body>

</html>