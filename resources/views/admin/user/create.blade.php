@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                    <h3 class="col-sm-10">Data User</h3>
                    <a href="/admin/user" class="fa fa-arrow-left btn btn-secondry">&nbsp;Kembali</a>
                    </div>


                </div>
                <div class="card-body">

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Username</label>
                            <div class="input-group input-group-outline">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Email</label>
                            <div class="input-group input-group-outline">
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Password</label>
                            <div class="input-group input-group-outline">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Konfirmasi Password</label>
                            <div class="input-group input-group-outline">
                            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Role</label>
                            <div class="input-group input-group-outline">
                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                <option value=""></option>
                                <option value="Admin">Admin</option>
                                <option value="Author">Author</option>
                            </select>
                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <button type="reset" class="btn btn-danger text-white">Reset</button>
                            <button type="submit" class="btn btn-info text-white">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
