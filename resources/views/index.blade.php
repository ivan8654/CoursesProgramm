@extends('layouts.app')
@section('title', 'Главная')
@section('content')
<a name="company"></a>
<h1 class="company">О компании</h1>
<p class="text-description">"Программы сферы образования" - это компания, которая специализируется на проведении курсов программирования для всех уровней. Наша миссия - помочь студентам и профессионалам приобрести навыки востребованные на рынке труда в сфере информационных технологий. Мы предлагаем широкий спектр образовательных программ, от основ программирования до продвинутых технологий разработки. Наши опытные преподаватели и индивидуальный подход к каждому студенту помогут им достичь успеха в своей карьере в IT-индустрии.</p>
<img src="images/XXL.webp" style="height: 480px;">
<a name="courses"></a>
	<h1 class="courses">Курсы</h1>
	<form class='categories_hold' action="{{ route('index') }}" method="get">
        <div>
            <label for="category">Выбор категории:</label>
            <select id="category" name="category">
				@foreach ($categories as $category)
					<option value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
			<button class="search_hold" type="submit">Найти</button>
        </div>
    </form>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($courses as $course)
                    <div class="card mb-4">
                        <div class="card-header">{{ $course->title }}</div>

                        <div class="card-body">
                            {{ $course->description }}
                        </div>
                    </div>
                @endforeach

                {{ $courses->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
	<form action="{{ route('application.store') }}" method="post">
	@csrf
        <div>
            <label for="fio">ФИО клиента:</label>
            <input type="text" id="fio" name="fio" required>
        </div>
        <div>
            <label for="email">Почта клиента:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="course">Выбор курса:</label>
            <select id="course" name="course">
				@foreach ($courses as $course)
					<option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button type="submit">Отправить заявку</button>
        </div>
    </form>
@endsection('content')