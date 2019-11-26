@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">Company Details</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $company->name }}</td>
                                    
                                </tr>
                                <tr>
                                    <th>Total Rig</th>
                                    <td>{{ $company->rigs->count() }}</td>
                                </tr>
                                <tr>
                                    <th>Date Create</th>
                                    <td>{{ $company->created_at->format('H:i, j F Y') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-12">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">List of Rigs</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Rig Name</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rigs as $rig)
                                    <tr class="" data-url="">
                                        <td>{{ $rig->name }}</td>
                                        <td>{{ $rig->created_at->format('H:i, j F Y') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3">There are no rig registered</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection