@push('scripts')
    <script>
        $('#posterInput').on('change', function() {
            let extension = $(this).val().split('.').pop().toLowerCase();
            if (extension != 'jpg' && extension != 'png' && extension != 'jpeg') {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'File harus berupa gambar',
                })
                $(this).val('');

                return false;
            }

            $('#posterPreview').html(
                `<img src="${URL.createObjectURL(event.target.files[0])}" class="object-contain w-full h-full" />`
            );
        })
    </script>
@endpush

<x-layout title="Tambah Event">
    <x-component.card>
        <form action="{{ route('event.update', $event->id) }}" method="post" autocomplete="off"
            class="grid gap-6 lg:grid-cols-2" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div>
                <x-form.input label="Nama Event" id="namaInput" name="nama" value="{{ $event->nama }}"
                    :required="true" />
                <x-form.textarea label="Deskripsi" id="deskripsiInput" name="deskripsi" rows="5"
                    :required="true">{{ $event->deskripsi }}</x-form.textarea>
                <x-form.input label="Harga Tiket" id="hargaTiketInput" name="harga_tiket"
                    value="{{ $event->harga_tiket }}" :isNumber="true" helperText="Kosongkan apabila gratis" />
                <x-form.input label="Trailer Event" id="trailerInput" name="trailer" value="{{ $event->trailer }}"
                    :required="true" />
                <x-form.input label="Poster" type="file" id="posterInput" name="poster" />
                <div class="flex items-center justify-center w-full mb-3 border-2 border-gray-300 border-dotted rounded-lg h-72 bg-slate"
                    id="posterPreview">
                    <img src="{{ asset('poster/' . $event->poster) }}" alt=""
                        class="object-contain w-full h-full">
                </div>
            </div>
            <div>
                <x-form.input label="Tanggal Event" type="date" id="tanggalInput" name="tanggal_mulai"
                    value="{{ $event->tanggal_mulai }}" :required="true" />
                <x-form.input label="Jumlah Hari" id="jumlahHariInput" name="jumlah_hari"
                    value="{{ $event->jumlah_hari }}" :required="true" :isNumber="true" />
                <x-form.input label="Contact Person" id="contactPersonInput" name="contact_person"
                    value="{{ $event->contact_person }}" :required="true" />
                <x-form.textarea label="Alamat Event" id="lokasiInput" name="lokasi"
                    :required="true">{{ $event->lokasi }}</x-form.textarea>
                <x-form.map label="Titik Lokasi" latitude="{{ $event->latitude }}"
                    longitude="{{ $event->longitude }}" />
                <div class="my-2">
                    <x-component.button label="Simpan" type="submit" :block="true" />
                </div>
            </div>
        </form>
    </x-component.card>
</x-layout>
