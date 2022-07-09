@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="row py-5">
        @foreach ($projects as $project)
            <div class="col-sm-6 col-md-4 mt-4">
                <a href="{{ route('projects.show', $project) }}"
                    class="card text-center p-3 h-100 text-dark cursor-pointer">
                    <img src="{{ $project->image }}" class="card-img-top w-25 mx-auto" alt="{{ $project->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="text-secondary">{{ $project->subtitle }}</p>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection
