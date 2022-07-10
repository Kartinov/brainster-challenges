@extends('layouts.main')

@section('title', 'Home')

@section('content')
    @include('partials.tabs')

    <h3 class="mt-3">Додај нов производ:</h3>

    <div class="row justify-content-center pb-3">
        <form class="col-md-6" action="{{ route('projects.store') }}" method="POST">

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            @csrf
            <div class="form-group">
                <label for="name">Име</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="subtitle">Поднаслов</label>
                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle"
                    name="subtitle" value="{{ old('subtitle') }}">
                @error('subtitle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Слика</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" placeholder="http://" value="{{ old('image') }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="project_url">URL</label>
                <input type="text" class="form-control @error('project_url') is-invalid @enderror" id="project_url"
                    name="project_url" placeholder="http://" value="{{ old('project_url') }}">
                @error('project_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Опис</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning btn-block">Додај</button>
        </form>
    </div>

@endsection
