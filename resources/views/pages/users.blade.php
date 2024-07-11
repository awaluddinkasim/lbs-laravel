<x-layout title="Daftar Pengguna">
    <x-component.card>
        <x-component.datatable id="usersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>No. HP</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->jenis_kelamin }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ Carbon\Carbon::parse($user->tanggal_lahir)->isoFormat('DD MMMM YYYY') }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <x-component.button-soft type="submit" label="Hapus" color="danger" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </x-component.datatable>
    </x-component.card>
</x-layout>
