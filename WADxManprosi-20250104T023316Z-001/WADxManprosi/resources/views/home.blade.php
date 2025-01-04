@extends('layouts.app')
@section('content')
<html>
 <head>
  <title>
   Plantify
  </title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <style>
   body {
            background-color: rgba(76, 175, 80, 0.8);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow: auto;
        }
        .container {
            text-align: center;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
        }
        .hero {
            position: relative;
            width: 100vw;
            height: 100vh;
            overflow: hidden;
            margin-top: -50px;
        }
        .hero img {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -47%);
        }
        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #4CAF50;
            font-size: 64px;
            font-weight: bold;
            z-index: 1;
        }
        .content {
            padding: 20px;
            width: 100%;
        }
        .content p {
            margin: 0;
            font-size: 18px;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            padding: 20px 0;
            color: white;
        }
        .stat-item {
            text-align: center;
            margin: 0 20px;
        }
        .stat-item p {
            margin: 5px 0;
        }
        @media (max-width: 768px) {
            .hero-text {
                font-size: 18px;
            }
            .content p {
                font-size: 16px;
            }
            .stats {
                flex-direction: column;
            }
            .stat-item {
                margin-bottom: 10px;
            }
        }
        .hero-text-background {
            position: absolute;
            width: 100vw;
            height: 97vh;
            top: 0;
            left: 0;
            transform: translate(0%, 7%);
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            z-index: 0;
        }
  </style>
 </head>
 <body>
  <div class="container">
   <div class="hero">
    <img alt="Deskripsi gambar" src="{{ asset('assets/Hero Image.png') }}" />
   </div>
   <div class="hero-text-box">
    <div class="hero-text-background"></div>
   </div>
   <div class="hero-text">
     Plantify hadir untuk memenuhi kebutuhan petani Indonesia
   </div>
   <div class="content">
    <p>
     Plantify siap meningkatkan operasional dan mempelopori transformasi di sektor pertanian Indonesia.
    </p>
   </div>
   <div class="stats">
    <div class="stat-item">
     <p>
      24.000+
     </p>
     <p>
      Petani dalam Ekosistem
     </p>
    </div>
    <div class="stat-item">
     <p>
      600+
     </p>
     <p>
      Kios Bermitra
     </p>
    </div>
    <div class="stat-item">
     <p>
      70+
     </p>
     <p>
      Unit Penggilingan Padi Dikelola
     </p>
    </div>
   </div>
  </div>
 </body>
</html>


@endsection