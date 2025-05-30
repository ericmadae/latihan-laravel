@extends('layouts.apps')
@section('title', 'Home Page')
@section('content')
    <div class="container d-flex justify-content-center align-items-center" >
        <div class="mt-5 card">
            <div class="text-center card-header">
                REGISTER
            </div>
            <div class="card-body">
                <form action="{{ route('register.store') }}" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('login.index') }}">Login</a>
                                <button type="submit" class="btn btn-success text-end">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
