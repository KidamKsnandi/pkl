@extends('layouts.admin')

@section('content')
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{ asset('assets/img/theme/taman.jpg')}}); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Halo {{ $user->name }}</h1>
            <p class="text-white mt-0 mb-5">Ini adalah halaman profile anda. Kamu dapat melihat dan mengedit akun anda dengan begitu akun mu akan berubah sesuai dengan yang di ganti oleh mu</p>
            <a href="{{ route('user.edit', $user->id) }}"  class="btn btn-neutral">Edit profile</a>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Your profile</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control" placeholder="Username" value="{{ $user->name }}" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email address</label>
                        <input type="email" id="input-email" class="form-control" placeholder="Email" value="{{ $user->email }}" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
@endsection
