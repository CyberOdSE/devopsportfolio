@extends('common.layout')
@section('style')

@endsection

@section('title')

@endsection

@section('header')
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="container is-max-desktop">
        <div class="columns is-centered">
            <div class="column is-10">
                <div class="list has-hoverable-list-items mb-5 mt-4">
                    @foreach($trucks as $truck)
                        <div class="box">
                            <div class="list-item mb-4">
                                <div class="list-item-image">
                                    <figure class="image is-32x32">
                                        <img class="truck-image" src="/img/truckicon.png">
                                    </figure>
                                    <div class="progress-wrapper is-max-desktop" style="display: flex; flex-direction: column;">
                                        <div class="progress-labels" style="display: flex; justify-content: space-between;">
                                            <span style="color: red; margin-left: -10px;">Monday</span>
                                            <span style="color: red;">Tuesday</span>
                                            <span style="color: red; margin-right: -10px;">Wednesday</span>
                                        </div>
                                        <progress id="progress-bar-{{ $truck->id }}" class="progress is-success" value="{{ $truck->progress }}" max="100" style="width: 100%;"></progress>
                                        <p style="text-align: center; color: orange;">% of Purchases Online: {{ rand(10, 90) }}%</p>
                                        <div style="display: flex; justify-content: space-between; margin-top: auto;">
                                            <p style="margin-left: -10px;">Sold: ${{ rand(500, 2000) }}</p>
                                            <p style="margin-right: -10px;">Remaining Purchase Value: ${{ rand(500, 2000) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div style="display: flex; justify-content: space-between; margin-top: 5px;">
                                    <p>Total Revenue: ${{ rand(1000, 10000) }}({{ rand(1, 100)}}%)</p>
                                    <p>Total Purchase Value: ${{ rand(500, 2000) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-6">
                        {{ $trucks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        const progressBars = document.querySelectorAll('progress');


        progressBars.forEach((progressBar) => {

            const truckImage = progressBar.closest('.list-item').querySelector('.truck-image');

            progressBar.addEventListener('input', (event) => {
                const value = event.target.value;
                const max = event.target.max;
                const width = event.target.offsetWidth;
                const position = (value / max) * (width - 64);
                truckImage.style.transform = `translateX(${position}px)`;
            });

            const value = progressBar.value;
            const max = progressBar.max;
            const width = progressBar.offsetWidth;
            const position = (value / max) * (width - 64);
            truckImage.style.transform = `translateX(${position}px)`;
        });
    </script>
@endsection

@section('footer')

@endsection
