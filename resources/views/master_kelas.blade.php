<button type="button" onclick="return window.location.href='{{ route('kelas.create') }}'">
    Tambah
</button>
<br>
<table style="width: 250px;" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($list_kelas as $kelas)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kelas->nama }}</td>
            <td>
                <button type="button" onclick="window.location.href='{{ route('kelas.edit', $kelas->id) }}'">Edit</button>
                <form action="{{ route('kelas.destroy', $kelas->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="if(confirm()) { return this.parentElement.submit()}">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" style="text-align: center">empty</td>
        </tr>
        @endforelse
    </tbody>
</table>