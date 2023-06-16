@extends('common.layout')
@section('style')
    <style>
        table {
            width: 1200px !important;
        }
        .last-cell {
            display: flex;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .last-cell nav {
            margin-left: auto;
        }
        tr {
            display: grid;
            grid-template-columns: 1fr 1.5fr 2fr 2fr 2fr;
        }
    </style>
@endsection

@section('content')
    @include('common.notifications')
    @stack('scripts')
    <section class="hero  is-bold is-primary" >
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Routes</p>
            </div>
        </div>
    </section>

    <section class="section" style="min-height: 771px">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="has-text-right">
                        <a href="/routes/create" class="button is-primary">Add a new route</a>
                    </div>
                    <div class="content">
                        <table class="table" style="margin-top: 15px; border-radius: 10px;">
                            <thead>
                            <tr>
                                <th>Route</th>
                                <th>Starting Point</th>
                                <th>Ending Point</th>
                                <th>Truck ID</th>
                                <th class="last-cell">{{ $routes->links() }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($routes as $route)

                                <tr>
                                    <td>{{ $route->id }}</td>
                                    <td>{{ $route->start_place }}</td>
                                    <td class="last-cell">{{ $route->end_place }}</td>
                                    <td>{{ $route->truck_id }}</td>
                                    <td class="has-text-right"><a href="{{ route('routes.show', $route) }}" class="button is-primary">View Route</a></td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
