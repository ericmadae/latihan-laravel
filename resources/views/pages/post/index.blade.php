@extends('layouts.apps')

@section('content')
    <div class="container">
        <div class="col-12">
            <a class="mb-3 btn btn-primary" href="{{ route('post.create') }}">Tambah</a>
            <div class="table-responsive">
                <table class="table table-bordered table-primary">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($list_post as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->body }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('post.edit', $post->id) }}">Edit</a>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="3">Tidak ada data</td>
                        </tr>
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection