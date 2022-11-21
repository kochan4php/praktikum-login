@extends('layouts.app')

@section('container')
  @if (session()->has('success') || session()->has('error'))
    <div class="row justify-content-center mt-5 w-100">
      <div class="col-md-6">
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @elseif (session()->has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
      </div>
    </div>
  @endif

  <div class="row justify-content-center w-100 @if (session()->has('success') || session()->has('error') ? '' : 'mt-5')  @endif">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h2 class="text-center">Login</h2>
        </div>
        <div class="card-body">
          <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <div class="mb-3">
              <div>
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                  name="email" placeholder="Masukkan email anda" value="{{ old('email') }}">
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="mb-3">
              <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                  name="password" placeholder="Masukkan Password anda" value="{{ old('password') }}">
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="remember" name="remember" value="true">
              <label class="form-check-label" for="remember">Remember Me</label>
            </div>
            <button type="submit" class="btn btn-primary">
              Login
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
