<h1>List Guru</h1>
<br>
{{-- Tombol tambah guru --}}
<a href="{{ route('guru.create') }}">Tambah Guru</a>
<br>
<br>
<table border="1px solid" style="width: 240px;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Usia</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Dibuat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($list_guru as $guru)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $guru->nama }}</td>
            <td>{{ $guru->usia }}</td>
            <td>{{ $guru->jenis_kelamin }}</td>
            <td>{{ $guru->time_format('created_at') }}</td>
            <td>

                <a href="{{ route('guru.edit', ["guru" => $guru->id]) }}">Edit</a>

                <form action="{{ route('guru.destroy', ["guru" => $guru->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5">Data tidak Ada</td>
        </tr>
        @endforelse
    </tbody>
</table>

