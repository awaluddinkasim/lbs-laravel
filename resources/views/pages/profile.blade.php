<x-layout title="Edit Profile">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <img src="{{ asset('assets/images/manage.svg') }}" alt="" class="hidden lg:block">
        <x-component.card>
            <form action="{{ route('profile.update') }}" method="post" autocomplete="off">
                @csrf
                @method('PATCH')
                <x-form.input label="Nama" id="namaInput" name="nama" :value="auth()->user()->nama" :required="true" />
                <x-form.input label="Email" type="email" id="emailInput" name="email" :value="auth()->user()->email"
                    :required="true" />
                <x-form.input label="Password" type="password" id="passwordInput" name="password"
                    helperText="Kosongkan jika tidak ingin mengganti password" />
                <x-component.button label="Simpan" type="submit" />
            </form>
        </x-component.card>
    </div>
</x-layout>
