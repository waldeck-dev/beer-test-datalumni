@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your profile</h1>
    <hr>
    <form action="{{ route('profileUpdate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Your name</label>
            <input type="text"
                name="name" id="name"
                value="{{ $user->name }}"
                placeholder="Your name"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Your email address</label>
            <input type="text"
                name="email" id="email"
                value="{{ $user->email }}"
                placeholder="Your email address"
                class="form-control">
        </div>
        <input type="submit" value="Update profile" class="btn btn-primary">
    </form>
</div>
@endsection
