@extends('layouts.main')

@section('title', 'Home')

@section('style')
    <style>
        .card {
            position: relative;
        }

        .card-footer {
            position: absolute;
            background-color: rgba(83, 83, 83, 0.4);
            bottom: 0;
            left: 0;
            right: 0;
            display: none;
        }

        .card:hover .card-footer {
            display: block;
        }
    </style>
@endsection

@section('content')
    @include('partials.tabs')

    <h3 class="mt-3">Измени постоечки производи:</h3>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session()->get('success') }}</div>
    @endif

    <div class="row pb-3">
        @foreach ($projects as $project)
            <div class="col-sm-6 col-md-4 mt-4">
                <div class="card text-center p-3 h-100 text-dark cursor-pointer">
                    <img src="{{ $project->image }}" class="card-img-top w-25 mx-auto" alt="{{ $project->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="text-secondary">{{ $project->subtitle }}</p>
                        <p class="card-text">{{ $project->description }}</p>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a href="{{ $project->project_url }}" target="_blank" class="btn btn-info mr-3">
                                <i class="fa-solid fa-square-arrow-up-right fa-2x"></i>
                            </a>

                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning mr-3  text-white">
                                <i class="fa-solid fa-square-pen fa-2x"></i>
                            </a>

                            {{-- button trigger ask before delete modal --}}
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#askBeforeDeleteModal">
                                <i class="fa-solid fa-trash-can fa-2x"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- askBeforeDeleteModal -->
            <div class="modal fade" id="askBeforeDeleteModal" tabindex="-1"">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Избриши</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Дали сте сигурни дека сакате да го избришите производот?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Откажи</button>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-warning">Избриши</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
