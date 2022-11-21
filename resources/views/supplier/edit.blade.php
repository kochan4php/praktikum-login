@extends('layouts.app')

@section('container')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h1>Edit data supplier</h1>
        </div>
        <div class="card-body">
          <form action="{{ route('supplier.update', 1) }}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3">
              <label for="nama_supplier" class="form-label">Nama Supplier</label>
              <input type="email" class="form-control" id="nama_supplier" name="nama_supplier">
            </div>
            <div class="mb-3">
              <label for="no_telp" class="form-label">No. Telepon</label>
              <input type="number" class="form-control" id="no_telp" name="no_telp">
            </div>
            <div class="mb-3">
              <label for="no_telp" class="form-label">keterangan</label>
              <textarea type="number" class="form-control" id="no_telp" name="no_telp"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
