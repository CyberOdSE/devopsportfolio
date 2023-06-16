@extends('common.layout')

@section('content')
    <section class="hero  is-large  is-bold is-primary"   >
        <div class="hero-body">
            <div class="container">

                <p class="title is-2">Route ID: {{$route->id}}</p>
                <p class="subtitle is-3">
                    <small>Starting Point:{{ $route->start_place }}</small>
                    <br>
                    <small>Ending Point:{{ $route->end_place }}</small>
                    <br>
                    <small>Truck ID:{{ $route->truck_id }}</small>
                    <br>
                <div class="field is-grouped">
                    <div class="control">
                    <a href="/routes/{{$route->id}}/edit" class="button is-primary">Edit</a>
                    </div>
                    <div class="control">
                    <form method="POST" action="{{route('routes.destroy', $route)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="button is-danger">Delete</button>
                    </form>
                    </div>
                </div>

            </div>

        </div>

    </section>

@endsection
