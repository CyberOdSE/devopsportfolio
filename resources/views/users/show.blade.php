@extends('common.layout')

@section('content')
    <section class="hero  is-large  is-bold is-primary"   >
        <div class="hero-body">
            <div class="container">

                <p class="title is-2">User ID: {{$user->id}}</p>
                <p class="subtitle is-3">
                    <small>Name:{{ $user->name}}</small>
                    <br>
                    <small>Email:{{ $user->email }}</small>
                    <br>
                    <small>Password:{{ $user->password }}</small>
                    <br>
            </div>

        </div>

    </section>

@endsection
