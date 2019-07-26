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
        <div class="form-group">
            <label for="beer-type">Your favourite Beer type</label>
            <select
                name="beer-type" id="beer-type"
                class="custom-select">
                <option selected disabled>Choose your favourite beer type</option>
                @foreach($types as $type)
                    <option
                        value="{{ $type->id }}"
                        {{ $type->id == $user->favourite_type ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="beer-style">Your favourite Beer style</label>
            <select
                name="beer-style" id="beer-style"
                class="custom-select">
                <option disabled>Choose your favourite beer style</option>
                @foreach($styles as $style)
                    <option
                        value="{{ $style->id }}"
                        {{ $style->id == $user->favourite_style ? 'selected' : '' }}>
                        {{ $style->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Update profile" class="btn btn-primary">
    </form>
</div>
@endsection
