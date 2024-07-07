<x-layout title="Tambah Event">
    <x-component.card>
        <form action="{{ route('event.store') }}" method="post" autocomplete="off">
            @csrf
            <x-form.input label="Nama Event" id="namaInput" name="nama" :required="true" />
            <x-form.input label="Lokasi" id="lokasiInput" name="lokasi" :required="true" />
            <x-form.textarea label="Deskripsi" id="deskripsiInput" name="deskripsi" :required="true"></x-form.textarea>
            <x-form.input label="Tanggal Event" type="date" id="tanggalInput" name="tanggal_event"
                :required="true" />
            <x-form.input label="Harga Tiket" id="hargaTiketInput" name="harga_tiket" :required="true" />
        </form>
    </x-component.card>
</x-layout>
