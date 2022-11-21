@extends('layouts.app')

@section('container')
  <div class="row">
    <div class="col">
      <h1 class="text-center">{{ Auth::user()->username }} sebagai blablabla</h1>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card table-responsive">
        <div class="card-header d-flex justify-content-between">
          <h1>Data Supplier</h1>
          <a href="{{ route('supplier.create') }}" class="btn btn-primary d-flex align-items-center">
            <span>Tambah Supplier</span>
          </a>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped border-dark">
            <thead class="table-dark">
              <tr>
                <th class="text-nowrap text-center" scope="col">No</th>
                <th class="text-nowrap text-center" scope="col">Nama Supplier</th>
                <th class="text-nowrap text-center" scope="col">No Telepon</th>
                <th class="text-nowrap text-center" scope="col">Alamat</th>
                <th class="text-nowrap text-center" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($supplier as $item)
                <tr>
                  <th class="text-nowrap text-center" scope="row">{{ $loop->iteration }}</th>
                  <td class="text-nowrap text-center">{{ $item->nama_supplier }}</td>
                  <td class="text-nowrap text-center">{{ $item->no_telp }}</td>
                  <td class="text-nowrap text-center">{{ $item->alamat }}</td>
                  <td class="text-nowrap text-center">
                    <div class="btn-group">
                      <a href="{{ route('supplier.edit', $item->id) }}" class="btn btn-sm btn-warning">Sunting</a>
                      <a href="{{ route('supplier.destroy', $item->id) }}" class="btn btn-sm btn-danger">Hapus</a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="px-3">
          {{ $supplier->links() }}
        </div>
      </div>
      <div class="my-3">
        <form action="{{ route('logout') }}" method="post">
          @csrf
          <button type="submit">Keluar ah</button>
        </form>
      </div>
    </div>
  </div>
@endsection
