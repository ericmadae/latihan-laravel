@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('post.update', $post->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="body" >{{ $post->body }}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a class="btn btn-kembali" href="{{ route('post.index') }}">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection