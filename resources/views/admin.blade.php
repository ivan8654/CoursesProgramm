@extends('layouts.app')

@section('title', 'Кабинет администратора')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-4">
		<form action="{{ route('category.createpage') }}">
			<input type="submit" value="Добавить категорию" />
		</form>
    </div>
    <div class="col-md-4">
		<form action="{{ route('courses') }}">
			<input type="submit" value="Редактор курсов" />
		</form>
    </div>
	<div class="col-md-4">
		<form action="{{ route('index') }}">
			<input type="submit" value="Вернуться на главную страницу" />
		</form>
    </div>
  </div>
</div>

@if (count($applications) > 0)
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<table class="table">
			<thead>
			<tr>
				<th>Имя пользователь</th>
				<th>Email</th>
				<th>Название курса</th>
				<th>Дата заявки</th>
				<th>Текущий статус</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			@foreach ($applications as $application)
			<tr>
				<td>{{ $application->user->name }}</td>
				<td>{{ $application->user->email }}</td>
				<td>{{ $application->course->title }}</td>
				<td>{{ $application->application_date }}</td>
				<td>{{ $application->status }}</td>
				<td>
					<form action="{{ route('application.reject') }}" method="post" style="border: none; padding: 0px;">
						@csrf
						<input name="id" hidden type="number" value="{{ $application->id }}"/>
						<input type="submit" value="Отклонить" />
					</form>
				</td>
				<td>
					<form action="{{ route('application.approve') }}" method="post" style="border: none; padding: 0px;">
						@csrf
						<input name="id" hidden type="number" value="{{ $application->id }}"/>
						<input type="submit" value="Подтвердить" />
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		{{ $applications->links('pagination::bootstrap-4') }}
		</div>
	</div>
</div>
@endif
@endsection('content')