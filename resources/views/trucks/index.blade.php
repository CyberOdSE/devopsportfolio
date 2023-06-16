@extends('common.layout')

@section('content')
    @include('common.notifications')
    @stack('scripts')
    <section class="hero  is-bold is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Trucks</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">
                        <div class="has-text-right">
                            <a class="button is-primary" href=" {{ route('trucks.create') }}">Add a new Truck</a>
                        </div>
                        <table class="table" style="margin-top: 15px">
                            <tr>
                                <th>Id</th>
                                <th>Licence</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>PosX</th>
                                <th>PosY</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($trucks as $truck)
                                <tr>
                                    <td>{{ $truck->id }}</td>
                                    <td>{{ $truck->licence }}</td>
                                    <td>{{ $truck->location }}</td>
                                    <td>{{ $truck->status }}</td>
                                    <td>{{ $truck->posX }}</td>
                                    <td>{{ $truck->posY }}</td>
                                    <td>{{$truck->progress}}</td>
                                    <td><a class="button is-primary" href=" {{ route('trucks.edit', $truck) }}">Edit</a></td>
                                    <td>
                                        <form method="POST" onclick="return confirm('Are you certain you want to delete the truck: {{$truck->licence}}, ID: {{$truck->id}}?')" action="{{ route('trucks.destroy', $truck) }}">
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
                        {{ $trucks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
