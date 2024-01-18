@extends('layouts.app')

@section('title', 'Создание курса')

@section('content')
<div class="row">
<div class="col-md-12">
    <form action="{{ route('admin.home') }}">
        <input type="submit" value="Вернуться на предыдущую страницу" />
    </form>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <form action="{{ route('category.create') }}" method="post">
            @csrf
            <div>
                <label for="title">Название:</label>
                <input class="form-control @error('title') is-invalid @enderror" type="text" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit">Сохранить</button>
            </div>
        </form>
    </div>
</div>
@endsection('content')