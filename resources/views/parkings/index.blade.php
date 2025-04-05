
@extends('layouts.app')

@section('content-wrapper')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard Parkir</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('parkings.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                    <ol class="float-sm-right">
                    <a href="{{ route('parkings.create') }}" class="btn btn-primary">Add Parking</a>
                    </ol>
                <h3 class="card-title">Parkings</h3>
            
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Vehicle</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Amount</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($parkings as $parking)
                  <tr>
                    <td>{{ $parking->vehicle->license_plate }} - {{ $parking->vehicle->owner_name }}</td>
                    <td>{{ \Carbon\Carbon::parse($parking->check_in)->format('Y-m-d H:i') }}</td>
                    <td>{{ $parking->check_out ? \Carbon\Carbon::parse($parking->check_out)->format('Y-m-d H:i') : 'N/A' }}</td>
                    <td>{{ $parking->amount ? 'Rp ' . number_format($parking->amount, 2, ',', '.') : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('parkings.edit', $parking) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('parkings.destroy', $parking) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection 
