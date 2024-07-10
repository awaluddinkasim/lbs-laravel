<x-layout title="Tambah Event">
    <x-component.card>
        <form action="{{ route('event.store') }}" method="post" autocomplete="off" class="grid gap-6 lg:grid-cols-2">
            @csrf
            <div>
                <x-form.input label="Nama Event" id="namaInput" name="nama" :required="true" />
                <x-form.input label="Lokasi" id="lokasiInput" name="lokasi" :required="true" />
                <x-form.textarea label="Deskripsi" id="deskripsiInput" name="deskripsi"
                    :required="true"></x-form.textarea>
                <x-form.input label="Tanggal Event" type="date" id="tanggalInput" name="tanggal_mulai"
                    :required="true" />
                <x-form.input label="Jumlah Hari" id="jumlahHariInput" name="jumlah_hari" :required="true"
                    :isNumber="true" />
                <x-form.input label="Trailer Event" id="trailerInput" name="trailer" :required="true" />
                <x-form.input label="Harga Tiket" id="hargaTiketInput" name="harga_tiket" :isNumber="true"
                    helperText="Kosongkan apabila gratis" />
            </div>
            <div>
                <x-form.input label="Poster" type="file" id="posterInput" name="poster" :required="true" />
                <x-form.map label="Pilih Lokasi" />
                <div class="my-2">
                    <x-component.button label="Simpan" type="submit" :block="true" />
                </div>
            </div>
        </form>
    </x-component.card>
</x-layout>
