<style>
    td>span{
        color: red;
    }
</style>
<h1>{{ $edit ? "Edit" : "Tambah" }} Siswa</h1>
<button type="button" onclick="window.location.href='{{ url('siswa-controller') }}'">back</button>
<form action="{{ $edit ? url("edit-siswa/$siswa->id") : url('siswa') }}" method="POST">
    @csrf
    @if ($edit)
        @method('PUT')
    @endif
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><input type="text" name="nama" value="{{ $edit ? $siswa->nama : "" }}" required> @error('nama')
                <span>{{ $message }}</span>
            @enderror </td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>:</td>
            <td><input type="text" name="kelas" value="{{ $edit ? $siswa->kelas : "" }}">  @error('kelas')
                <span>{{ $message }}</span>
            @enderror </td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td><input type="text" name="umur" value="{{ $edit ? $siswa->umur : "" }}"> @error('umur')
                <span>{{ $message }}</span>
            @enderror  </td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td >
                <button type="submit">{{ $edit ? "Edit" : "Tambah" }}</button>
            </td>
        </tr>
    </table>
</form>