@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/libs/leaflet/leaflet.css') }}">
    <style>
        #map {
            height: 500px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/libs/leaflet/leaflet.js') }}"></script>
    <script>
        var map = L.map('map').setView([{{ $event->latitude }}, {{ $event->longitude }}], 14);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([{{ $event->latitude }}, {{ $event->longitude }}]).addTo(map);
    </script>
@endpush

<x-layout title="Peta Event">
    <x-component.card>
        <div id="map"></div>
        <h2 class="mt-6 text-xl font-bold">Dekskripsi</h2>
        <p>
            {{ $event->deskripsi }}
        </p>
    </x-component.card>
</x-layout>
