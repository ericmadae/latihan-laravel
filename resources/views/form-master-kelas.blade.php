<h5>{{ $edit ? "Edit Kelas" : "Tambah Kelas" }}</h5>
<form action="{{ $edit ? route('kelas.edit', $kelas->id) : route('kelas.store') }}" method="post">
@csrf
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="{{ $edit ? $kelas->nama : "" }}"></td>
        </tr>
        <tr>
            <td colspan="3">
                <button type="submit">{{ $edit ? "Update" : "Tambah" }}</button>
            </td>
        </tr>
    </table>
</form>