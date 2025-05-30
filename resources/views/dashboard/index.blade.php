@extends('layouts.apps')
@section('title', 'Dashboard')
@section('content')


<div>
   Hello {{ auth()->user()->name }}
   <br>
   <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
   {{-- @if (!auth()->user()->email_verified_at) --}}
      <a href="{{ route('verification.send') }}" class="btn btn-primary btn-sm">Send Email Verification</a>
   {{-- @endif --}}
</div>
@if (session('message'))
   <span class="mt-4">{{ session('message') }}</span>
@endif
@endsection
