@extends('layouts.app')

@section('title', 'Кабинет администратора')

@section('content')

<a href="">Создать курс</a>

@if (count($applications) > 0)
<table class="table table-striped table-borderless">
	<thead>
		<tr>
			<th>Название курса</th>
			<th>Дата заявки</th>
			<th>Статус</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($applications as $application)
		<tr>
			<td><h3>{{ $application->course->title }}</h3></td>
			<td>{{ $application->application_date }}</td>
			<td>{{ $application->status }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
@endsection('content')