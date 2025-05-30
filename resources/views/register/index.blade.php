@extends('layouts.appV2')

@section('content')
    <section class="d-flex justify-content-center align-items-center vh-100">
        <div class="rounded shadow card" style="max-width: 600; min-width: 500;">
            <form action="{{ route('registrasi.store') }}" method="POST">
                @csrf
                <div class="gap-3 px-3 card-body d-flex justify-content-center flex-column">
                    <h3 class="text-center h3">REGISTRASI</h3>
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="{{ route('login.index') }}" class="text-end">Saya sudah punya akun.</a>
                </div>
            </form>
        </div>
    </section>
@endsection
