@extends('layouts.app')

@section('container')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Tambah data supplier</h1>
        </div>
        <div class="card-body">
          <form action="{{ route('supplier.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="nama_supplier" class="form-label">Nama Supplier</label>
              <input type="text" class="form-control" id="nama_supplier" name="nama_supplier">
            </div>
            <div class="mb-3">
              <label for="no_telp" class="form-label">No. Telepon</label>
              <input type="number" class="form-control" id="no_telp" name="no_telp">
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <textarea type="number" class="form-control" id="alamat" name="alamat"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
