@extends('layouts.main')

@section('title', 'Contact')

@section('heading')
    <h1 class="display-4 font-weight-bolder mb-3">Contact me</h1>
    <p class="text-light-gray">Have questions? I have answers!</p>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto py-3">

                {{-- inactive form --}}
                <form>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Phone Number">
                    </div>
                    <div class="form-group">
                        <textarea cols="30" rows="4" class="form-control" placeholder="Message"></textarea>
                    </div>

                    <button type="submit" class="btn btn-info">SEND</button>
                </form>
            </div>
        </div>
    </div>
@endsection
