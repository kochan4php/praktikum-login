<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
  public function __construct()
  {
    $this->middleware(['auth', 'level:1,2'])->except(['index', 'show']);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $supplier = Supplier::paginate(5);
    return view('supplier.index', compact('supplier'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorize('kelola-supplier');
    return view('supplier.tambah');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->authorize('kelola-supplier');
    try {
      $validated_data = $request->validate([
        'nama_supplier' => 'required',
        'no_telp' => 'required|numeric',
        'alamat' => 'required'
      ]);
      Supplier::create($validated_data);
      return to_route('supplier.index')->with('sukses', 'Berhasil Tambah Data');
    } catch (\Exception $e) {
      return to_route('supplier.index')->with('error', $e->getMessage());
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $this->authorize('kelola-supplier');
    $supplier = Supplier::whereId($id)->first();
    return view('supplier.edit', compact('supplier'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $this->authorize('kelola-supplier');
    try {
      $validated_data = $request->validate([
        'nama_supplier' => 'required',
        'no_telp' => 'required|numeric',
        'alamat' => 'required'
      ]);
      Supplier::find($id)->update($validated_data);
      return to_route('supplier.index')->with('sukses', 'Berhasil Ubah Data');
    } catch (\Exception $e) {
      return to_route('supplier.index')->with('error', $e->getMessage());
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $this->authorize('kelola-supplier');
    Supplier::whereId($id)->delete();
    return to_route('supplier.index')->with('sukses', 'Berhasil Hapus Data');
  }
}
