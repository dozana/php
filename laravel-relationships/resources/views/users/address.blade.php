@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2>Addresses</h2>
                @foreach($addresses as $address)
                    <h4>{{ $address->country }}</h4>
                    <p>{{ $address->user->name }}</p>
                @endforeach

            </div>
        </div>
    </div>
@endsection
