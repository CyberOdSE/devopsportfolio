@extends('common.layout')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <form method="POST" action="{{ route('customers.store') }}">
                        @csrf
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Add customer
                                </p>
                            </header>

                            <div class="card-content">
                                <div class="content">
                                    <div class="field">
                                        <label class="label">Name</label>
                                        <div class="control">
                                            <textarea
                                                name="name"
                                                class="input @error('name') is-danger @enderror"
                                                type="text"
                                                rows="1"
                                                placeholder="Name of the customer"></textarea>
                                        </div>
                                        @error('name')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Location</label>
                                        <div class="control">
                                            <textarea
                                                name="location"
                                                class="textarea @error('location') is-danger @enderror"
                                                type="number"
                                                rows="1"
                                                placeholder="Customer location"></textarea>
                                        </div>
                                        @error('location')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Truck ID</label>
                                        <div class="control">
                                            <textarea
                                                name="truck_id"
                                                class="textarea @error('truck_id') is-danger @enderror"
                                                rows="1"
                                                placeholder="The truck associated to this customer."></textarea>
                                        </div>
                                        @error('truck_id')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field is-grouped">
                                    {{-- Here are the form buttons: save, reset and cancel --}}
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Save</button>
                                    </div>
                                    <div class="control">
                                        <button type="reset" class="button is-warning">Reset</button>
                                    </div>
                                    <div class="control">
                                        <a type="button" href="/customers" class="button is-light">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
