@extends('layouts.app')

@section('title', 'Редактирование курса')

@section('content')
<div class="row">
<div class="col-md-12">
    <form action="{{ route('courses') }}">
        <input type="submit" value="Вернуться на предыдущую страницу" />
    </form>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('course.edit') }}" method="post">
            @csrf
            <input hidden type="number" id="id" name="id" value="{{ $course->id }}" required>
            <div>
                <label for="title">Название:</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{ $course->title }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="duration">Длительность:</label>
                <input class="form-control @error('duration') is-invalid @enderror" type="number" id="duration" name="duration" required value="{{ $course->duration }}">
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="cost">Цена:</label>
                <input class="form-control @error('cost') is-invalid @enderror" type="number" id="cost" name="cost" required value="{{ $course->cost }}">
                @error('cost')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Описание:</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ $course->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="image">Путь до картинки:</label>
                <input class="form-control @error('image') is-invalid @enderror" type="text" id="image" name="image" required value="{{ $course->image }}"/>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="category">Категория:</label>
                <select id="category" name="category_id">
                    @foreach ($categories as $category)
                        @if ($course->category_id == $category->id)
                            <option selected value="{{ $category->id }}">{{ $category->title }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection('content')