@extends('layouts.admin-layout')

@section('title', 'Kelola Warga | Dashboard Admin RT 07')

@push('styles')
<style>
  body {
    background-color: #f9fAFC;
    font-family: 'roboto', sans-serif;
  }

  /* Section Wrapper */
  .section-box {
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
  }

  .custom-table th {
    background: linear-gradient(to bottom, #162660, #2D4EC6);
    color: white;
    text-align: center;
    font-weight: 600;
    font-size: 0.95rem;
  }

  .table-header-gradient {
    background: linear-gradient(to right, #162660, #2D4EC6);
    border: none;
  }

  .table-row {
    border-radius: 8px;
    overflow: hidden;
  }

  .table-row td {
    border: none;
    text-align: center;
  }

  .table-row td:first-child {
    border-radius: 8px 0 0 8px;
    padding-left: 15px; /* Menambahkan padding kiri untuk menjauhi sisi */
  }

  .table-row td:last-child {
    border-radius: 0 8px 8px 0;
    padding-right: 15px; /* Menambahkan padding kanan untuk menjauhi sisi */
  }

  .table {
    border-collapse: separate;
    border-spacing: 0 6px;
  }
</style>
@endpush

@section('content')
<div class="container-fluid mx-0 p-0 mb-5">
  <!-- Title -->
  <div class="section-box mx-0 mb-3 bg-white">
    <h5 class="fw-bold gradient-text text-uppercase p-3 border-bottom shadow-sm px-3" style="color: #162660;">KELOLA AKUN</h5>
    <div class="section-header gradient-text fw-bold px-4 py-2 text-center">
      PERSETUJUAN AKUN
    </div>
    <table class="table custom-table">
      <thead>
        <tr>
          <th style="width: 15%">NIK</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th style="width: 20%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-row">
          <td>0012345678</td>
          <td>Username 001</td>
          <td>tes@gmail.com</td>
          <td>
            <button class="btn btn-danger btn-sm me-2">Tolak</button>
            <button class="btn btn-warning btn-sm text-white">Blokir</button>
          </td>
        </tr>
        <tr class="table-row">
          <td>0012345678</td>
          <td>Username 001</td>
          <td>tes@gmail.com</td>
          <td>
            <button class="btn btn-danger btn-sm me-2">Tolak</button>
            <button class="btn btn-success btn-sm text-white">Terima</button>
          </td>
        </tr>
        <tr class="table-row">
          <td>0012345678</td>
          <td>Username 001</td>
          <td>tes@gmail.com</td>
          <td>
            <button class="btn btn-danger btn-sm me-2">Tolak</button>
            <button class="btn btn-success btn-sm text-white">Terima</button>
          </td>
        </tr>
        <tr class="table-row">
          <td>0012345678</td>
          <td>Username 001</td>
          <td>tes@gmail.com</td>
          <td>
            <button class="btn btn-danger btn-sm me-2">Tolak</button>
            <button class="btn btn-success btn-sm text-white">Terima</button>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="section-header gradient-text fw-bold px-4 py-2 text-center">
      DAFTAR AKUN
    </div>
    <table class="table custom-table">
      <thead>
        <tr>
          <th style="width: 15%">NIK</th>
          <th>Nama Lengkap</th>
          <th>Email</th>
          <th>Status</th>
          <th style="width: 20%">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <tr class="table-row">
          <td>0012345678</td>
          <td>Username 001</td>
          <td>tes@gmail.com</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td>
            <button class="btn btn-warning btn-sm text-white">Blokir</button>
          </td>
        </tr>
        <tr class="table-row">
          <td style="width: 15%">0012345679</td>
          <td>Username 002</td>
          <td>tes2@gmail.com</td>
          <td><span class="badge bg-success">Aktif</span></td>
          <td style="width: 20%">
            <button class="btn btn-warning btn-sm text-white">Blokir</button>
          </td>
        </tr>
        <tr class="table-row">
          <td style="width: 15%">0012345680</td>
          <td>Username 003</td>
          <td>tes3@gmail.com</td>
          <td><span class="badge bg-danger">Terblokir</span></td>
          <td style="width: 20%">
            <button class="btn btn-success btn-sm">Buka</button>
          </td>
        </tr>
        <tr class="table-row">
          <td>0012345681</td>
          <td>Username 004</td>
          <td>tes4@gmail.com</td>
          <td><span class="badge bg-danger">Terblokir</span></td>
          <td>
            <button class="btn btn-success btn-sm">Buka</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endsection