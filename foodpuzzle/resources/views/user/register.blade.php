@extends('layouts.main')

@section('title', "Register")

@section('content')
    <div class="row">
        <div class="col-12 pt-2" id="hcont">
            <div class="row justify-content-center">
                <h1>Sign Up</h1>
            </div>
            <div class="row justify-content-center">
            <small>Let's become friends</small>
            </div>
        </div>
        @include('user.register-form')
    </div>
@endsection