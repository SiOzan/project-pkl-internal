@extends('layouts.backend')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
@endsection

@section('content')
    {{-- @if ()

    @endif --}}

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5>Hak Akses Pengguna</h5>
            <a type="button" href="{{ route('user.create') }}" class="btn rounded-pill btn-success float-end">Tambah</a>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($user as $data)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i><strong>{{ $data->name }}</strong></td>
                            <td>{{ $data->email }}</td>
                            <td>
                                @if ($data->is_admin == 'admin')
                                <span class="badge bg-label-warning me-1">{{ $data->is_admin}}</span>
                                @elseif ($data->is_admin == 'atasan')
                                <span class="badge bg-label-success me-1">{{ $data->is_admin}}</span>
                                @elseif ($data->is_admin == 'guru')
                                <span class="badge bg-label-info me-1">{{ $data->is_admin}}</span>
                                @elseif ($data->is_admin == 'siswa')
                                <span class="badge bg-label-primary me-1">{{ $data->is_admin}}</span>
                                @endif
                            </td>
                            <td>
                                <form action="{{ route('user.destroy', $data->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('user.edit', $data->id) }}"><i class="bx bx-edit-alt me-1"></i>Ubah</a>
                                            <a href="{{ route('user.destroy', $data->id) }}" type="submit" class="dropdown-item" data-confirm-delete="true"><i class="bx bx-trash me-1"></i>Hapus</a>
                                        </div>
                                    </div>
                                </form>
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
