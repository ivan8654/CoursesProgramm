@extends('layouts.app')
@section('title', 'Информация о курсе')
@section('content')
	<div class="row">
		<div class="col">
			<h1>{{$course->title}}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<img src="{{$course->image}}"/>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p> Длительность курса: {{$course->duration}} </p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p> Стоимость: {{$course->cost}} </p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p> {{$course->description}} </p>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<p> Категория: {{$course->category->title}} </p>
		</div>
	</div>
@endsection('content')