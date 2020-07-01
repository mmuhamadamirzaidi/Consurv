@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row align-items-center justify-content-xl-between">

                <div class="col-xl-4">
                    <div class="card card-stats mb-4 mb-xl-0 bg-success">
                        <a href="{{ route('statistic.risk-level', ['level' => 'Low']) }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Low Risk Level</h5>
                                        {{-- <span class="h2 font-weight-bold mb-0 text-white">{{ $totalLow }}</span> --}}
                                        <span class="h2 font-weight-bold mb-0 text-white">22</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-success rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 13.48%</span>
                                    <span class="text-nowrap text-white">Since yesterday</span>
                                </p>
                            </div>
                        </a>
                     </div>
                </div>

                <div class="col-xl-4">
                    <div class="card card-stats mb-4 mb-xl-0 bg-warning">
                        <a href="{{ route('statistic.risk-level', ['level' => 'Intermediate']) }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total Medium Risk Level</h5>
                                        {{-- <span class="h2 font-weight-bold mb-0 text-white">{{ $totalIntermediate }}</span> --}}
                                        <span class="h2 font-weight-bold mb-0 text-white">17</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-warning rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2"><i class="fa fa-arrow-up"></i> 10.48%</span>
                                    <span class="text-nowrap text-white">Since yesterday</span>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-xl-4">
                    <div class="card card-stats mb-4 mb-xl-0 bg-danger">
                        <a href="{{ route('statistic.risk-level', ['level' => 'High']) }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total High Risk Level</h5>
                                        {{-- <span class="h2 font-weight-bold mb-0 text-white">{{ $totalHigh }}</span> --}}
                                        <span class="h2 font-weight-bold mb-0 text-white">1</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-white text-danger rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-white mr-2"><i class="fa fa-arrow-down"></i> 3.48%</span>
                                    <span class="text-nowrap text-white">Since last month</span>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--7">
    <div class="row">

        {{-- <div class="col-xl-12">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Overview</h6>
                            <h2 class="mb-0">Total Rigs</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="chart-orders" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="col-xl-12">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Overview</h6>
                            <h2 class="mb-0">Total Rigs</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <!-- Chart -->
                    <div class="chart">
                        <canvas id="chart-orders" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div id="chartContainer" style="height: 370px; width: 100%;"></div> --}}

         {{-- <div class="col-xl-12">
            <div class="card shadow">
                <!-- Card header -->
                <div class="card-header bg-transparent">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Overview</h6>
                            <h2 class="mb-0">Total Rigs</h2>
                        </div>
                    </div>
                </div>
                <!-- Card body -->
                <div class="card-body">
                    <div class="chart">
                        <!-- Chart wrapper -->
                        <canvas id="chart-bar-stacked" class="chart-canvas"></canvas>
                    </div>
                </div>
            </div>
        </div>  --}}

    </div>
    
    <div class="row mt-5">

        <div class="col-xl-12">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h6 class="text-uppercase text-muted ls-1 mb-1">Overview</h6>
                            <h2 class="mb-0">Rigs Ranking</h2>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Rig Name</th>
                                <th scope="col">Total Patient</th>
                                <th scope="col">Ranking</th>
                                <th scope="col">Healthy Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Rig A
                                </th>
                                <td>
                                    20
                                </td>
                                <td>
                                    1/300
                                </td>
                                <td>
                                        80%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Rig B
                                </th>
                                <td>
                                    10
                                </td>
                                <td>
                                    2/300
                                </td>
                                <td>
                                        70%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Rig C
                                </th>
                                <td>
                                    8
                                </td>
                                <td>
                                    3/300
                                </td>
                                <td>
                                        60%
                                </td>
                            <tr>
                                <th scope="row">
                                    Rig D
                                </th>
                                <td>
                                    120
                                </td>
                                <td>
                                    4/300
                                </td>
                                <td>
                                        50%
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    Rig E
                                </th>
                                <td>
                                    120
                                </td>
                                <td>
                                    5/300
                                </td>
                                <td>
                                        40%
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush