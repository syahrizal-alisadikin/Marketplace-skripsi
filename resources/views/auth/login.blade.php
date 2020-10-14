@extends('layouts.guest')
@section('content')
    <div class="page-content page-auth">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center row-login">
            <div class="col-lg-6 text-center">
              <img
                src="/images/login-placeholder.png"
                alt=""
                class="w-50 mb-4 mb-lg-none"
              />
            </div>
            <div class="col-lg-5">
              <h2>
                Belanja kebutuhan utama, <br />
                menjadi lebih mudah
              </h2>
              <form method="POST" action="{{route('login')}}" class="mt-3">
                @csrf
                <div class="form-group">
                  <label>Email address</label>
                  <input
                    type="email"
                    name="email"
                    class="form-control w-75 @error('email') is-invalid @enderror"
                    placeholder="Masukkan Alamat Email"
                    aria-describedby="emailHelp"
                    value="{{ old('email') }}" 
                  />
                   @error('email')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>    
                    @enderror
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control w-75 @error('password') is-invalid @enderror"  placeholder="Masukkan Password"  />
                   @error('password')
                        <div class="invalid-feedback " role="alert">
                            {{ $message }}
                        </div>    
                    @enderror
                </div>
                <button
                  class="btn btn-success btn-block w-75 mt-4"
                  type="submit"
                >
                  Sign In to My Account
                </button>
                <a class="btn btn-signup w-75 mt-2" href="/register.html">
                  Sign Up
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection