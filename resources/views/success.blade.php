@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center ">
            <img src="{{ asset('images/public.png') }}" alt="Logo" class="img-fluid img-logo">
        </div>
        <div class="col-12 d-flex align-items-center justify-content-center flex-column">
            <img src="{{ asset('images/check.png') }}" alt="check" class="img-fluid img-success">
            <p class="mt-4 success-text">نجاح</p>
        </div>
    </div>
@endsection
