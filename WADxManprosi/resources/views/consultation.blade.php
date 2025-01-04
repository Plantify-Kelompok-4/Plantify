@extends('layouts.app')

@section('content')
<head>
<style>
    .gradient-custom-2 {
        background: linear-gradient(to left, #76DD8D 0%, #A6DFA1 88%);
    }

    @media (min-width: 768px) {
        .gradient-form {
            height: 100vh !important;
        }
    }

    @media (min-width: 769px) {
        .gradient-custom-2 {
            border-top-right-radius: .3rem;
            border-bottom-right-radius: .3rem;
        }
    }

    .btn {
        min-width: 250px; 
        padding: 20px 30px; 
        font-size: 24px; 
    }
</style>
</head>
<div class="container py-2">
    <h1 class="text-center mb-5">Konsultasi</h1>
    
    <div class="text-center">
        <img src="{{ asset('assets/consul.png') }}" class="img-fluid d-block mx-auto" alt="Konsultasi" style="max-width: 100%; height: auto;">
        <a href="https://web.whatsapp.com/" class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-25" target="_blank">Mulai Konsultasi</a>
    </div>
</div>
@endsection