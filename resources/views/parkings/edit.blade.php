@extends('layouts.app')

@section('content-wrapper')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>UPDATE PARKIR</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('parkings.index') }}">Dashboard parkir</a></li>
              <li class="breadcrumb-item active">Update</li>
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
                <h3 class="card-title">Parkir</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('parkings.update', $parking) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <select name="vehicle_id" class="form-control" required>
                        @foreach ($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}" {{ $vehicle->id == $parking->vehicle_id ? 'selected' : '' }}>
                                {{ $vehicle->license_plate }} - {{ $vehicle->owner_name }}
                            </option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="check_in">Check In</label>
                    <input type="datetime-local" name="check_in" class="form-control" value="{{ \Carbon\Carbon::parse($parking->check_in)->format('Y-m-d\TH:i') }}" required>
                  </div>
                  <div class="form-group">
                    <label for="check_out">Check Out</label>
                    <input type="datetime-local" name="check_out" class="form-control" value="{{ $parking->check_out ? \Carbon\Carbon::parse($parking->check_out)->format('Y-m-d\TH:i') : '' }}">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Parking</button>
                  <ol class="float-sm-right">
                    <a href="{{ route('parkings.index') }}" class="btn btn-secondary">Back</a>
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