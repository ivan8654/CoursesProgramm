@extends('layouts.app')

@section('title', 'Кабинет администратора')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-4">
		<form action="{{ route('course.createpage') }}">
			<input type="submit" value="Добавить курс" />
		</form>
    </div>
  </div>
</div>

@if (count($courses) > 0)
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<table class="table">
			<thead>
			<tr>
				<th>Название</th>
				<th>Длительность</th>
				<th>Стоимость</th>
				<th>Описание</th>
				<th>Путь к изображению</th>
				<th></th>
				<th></th>
			</tr>
			</thead>
			<tbody>
			@foreach ($courses as $course)
			<tr>
				<td>{{ $course->title }}</td>
				<td>{{ $course->duration }}</td>
				<td>{{ $course->cost }}</td>
				<td>{{ $course->description }}</td>
				<td>{{ $course->image }}</td>
				<td>
					<form action="{{ route('course.editpage', ['course' => $course]) }}" style="border: none; padding: 0px;">
						<input type="submit" value="Редактировать" />
					</form>
				</td>
				<td>
					<form action="{{ route('course.delete') }}" method="post" style="border: none; padding: 0px;">
						@csrf
                        <input type="hidden" name="_method" value="DELETE">
						<input name="id" hidden type="number" value="{{ $course->id }}"/>
						<input type="submit" value="Удалить" />
					</form>
				</td>
			</tr>
			@endforeach
			</tbody>
		</table>
		{{ $courses->links('pagination::bootstrap-4') }}
		</div>
	</div>
</div>
@endif
@endsection('content')