@extends('admin.templates.default')
@section('content')
@include('admin.templates.partials.alert')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header d-flex justify-content-between">
                <h6 class="text-dark font-weight-bold">Data Banner</h6>
                <a href="{{ route('admin.banner.create') }}" class="btn btn-sm btn-primary">Tambah Data</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="data">
                        <thead>
                            <tr>
                                <th width="20" class="text-center">No. </th>
                                <th>Background</th>
                                <th>Gambar</th>
                                <th>Judul</th>
                                <th>Sub Judul</th>
                                <th>Deskripsi Singkat</th>
                                <th>Status</th>
                                <th style="min-width: 70px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ $item->background() }}" alt="" class="img-fluid" style="max-width: 80px;max-height:80px">
                                    </td>
                                    <td>
                                        <img src="{{ $item->gambar() }}" alt="" class="img-fluid" style="max-width: 80px;max-height:80px">
                                    </td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->sub_judul }}</td>
                                    <td>{{ $item->deskripsi_singkat }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                          <span class="badge badge-success">Aktif</span>
                                        @else
                                        <span class="badge badge-danger">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.banner.edit',$item->id) }}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.banner.destroy',$item->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('afterStyles')
<link href="{{ asset('assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@push('afterScripts')
<script src="{{ asset('assets/sbadmin2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
$(function(){
    var oTable = $('#data').DataTable();
})
</script>
@endpush
