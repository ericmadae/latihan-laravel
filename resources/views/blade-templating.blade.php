menampilkan data :
{{ $data }}
<br>
menampilkan data pakai tanda !! :
{!! $data !!}
<br>
menampilkan id :
{{ $id }}
<br>
menampilkan id pakai tanda !! :
{!! $id !!}

menampilkan id pakai tanda @ :
@{{ $id }}
@{!! $id !!}

<br>
<br>
tentukan apakah {{ $id }} adalah bilangan genap?
@if ($id % 2 == 0)
    {{ 'Bilangan Genap' }}
@else
    {{ 'Bilangan Ganjil' }}
@endif

<br>
<br>
@@if ($id%2 == 0)
@{{ "Bilangan Genap" }}
@@else
@{{ "Bilangan Ganjil" }}
@@endif

@php
    $array = [
        'nama' => 'andi',
        'kelas' => '10',
    ];
@endphp
<br>
<br>
rendering json (array to json)

{{ Js::from($array) }}

@php
    $list_guru = App\Models\Guru::all();
    $no = 1;
    $array = ['A', 'B', 'C'];
    $b = ['O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];

    echo '<br>';
    echo '<br>';
    foreach ($b as $index => $value) {
        echo $index;
        echo '<br>';
    }

    $dept_parent = [
        [
            'nama' => 'andi',
            'hobi' => ['makan', 'tidur', 'minum'],
        ],
        [
            'nama' => 'budi',
            'hobi' => ['makan', 'game', 'minum'],
        ],
        [
            'nama' => 'andi',
            'hobi' => ['makan', 'nonton tv', 'minum'],
        ],
    ];

    $data_hobi = [
        [
            'nama' => 'andi',
            'hobi' => ['makan' => ['nugget', 'ayam', 'roti'], 'tidur', 'minum' => 'jus'],
        ],
        [
            'nama' => 'budi',
            'hobi' => ['makan' => ['mie ayam', 'rendang', 'pisang goreng'], 'game', 'minum' => 'coffee'],
        ],
        [
            'nama' => 'andi',
            'hobi' => ['makan' => ['mie ayam', 'rendang', 'pisang goreng'], 'nonton tv', 'minum' => 'tea'],
        ],
    ];

    // output :
    // Nama: andi Hobi:
    // 1.1- makan
    // 1.1.1- nugget
    // 1.1.2- ayam
    // 1.1.3- roti
    // 1.2- tidur
    // 1.3- minum
    // Nama: budi Hobi:
    // 2.1- makan
    // 2.1.1- mie ayam
    // 2.1.2- rendang
    // 2.1.3- pisang goreng
    // 2.2- game
    // 2.3- minum
    // Nama: andi Hobi:
    // 3.1- makan
    // 3.1.1- mie ayam
    // 3.1.2- rendang
    // 3.1.3- pisang goreng
    // 3.2- nonton tv
    // 3.3- minum

@endphp
iteration :

<ul>
    @foreach ($list_guru as $guru)
        <li>{{ $no++ }} - {{ $guru->nama }}</li>
    @endforeach
</ul>

index :
<ul>
    @foreach ($list_guru as $guru)
        <li>{{ $loop->index }} - {{ $guru->nama }}</li>
    @endforeach
</ul>

remaining :
<ul>
    @foreach ($list_guru as $guru)
        <li>{{ $loop->remaining }} - {{ $guru->nama }}</li>
    @endforeach
</ul>

count:
<ul>
    @foreach ($list_guru as $guru)
        <li>{{ $loop->count }} - {{ $guru->nama }}</li>
    @endforeach
</ul>

first:
<ul>
    @foreach ($list_guru as $guru)
        <li @if ($loop->first) style="background-color: red;" @endif>{{ $loop->first }} -
            {{ $guru->nama }}</li>
    @endforeach
</ul>

last:
<ul>
    @foreach ($list_guru as $guru)
        <li>{{ $loop->last }} - {{ $guru->nama }}</li>
    @endforeach
</ul>

even:
<ul>
    @foreach ($list_guru as $guru)
        <li @if ($loop->even) style="background-color: red;" @endif>{{ $loop->even }} -
            {{ $guru->nama }}</li>
    @endforeach
</ul>

odd:
<ul>
    @foreach ($list_guru as $guru)
        <li>{{ $loop->odd }} - {{ $guru->nama }}</li>
    @endforeach
</ul>


dept:
<ul>
    @foreach ($list_guru as $guru)
        <li>{{ $loop->depth }} - {{ $guru->nama }}</li>
    @endforeach
</ul>

parent:
<ul>
    @foreach ($dept_parent as $parent)
        <li>
            Nama: {{ $parent['nama'] }}
            Hobi:
            @foreach ($parent['hobi'] as $hobi)
                <br>
                {{ $loop->parent->iteration }}.{{ $loop->iteration }}- {{ $hobi }}
            @endforeach
        </li>
    @endforeach
</ul>

<b>
    Nama: Abdullah
</b>
<ul>
    @foreach ($data_hobi as $data)
        <li>
            <p>Nama: {{ $data['nama'] }}</p>
            @foreach ($data['hobi'] as $hobi => $s_hobi)
                <p>{{ $loop->parent->iteration }}.{{ $loop->iteration }}- {{ $hobi != 'makan' ? $s_hobi : $hobi }}
                </p>
                @if ($hobi == 'makan')
                    @foreach ($s_hobi as $ss_hobi)
                        <p>{{ $loop->parent->parent->iteration }}.{{ $loop->parent->iteration }}.{{ $loop->iteration }}-
                            {{ $ss_hobi }}</p>
                    @endforeach
                @endif
            @endforeach
        </li>
    @endforeach
</ul>
<br>
<br>
<b> Nama: Fairuz </b>
<ul>
    @foreach ($data_hobi as $data)
        <p>Nama: {{ $data['nama'] }}</p>
        @foreach ($data['hobi'] as $key => $hobi)
            @if (is_array($hobi))
                <p>{{ $loop->parent->iteration }}.{{ $loop->iteration }}.{{ $key }}</p>
                @foreach ($hobi as $sub_hobi)
                    <p>{{ $loop->parent->parent->iteration }}.{{ $loop->parent->iteration }}.{{ $loop->iteration }}.{{ $sub_hobi }}
                    </p>
                @endforeach
            @else
                <p>{{ $loop->parent->iteration }}.{{ $loop->iteration }}.{{ $hobi }}</p>
            @endif
        @endforeach
    @endforeach
</ul>
</b>

<b></b>
<ul>
    @foreach ($data_hobi as $data)
        <li>Nama: {{ $data['nama'] }}</li>
        @foreach ($data['hobi'] as $key1 => $value1)
            @if (gettype($key1) == 'string')
                @if (is_array($value1))
                    @foreach ($value1 as $key2 => $value2)
                        <li>{{ $value2 }}</li>
                    @endforeach
                @else
                    <li>{{ $key1 }} : {{ $value1 }}</li>
                @endif
            @else
                {{ $value1 }}
            @endif
        @endforeach
    @endforeach
</ul>

<b>data hobi</b>
@@foreach ($data['hobi'] as $key => $hobi)
@@if (gettype($hobi) == 'array')
@@foreach ($hobi as $sub_hobi => $makan)
<li>@{{ $makan }}</li>
@@endforeach
@@else
<li>@{{ $hobi }}</li>
@@endif
@@endforeach
<br>
<b>data makan</b>
@@foreach ($hobi as $sub_hobi => $makan)
<li>@{{ $makan }}</li>
@@endforeach
