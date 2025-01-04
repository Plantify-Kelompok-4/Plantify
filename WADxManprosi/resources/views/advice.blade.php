@extends('layouts.app')


@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Tanaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            padding-top: 0;
            padding-bottom: 0;
            margin: 0;
        }
        
        .container-fluid {
            padding-top: 0;
            padding-bottom: 0;
        }

        /* Menyesuaikan tinggi navbar dengan logo */
        .navbar-brand {
            padding: 0;
        }
        a.button {
        display: inline-block;
        background-color: #28a745; /* Warna latar belakang */
        color: white; /* Warna teks */
        padding: 10px 20px; /* Jarak dalam */
        border-radius: 5px; /* Membuat sudut melengkung */
        text-decoration: none; /* Menghilangkan garis bawah */
        transition: background-color 0.3s; /* Animasi transisi */
        font-size: 16px; /* Ukuran font */
        font-weight: bold; /* Ketebalan font */
    }

    a.button:hover {
        background-color: #218838; /* Warna latar belakang saat hover */
    }
    </style>
</head>
<body>
    <h1>Rekomendasi untuk Tanaman Anda</h1>
    <p>{!! $advice !!}</p>
    <a href="/monitoring" class="button">Kembali ke Formulir</a>
</body>
</html>
@endsection