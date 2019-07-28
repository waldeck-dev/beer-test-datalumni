@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your profile</h1>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h3>Personal information</h3>
            <form action="{{ route('profileUpdate') }}" method="POST">
                @csrf
                @include('inc.messages')
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
                    <input type="email"
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
        <div class="col-md-6">
            <h3>Beers your commented</h3>
            @if( count($comments) > 0 )
                <div class="list-group ">
                    @foreach( $comments as $comment )
                        <a href="{{ route('detail', ['id' => $comment->beer_id]) }}#comments" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $comment->beer_name }}</h5>
                            <small>{{ $comment->created_at->format('d-m-Y') }}</small>
                            </div>
                            <p class="mb-1"><em>{{ $comment->commentPreview($comment->id) }}</em></p>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="card bg-light mb-3">
                    <div class="card-body">
                        <h5 class="card-title">No comments</h5>
                        <p class="card-text">You never commented on any beer</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
