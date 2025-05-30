@extends('layouts.apps')
@section('title', 'Home Page')
@section('content')
    <section class="bg-dark vh-100 d-flex justify-content-center align-items-center">
        <div class="shadow card rounded-3" style="min-width: 300; max-width: 400;">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <form action="{{ route('login.store') }}" method="post" class="gap-2 d-flex flex-column">
                    @csrf
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
                        <a href="{{ route('register.index') }}">Registrasi</a>
                        <button type="submit" class="btn btn-primary text-end">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
