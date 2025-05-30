@extends('layouts.apps')

@section('content')
    <div class="container">
        <div class="row">
            <div class="mb-3 col-12">
                <div class="d-flex align-items-center justify-content-center">
                    <div class="card">
                        <div class="card-header">
                            <h1>File Upload</h1>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('fileupload.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="file" class="form-label">File</label>
                                    <input type="file" class="form-control" id="file" name="image" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-primary">Upload</button>
                            </form>

                            @if ($errors->any())
                                @forelse ($errors as $e)
                                    <p class="text-danger">{{ $e->getMessage() }}</p>
                                @empty
                                    
                                @endforelse
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-12">
                <div class="row">
                    @foreach ($gallery as $file)
                        <div class="mb-3 col-md-4">
                            <div class="card" style="width: 18rem;">
                                <img src="{{ asset( 'storage/'.$file->images) }}" class="card-img-top" alt="{{ $file->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $file->title }}</h5>
                                    <form action="{{ route('fileupload.delete', $file->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
@endsection
