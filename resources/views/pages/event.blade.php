@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
@endpush

@push('scripts')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable', {
            sort: false,
            paging: false
        });
    </script>
@endpush

<x-layout title="Event">
    <x-component.card>
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Event</th>
                    <th>Lokasi</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Harga Tiket</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $event->nama }}</td>
                        <td>{{ $event->lokasi }}</td>
                        <td>{{ Carbon\Carbon::parse($event->tanggal_mulai)->isoFormat('DD MMMM YYYY') }}</td>
                        <td>{{ Carbon\Carbon::parse($event->tanggal_selesai)->isoFormat('DD MMMM YYYY') }}</td>
                        <td>{{ $event->harga_tiket ? 'Rp. ' . number_format($event->harga_tiket) : 'Gratis' }}</td>
                        <td>
                            <x-component.button label="Edit" href="" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-component.card>
</x-layout>
