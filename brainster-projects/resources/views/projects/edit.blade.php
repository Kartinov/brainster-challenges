@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <h3 class="mt-3">Измени го производот:</h3>

    <div class="row justify-content-center pb-3">
        <form class="col-md-6" action="{{ route('projects.update', $project) }}" method="POST">

            @if (session()->has('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif

            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Име</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ $project->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="subtitle">Поднаслов</label>
                <input type="text" class="form-control @error('subtitle') is-invalid @enderror" id="subtitle"
                    name="subtitle" value="{{ $project->subtitle }}">
                @error('subtitle')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image">Слика</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" placeholder="http://" value="{{ $project->image }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="project_url">URL</label>
                <input type="text" class="form-control @error('project_url') is-invalid @enderror" id="project_url"
                    name="project_url" placeholder="http://" value="{{ $project->project_url }}">
                @error('project_url')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Опис</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="3">{{ $project->description }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Зачувај</button>
            <a href="{{ route('projects.index') }}" class="btn btn-warning">Откажи</a>
        </form>
    </div>

@endsection
