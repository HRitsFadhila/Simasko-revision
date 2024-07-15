@extends('layouts.app')

@section('title', 'Dashoard')
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Dashboard</a></li>
@endsection

@section('content')
    <!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{ $jumlahSupplier }}</h3>

          <p>Supplier</p>
        </div>
        <div class="icon">
          <i class="fas fa-truck"></i>
        </div>
        <a href="{{ route('supplier.index') }}" class="small-box-footer"> <i class="fas fa-angle-up"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{ $totalJumlahSemuaBarang }}</h3>

          <p>Stok Barang</p>
        </div>
        <div class="icon">
          <i class="fas fa-boxes"></i>
        </div>
        <a href="{{ route('dbarang.index') }}" class="small-box-footer"> <i class="fas fa-angle-up"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{ $jumlahKaryawan }}</h3>

          <p>Karyawan</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{ route('karyawan.index') }}" class="small-box-footer"> <i class="fas fa-angle-up"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Servis</p>
        </div>
        <div class="icon">
          <i class="fas fa-screwdriver"></i>
        </div>
        <a href="#" class="small-box-footer"> <i class="fas fa-angle-up"></i></a>
      </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      {{-- <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Sales
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content p-0">
            <!-- Morris chart - Sales -->
            <div class="chart tab-pane active" id="revenue-chart"
                 style="position: relative; height: 300px;">
                <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
             </div>
            <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
              <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
            </div>
          </div>
        </div><!-- /.card-body -->
      </div> --}}
      <!-- /.card -->


      <!-- /.card -->
    </section>
    <!-- /.Left col -->
    
</div>
  <!-- /.row (main row) -->
@endsection

@push('script')

@endpush