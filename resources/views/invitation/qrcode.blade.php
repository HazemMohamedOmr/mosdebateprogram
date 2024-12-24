@extends('invitation.layouts.app')

@section('content')

    <div class="container pb-5">
        <div class="form-container mx-auto" style="max-width: 700px;">
            <div class="my-5 separator">
                <div class="row">
                    <div class="col-12 order-1 order-md-2 d-flex justify-content-center">
                        <img src="{{ asset('images/public.png') }}" class="img-fluid zoom-image" style="height: 250px;">
                    </div>
                </div>
            </div>

           <div class="d-flex justify-content-center">
               {{ $image }}
           </div>

        </div>
    </div>

@endsection
