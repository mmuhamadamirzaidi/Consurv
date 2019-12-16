@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row align-items-center justify-content-xl-between">

                <div class="col-xl-4">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <a href="{{ route('statistic.risk-level', ['level' => 'Low']) }}">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Health Information</h5>
                                        <span class="h2 font-weight-bold mb-0">
                                            <a href="{{ route('health-information.show', auth()->user()->healthInformation) }}">View</a>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                            <i class="fas fa-chart-bar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                     </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush