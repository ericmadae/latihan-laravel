<h3>Form Edit Guru</h3>
<br>
<form action="{{ route('guru.update', ["guru" => $guru->id]) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="">Nama</label>
    <input type="text" name="nama" value="{{ $guru->nama }}" id="nama">
    <label for="">Usia</label>
    <input type="text" name="usia" id="usia" value="{{ $guru->usia }}">
    <label for="">Jenis Kelamin</label>
    <select name="jenis_kelamin" id="jenis_kelamin" >
        <option value="">Pilih Jenis Kelamin</option>
        <option value="L" @if($guru->jenis_kelamin == 'L') selected @endif>Laki-laki</option>
        <option value="P" {{ $guru->jenis_kelamin == "P" ? "selected" : null }}>Perempuan</option>
    </select>
    <div class="">
        <br>
        <button type="submit">Update</button>
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
