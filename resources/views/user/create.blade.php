@extends('layouts.backend')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Menambahkan Hak Akses</h5>
                        <a type="button" href="{{route('user.index')}}" class="btn rounded-pill btn-success float-end">Kembali</a>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.store') }}">
                        @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Nama</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="nama" aria-label="Username" aria-describedby="basic-addon11" @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Alamat Email</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="contoh@gmail.com" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Kata Sandi</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="basic-default-password12" placeholder="kata sandi" aria-describedby="basic-default-password2" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Konfirmasi Kata Sandi</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="basic-default-password12" placeholder="konfirmasi kata sandi" aria-describedby="basic-default-password2" @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Status</label>
                                <div class="input-group">
                                    <select class="form-select" name="is_admin" id="exampleFormControlSelect1" aria-label="Default select example">
                                        <option selected="">Status Pengguna</option>
                                        <option value="admin">Admin</option>
                                        <option value="atasan">Atasan</option>
                                        <option value="guru">Guru</option>
                                        <option value="siswa">Siswa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
