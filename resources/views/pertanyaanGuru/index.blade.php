@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Pertanyaan Guru Untuk Menilai Sesama Guru {{'(Sejawat)'}}</h5>
            <a type="button" href="{{route('pertanyaanGuru.create')}}" class="btn rounded-pill btn-success float-end">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Kompetensi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($pertanyaanGuru as $data)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td><strong>{{$data->pertanyaan}}</strong></td>
                            <td>{{$data->kompetensiGuru->kompetensi}}</td>
                            <td>
                                <form action="{{route('pertanyaanGuru.destroy', $data->id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('pertanyaanGuru.edit', $data->id) }}"><i class="bx bx-edit-alt me-1"></i>Ubah</a>
                                            <a href="{{route('pertanyaanGuru.destroy', $data->id)}}" type="submit" class="dropdown-item" data-confirm-delete="true"><i class="bx bx-trash me-1"></i>Hapus</a>
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
