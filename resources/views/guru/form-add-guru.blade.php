<h3>Form Tambah Guru</h3>
<br>
<form action="{{ route('guru.store') }}" method="POST">

    <label for="">Nama</label>
    <input type="text" name="nama" value="{{ old('nama') }}" id="nama">
    <label for="">Usia</label>
    <input type="text" name="usia" id="usia" value="{{ old('usia') }}">
    <label for="">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" >
        <option value="">Pilih Jenis Kelamin</option>
        <option value="L" @if(old('jenis_kelamin') == 'L') selected @endif>Laki-laki</option>
        <option value="P" {{ old('jenis_kelamin') == "P" ? "selected" : null }}>Perempuan</option>
    </select>
    <div class="">
        <br>
        <button type="submit">Simpan</button>
    </div>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
