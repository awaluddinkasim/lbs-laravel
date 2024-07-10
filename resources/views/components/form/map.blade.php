@props(['label', 'latitude' => -5.135185, 'longitude' => 119.422717])

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/libs/leaflet/leaflet.css') }}">
    <style>
        #map {
            height: 300px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/libs/leaflet/leaflet.js') }}"></script>
    <script>
        var map = L.map('map').setView([{{ $latitude }}, {{ $longitude }}], 13);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var marker = L.marker([{{ $latitude }}, {{ $longitude }}]).addTo(map);

        function onMapClick(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(e.latlng).addTo(map);
            document.getElementById("latitudeInput").value = e.latlng.lat.toFixed(6);
            document.getElementById("longitudeInput").value = e.latlng.lng.toFixed(6);
        }

        map.on('click', onMapClick);

        document.getElementById("latitudeInput").value = marker.getLatLng().lat.toFixed(6);
        document.getElementById("longitudeInput").value = marker.getLatLng().lng.toFixed(6);
    </script>
@endpush


<div>
    <div class="mb-3">
        <label class="inline-block mb-2 text-sm font-medium text-gray-800">{{ $label }}</label>
        <div id="map"></div>
    </div>
    <div class="flex flex-row space-x-4">
        <div class="basis-1/2">
            <x-form.input label="Latitude" id="latitudeInput" name="latitude" :readonly="true" :required="true" />
        </div>
        <div class="basis-1/2">
            <x-form.input label="Longitude" id="longitudeInput" name="longitude" :readonly="true" :required="true" />
        </div>
    </div>
</div>
