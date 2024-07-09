@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Data Guru</h5>
            <a type="button" href="{{route('guru.create')}}" class="btn rounded-pill btn-success float-end">Tambah</a>
        </div>
        {{-- @if($mapel->nama_pelajaran == 'Produktif RPL')
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mata Pelajaran</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($guru as $data)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td><strong>{{$data->nama}}</strong></td>
                            <td>{{$data->mapel->nama_pelajaran}}</td>
                            <td>
                                <img src="{{ asset('images/foto/'. $data->foto) }}" alt="Avatar" class="rounded-circle" style="width: 100px;">
                            </td>
                            <td>
                                <form action="{{route('guru.destroy', $data->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('guru.show', $data->id) }}"><i class="bx bx-show-alt me-1"></i>Lihat</a>
                                            <a class="dropdown-item" href="{{ route('guru.edit', $data->id) }}"><i class="bx bx-edit-alt me-1"></i>Edit</a>
                                            <button type="submit" class="dropdown-item" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bx bx-trash me-1"></i>Hapus</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif --}}
        <div class="card-body">
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Mata Pelajaran</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($guru as $data)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td><strong>{{$data->nama}}</strong></td>
                            <td>{{$data->mapel->nama_pelajaran}}</td>
                            <td>
                                <img src="{{ asset('images/foto/'. $data->foto) }}" alt="Avatar" class="rounded-circle" style="width: 55px; height: 60px;">
                            </td>
                            <td>
                                <form action="{{route('guru.destroy', $data->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('guru.show', $data->id) }}"><i class="bx bx-show-alt me-1"></i>Lihat</a>
                                            <a class="dropdown-item" href="{{ route('guru.edit', $data->id) }}"><i class="bx bx-edit-alt me-1"></i>Ubah</a>
                                            <a href="{{route('guru.destroy', $data->id)}}" type="submit" class="dropdown-item" data-confirm-delete="true"><i class="bx bx-trash me-1"></i>Hapus</a>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#example');
    </script>
@endpush
