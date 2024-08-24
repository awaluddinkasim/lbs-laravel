<x-layout title="Event {{ ucfirst(request()->route('status')) }}">
    <x-component.card>
        <x-component.datatable id="table">
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
                        <td class="text-center">
                            @if (request()->route('status') == 'aktif')
                                <x-component.button label="Edit"
                                    href="{{ route('event.edit', ['status' => $event->status, 'event' => $event->id]) }}" />
                                <form
                                    action="{{ route('event.destroy', ['status' => $event->status, 'event' => $event->id]) }}"
                                    class="inline" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <x-component.button-soft type="submit" label="Hapus" color="danger" />
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatable>
    </x-component.card>
</x-layout>
