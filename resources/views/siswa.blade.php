<div class="mb-3">
    <button type="button" onclick="window.location.href='{{ url('add-siswa') }}'">Tambah</button>
</div>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($list_siswa_aktif as $siswa)
            <tr>
                <td>{{ $siswa['id'] }}</td>
                <td>{{ $siswa['name'] }}</td>
                <td>{{ $siswa['kelas'] }}</td>
                <td>
                    <a href="{{ route('siswa.detail', $siswa['id']) }}">
                        Detail</a>
                    &nbsp;
                    <a href="{{ route('siswa.info', $siswa['id']) }}">
                        Info</a>
                    &nbsp;
                    <a href="{{ route('edit.siswa', $siswa['id']) }}">Edit</a>
                    <form action="{{ route('delete.siswa', ['id' => $siswa['id']]) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger" type="button" onclick="confirm()" >Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
