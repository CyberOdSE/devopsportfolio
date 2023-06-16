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
        grid-template-columns: 1fr 3fr 3fr 3fr 2fr 1fr 3fr;
    }
</style>
@endsection
@section('content')
@include('common.notifications')
@stack('scripts')
<section class="hero  is-bold is-primary">
    <div class="hero-body">
        <div class="container">
            <p class="title is-2">Customers</p>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="columns">
            <div class="column is-12">
                <a class="button is-primary" href=" {{ route('customers.create') }}">Add a new Customer</a>
                <div class="content">
                    <table class="table" style="margin-top: 15px; border-radius: 10px;">
                        <tr>
                            <th>Id</th>
                            <th>Customer's Name</th>
                            <th>Adresses</th>
                            <th></th>
                            <th>Truck ID</th>
                            <th></th>
                            <th class="last-cell">{{ $customers->links() }}</th>
                        </tr>
                        @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address1 }}</td>
                            <td>{{ $customer->address2 }}</td>
                            <td>{{ $customer->truck_id }}</td>
                            <td><a class="button is-primary" href=" {{ route('customers.edit', $customer) }}">Edit</a></td>
                            <td>
                                <form method="POST" onclick="return confirm('Are you certain you want to delete {{$customer->name}}, ID: {{$customer->id}}?')" action="{{ route('customers.destroy', $customer) }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="form-group has-text-right">
                                        <button class="button is-danger " type="submit">Delete</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
