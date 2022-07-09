@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="row py-5">
            <div class="col-md-6 mx-auto card shadow text-center p-3 h-100 text-dark cursor-pointer">
                <img src="{{ $project->image }}" class="card-img-top w-25 mx-auto" alt="{{ $project->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>

                    <p class="text-secondary">{{ $project->subtitle }}</p>

                    <p class="card-text">{{ $project->description }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
