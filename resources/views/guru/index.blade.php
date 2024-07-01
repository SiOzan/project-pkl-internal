@extends('layouts.backend')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Data Guru</h5>
            <a type="button" href="{{route('guru.create')}}" class="btn rounded-pill btn-success float-end">Tambah</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Mata Pelajaran</th>
                        <th>Mengajar Sejak</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($guru as $data)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$data->nama}}</strong></td>
                            <td><span class="badge bg-label-primary me-1">{{$data->nip}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$data->jenis_kelamin}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$data->tanggal_lahir}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$data->mapel->nama_pelajaran}}</span></td>
                            <td><span class="badge bg-label-primary me-1">{{$data->mengajar_sejak}}</span></td>
                            <td>
                                <img src="{{ asset('images/foto/'. $data->foto) }}" alt="Avatar" class="rounded-circle">
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i>
                                            Edit</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                            Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
