@extends('layouts.app-public')

@section('content')
<style>
    .profile-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        text-align: center;
    }

    .profile-pic {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #f0f0f0;
        margin-bottom: 15px;
    }

    .btn {
        margin-top: 10px;
    }
</style>

<div class="profile-container">
    <h1>My Profile</h1>

    {{-- Foto Profil --}}
    <img src="{{ $user['profile_photo'] ?? asset('assets/images/default-profile.png') }}"
         class="profile-pic"
         alt="Profile Picture">

    {{-- Nama & Email --}}
    <h4>{{ $user['name'] }}</h4>
    <p class="text-muted">{{ $user['email'] }}</p>

    {{-- Tombol Edit --}}
    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">Edit Profile</a>
</div>
@endsection
