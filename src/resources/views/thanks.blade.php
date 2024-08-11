@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="wrapper">
    <div class="container">
        <h1>お問い合わせありがとうございました</h1>
        <p>Thank you</p>
        <a href="/" class="home-button">HOME</a>
    </div>
</div>
@endsection