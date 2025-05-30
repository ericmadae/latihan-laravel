@extends('layouts.apps')
@section('title', 'Home Page')
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="width: 18rem;">
                <div class="text-center card-header">
                    LOGIN
                </div>
                <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                        <div class="row">
                            <div class="col-md-12">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
