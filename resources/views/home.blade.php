@extends('layouts.app')

@section('title', 'Мои Заявки')

@section('content')
<p class="text-end"><a href="{{ route('course.create') }}">Добавить курс</a></p>
@if (count($applications) > 0)
<table class="table table-striped table-borderless">
	<thead>
		<tr>
			<th>Название</th>
			<th>Короткое описание</th>
			<th>Категория</th>
			<th colspan="2">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($applications as $application)
		<tr>
			<td><h3>{{ $application->name }}</h3></td>
			<td>{{ $application->short_description }}</td>
			<td>{{ $application->category }}</td>
			<td>
				<a href="{{ route('application.edit', ['id' => $application->id]) }}">Изменить</a>
			</td>
			<td>
				<a href="{{ route('application.delete', ['id' => $application->id]) }}">Удалить</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif
@endsection('content')