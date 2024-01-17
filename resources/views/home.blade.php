@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')

<form action="{{ route('user.update') }}" method="post" style="margin-top:20px;">
	@csrf
	<div class="mb-3">Персональные данные</div>
	<div class="mb-3">
		<label for="txtEmail" class="form-label">Email</label>
		<input name="email" type="email" id="txtEmail" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror">
		@error('email')
		<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
	<div class="mb-3">
		<label for="txtName" class="form-label">ФИО</label>
		<input name="name" id="txtName" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror">
		@error('name')
		<div class="invalid-feedback">{{ $message }}</div>
		@enderror
	</div>
	<input type="submit" class="btn btn-primary" value="Сохранить">
</form>

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