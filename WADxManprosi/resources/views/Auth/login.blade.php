<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Plantify</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Righteous&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
       body { /* Mengubah warna latar belakang body secara langsung */
            background-color: #76DD8D; 
        }
        .gradient-custom-2 {
        /* fallback for old browsers */
        background: #76DD8D;
        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
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
        
    </style>
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #76DD8D;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h1 class="mb-1 text-center">Plantify</h1>
                <h1 class="mb-4 text-center">WELCOME BACK!</h1>
                <p class="small mb-0">To keep connected with us please 
                login with your personal info</p>
                <a class="mb-4 text-center mt-5" style="" href="http://127.0.0.1:8000/admin/login">Admin</a>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <h4 class="mt-1 pb-1 " style="color:#76DD8D; font-weight: bold;" >CREATE ACCOUNT</h4>
                  <h4 class="mt-1 mb-5 pb-1" style="color:#B3B2B2A1;">or</h4>
                </div>

                <form method="POST" action="{{ route('login') }}">
                @csrf 
                  <div data-mdb-input-init class="form-outline mb-4">
                    <label class="form-label" for="email" style="color:#B3B2B2A1">Email</label>
                    <input type="email" id="email" class="form-control" name="email"
                      placeholder="email address" required />
                  </div>

                  <div data-mdb-input-init class="form-outline mb-4">  
                    <label class="form-label" for="password" style="color:#B3B2B2A1">Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 w-100" type="submit">Log
                      in</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class="mb-0 me-2" style="color:#B3B2B2A1;">Don't have an account?</p>
                    <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger" onclick="window.location='{{ route('register') }}'">Create new</button>
                  </div>

                </form>

                @if ($errors->any())
                <div>
                    <strong>{{ $errors->first() }}</strong>
                </div>
                @endif

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>