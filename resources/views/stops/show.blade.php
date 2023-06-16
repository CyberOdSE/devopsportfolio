@extends('common.layout')

@section('content')
    <section class="hero  is-bold is-primary"  >
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">{{$stop->location}}</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">

                <div class="column is-12">

                    <div class="content">
                        <strong>ID:</strong>{{ $stop->id}}
                        <br>
                        <strong>Day:</strong> {{ $stop->day}}
                        <br>
                        <strong>Time:</strong> {{ $stop->Time}}
                        <br>
                        <strong>Occasion:</strong> {{ $stop->occasion}}
                        <br>
                        <strong>Length:</strong> {{ $stop->length}}
                        <div class="control" style="margin-top: 15px">
                            <a type="button" href="/stops" class="button is-light">Return</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
