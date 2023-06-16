@extends('common.layout')

@section('content')
    @include('common.notifications')
    @stack('scripts')
    <section class="hero  is-bold is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Stops</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">
                        <div class="has-text-right">
                            <a class="button is-primary" href=" {{ route('stops.create') }}">Add a new Stop</a>
                        </div>
                        <table class="table" style="margin-top: 15px">
                            <tr>
                                <th>Id</th>
                                <th>Day</th>
                                <th>Location</th>
                                <th>Time</th>
                                <th>Occasion</th>
                                <th>Length</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($stops as $stop)
                                <tr>
                                    <td>{{ $stop->id }}</td>
                                    <td>{{ $stop->day }}</td>
                                    <td><a href=" {{ route('stops.show',$stop) }}">{{ $stop->location }}</a></td>
                                    <td>{{ $stop->time }}</td>
                                    <td>{{ $stop->occasion }}</td>
                                    <td>{{ $stop->length }}</td>
                                    <td><a class="button is-primary" href=" {{ route('stops.edit', $stop) }}">Edit</a></td>
                                    <td>
                                        <form method="POST" onclick="return confirm('Are you certain you want to delete the stop: {{$stop->location}}, ID: {{$stop->id}}?')" action="{{ route('stops.destroy', $stop) }}">
                                            @csrf
                                            @method('DELETE')
                                            <div class="form-group">
                                                <button class="button is-danger" type="submit">Delete</button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                        {{ $stops->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
