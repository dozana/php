@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h1>Users</h1>
                @foreach($users as $user)
                    <h4>{{ $user->name }}</h4>
                    <p>{{ $user->address->country }}</p>
                @endforeach

                <h2>Addresses</h2>
                @foreach($addresses as $address)
                    <h4>{{ $address->country }}</h4>
                    <p>{{ $addresses->user->name }}</p>
                @endforeach

            </div>
        </div>
    </div>
@endsection
