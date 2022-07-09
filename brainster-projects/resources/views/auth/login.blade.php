@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="container h-100">
        <div class="row py-5 h-100 align-items-center">
            <div class="col-md-6 mx-auto card shadow p-3 h-100 text-dark">
                <form action="{{ route('auth.authenticate') }}" method="POST">
                    @csrf

                    {{-- email --}}
                    <div class="form-group">
                        <label for="email" class="col-form-label">Е-пошта</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- password --}}
                    <div class="form-group">
                        <label for="password" class="col-form-label">Лозинка</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            id="password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @error('credentials')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <button type="submit" class="btn btn-warning btn-block">Логирај се</button>
                </form>
            </div>
        </div>
    </div>
@endsection
