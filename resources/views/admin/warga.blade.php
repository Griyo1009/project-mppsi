@extends('layouts.admin-layout')

@section('title', 'Kelola Warga | Dashboard Admin RT 07')

@push('styles')
<style>
  body {
    background-color: #f5f6fa;
    font-family: 'Poppins', sans-serif;
  }

  /* Header section */
  .section-title {
    font-weight: 700;
    color: #162660;
    font-size: 1.1rem;
    text-transform: uppercase;
    margin-bottom: 8px;
  }

  /* Section Wrapper */
  .section-box {
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    margin-bottom: 30px;
  }

  .section-header {
    background: linear-gradient(to right, #162660, #2D4EC6);
    color: white;
    font-weight: 600;
    padding: 10px 20px;
    text-transform: uppercase;
  }

  /* Table Styles */
  .custom-table {
    margin: 0;
  }

  .custom-table th {
    background: linear-gradient(to right, #162660, #2D4EC6);
    color: white;
    text-align: center;
    font-weight: 600;
    font-size: 0.95rem;
  }

  .custom-table td {
    text-align: center;
    vertical-align: middle;
    font-size: 0.9rem;
  }

  .custom-table tr td {
    border: 1px solid #ddd;
  }

  /* Buttons */
  .btn-accept {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 4px 16px;
    border-radius: 50px;
    font-weight: 500;
  }

  .btn-accept:hover {
    background-color: #218838;
  }

  .btn-decline {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 4px 16px;
    border-radius: 50px;
    font-weight: 500;
  }

  .btn-decline:hover {
    background-color: #bb2d3b;
  }

  .btn-delete {
    background-color: #dc3545;
    color: #fff;
    border: none;
    padding: 4px 16px;
    border-radius: 50px;
    font-weight: 500;
  }

  .btn-delete:hover {
    background-color: #bb2d3b;
  }

  .btn-block {
    background-color: #198754;
    color: #fff;
    border: none;
    padding: 4px 16px;
    border-radius: 50px;
    font-weight: 500;
  }

  .btn-block:hover {
    background-color: #146c43;
  }

  .btn-unblock {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 4px 16px;
    border-radius: 50px;
    font-weight: 500;
  }

  .btn-unblock:hover {
    background-color: #1e7e34;
  }

  /* Status badge */
  .badge-status {
    padding: 6px 18px;
    border-radius: 50px;
    font-weight: 600;
    font-size: 0.85rem;
  }

  .badge-active {
    background-color: #28a745;
    color: white;
  }

  .badge-blocked {
    background-color: #dc3545;
    color: white;
  }

  /* Center container */
  .container-admin {
    padding: 40px 0;
  }

  /* Responsive Table */
  @media (max-width: 768px) {
    .custom-table th,
    .custom-table td {
      font-size: 0.8rem;
      padding: 6px;
    }
  }
</style>
@endpush

@section('content')
<div class="container container-admin">
  <!-- Title -->
  <h5 class="fw-bold mb-4" style="color: #162660;">KELOLA AKUN</h5>

  <!-- ==================== PERSETUJUAN AKUN ==================== -->
  <div class="section-box">
    <div class="section-header d-flex justify-content-between align-items-center">
      <span>PERSETUJUAN AKUN</span>
    </div>

    <div class="table-responsive">
      <table class="table custom-table mb-0">
        <thead>
          <tr>
            <th style="width: 15%">NIK</th>
            <th>Nama Lengkap</th>
            <th>Email</th>
            <th style="width: 20%">Setujui</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>0012345678</td>
            <td>Username 001</td>
            <td>tes@gmail.com</td>
            <td>
              <button class="btn-decline me-2">Tolak</button>
              <button class="btn-accept">Terima</button>
            </td>
          </tr>
          <tr>
            <td>0012345679</td>
            <td>Username 002</td>
            <td>tes2@gmail.com</td>
            <td>
              <button class="btn-decline me-2">Tolak</button>
              <button class="btn-accept">Terima</button>
            </td>
          </tr>
          <tr>
            <td>0012345680</td>
            <td>Username 003</td>
            <td>tes3@gmail.com</td>
            <td>
              <button class="btn-decline me-2">Tolak</button>
              <button class="btn-accept">Terima</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <!-- ==================== DAFTAR AKUN ==================== -->
  <div class="section-box">
    <div class="section-header">
      DAFTAR AKUN
    </div>

    <div class="table-responsive">
      <table class="table custom-table mb-0">
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
          <tr>
            <td>0012345678</td>
            <td>Username 001</td>
            <td>tes@gmail.com</td>
            <td><span class="badge-status badge-active">Aktif</span></td>
            <td>
              <button class="btn-delete me-2">Hapus</button>
              <button class="btn-block">Blokir</button>
            </td>
          </tr>
          <tr>
            <td>0012345679</td>
            <td>Username 002</td>
            <td>tes2@gmail.com</td>
            <td><span class="badge-status badge-active">Aktif</span></td>
            <td>
              <button class="btn-delete me-2">Hapus</button>
              <button class="btn-block">Blokir</button>
            </td>
          </tr>
          <tr>
            <td>0012345680</td>
            <td>Username 003</td>
            <td>tes3@gmail.com</td>
            <td><span class="badge-status badge-blocked">Terblokir</span></td>
            <td>
              <button class="btn-delete me-2">Hapus</button>
              <button class="btn-unblock">Buka</button>
            </td>
          </tr>
          <tr>
            <td>0012345681</td>
            <td>Username 004</td>
            <td>tes4@gmail.com</td>
            <td><span class="badge-status badge-blocked">Terblokir</span></td>
            <td>
              <button class="btn-delete me-2">Hapus</button>
              <button class="btn-unblock">Buka</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
