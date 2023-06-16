@extends('common.layout')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12"> {{-- These divs are needed for proper layout --}}
                    <form method="POST" action="{{route('stops.update', $stop)}}">
                        @csrf
                        @method('PUT')
                        <div class="card"> {{-- The form is placed inside a Bulma Card component --}}
                            <header class="card-header">
                                <p class="card-header-title"> {{-- The Card header content --}}
                                    Edit a stop
                                </p>
                            </header>

                            <div class="card-content">
                                <div class="content">
                                    {{-- Here are all the form fields --}}
                                    <div class="field">
                                        <label class="label">Day</label>
                                        <div class="control">
                                            <input name="day" class="input @error('day') is-danger @enderror"
                                                   type="string" value="{{$stop->day}}">
                                        </div>
                                        @error('day')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Location</label>
                                        <div class="control">
                                            <input name="location" class="input @error('location') is-danger @enderror"
                                                   type="string" value="{{$stop->location}}">
                                        </div>
                                        @error('location')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Time</label>
                                        <div class="control">
                                            <input name="time" class="input @error('time') is-danger @enderror"
                                                   type="string" value="{{$stop->time}}">
                                        </div>
                                        @error('time')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Occasion</label>
                                        <div class="control">
                                            <input name="occasion" class="input @error('occasion') is-danger @enderror"
                                                   type="string" value="{{$stop->occasion}}">
                                        </div>
                                        @error('occasion')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Length</label>
                                        <div class="control">
                                            <input name="length" class="input @error('length') is-danger @enderror"
                                                   type="string" value="{{$stop->length}}">
                                        </div>
                                        @error('length')
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
                                        <a type="button" href="/stops" class="button is-light">Cancel</a>
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
