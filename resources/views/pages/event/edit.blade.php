<x-layout title="Tambah Event">
    <x-component.card>
        <form action="{{ route('event.update', $event->id) }}" method="post" autocomplete="off"
            class="grid gap-6 lg:grid-cols-2">
            @method('PATCH')
            @csrf
            <div>
                <x-form.input label="Nama Event" id="namaInput" name="nama" value="{{ $event->nama }}"
                    :required="true" />
                <x-form.input label="Lokasi" id="lokasiInput" name="lokasi" value="{{ $event->lokasi }}"
                    :required="true" />
                <x-form.textarea label="Deskripsi" id="deskripsiInput" name="deskripsi"
                    :required="true">{{ $event->deskripsi }}</x-form.textarea>
                <x-form.input label="Tanggal Event" type="date" id="tanggalInput" name="tanggal_mulai"
                    value="{{ $event->tanggal_mulai }}" :required="true" />
                <x-form.input label="Jumlah Hari" id="jumlahHariInput" name="jumlah_hari"
                    value="{{ $event->jumlah_hari }}" :required="true" :isNumber="true" />
                <x-form.input label="Trailer Event" id="trailerInput" name="trailer" value="{{ $event->trailer }}"
                    :required="true" />
                <x-form.input label="Harga Tiket" id="hargaTiketInput" name="harga_tiket"
                    value="{{ $event->harga_tiket }}" :isNumber="true" helperText="Kosongkan apabila gratis" />
            </div>
            <div>
                <x-form.map label="Pilih Lokasi" latitude="{{ $event->latitude }}"
                    longitude="{{ $event->longitude }}" />
                <div class="my-2">
                    <x-component.button label="Simpan" type="submit" :block="true" />
                </div>
            </div>
        </form>
    </x-component.card>
</x-layout>
