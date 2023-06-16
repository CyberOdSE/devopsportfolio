@extends('common.layout')

@section('content')
    @include('common.notifications')
    @stack('scripts')
    <section class="hero  is-bold is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Users</p>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <div class="content">
                        <div class="has-text-right">
                            <a class="button is-primary" href=" {{ route('register') }}">Register new user</a>
                        </div>
                        <table class="table" style="margin-top: 15px">
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Admin Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href=" {{ route('users.show',$user) }}">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->password }}</td>
                                    <td>
                                        @if($user->is_admin)
                                            ✅
                                        @else
                                            ❌
                                        @endif

                                    </td>
                                    <td><a class="button is-primary" href=" {{ route('users.edit', $user) }}">Edit</a></td>
                                    <td>
                                        <form method="POST" onclick="return confirm('Are you certain you want to delete {{$user->name}}, ID: {{$user->id}}?')" action="{{ route('users.destroy', $user) }}">
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
