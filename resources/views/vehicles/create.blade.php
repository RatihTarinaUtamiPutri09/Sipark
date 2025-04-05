@extends('layouts.app')

@section('content-wrapper')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DAFTAR KENDARAAN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('vehicles.index') }}">Dashboard kendaraan</a></li>
              <li class="breadcrumb-item active">Daftar</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Kendaraan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('vehicles.store') }}" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="license_plate">License Plate</label>
                    <input type="text" name="license_plate" id="license_plate" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="owner_name">Owner Name</label>
                    <input type="text" name="owner_name" class="form-control" required>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Add Vehicle</button>
                  <ol class="float-sm-right">
                    <a href="{{ route('vehicles.index') }}" class="btn btn-secondary">Back</a>
                  </ol>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection
  