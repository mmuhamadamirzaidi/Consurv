@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">Company List</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Total Rig</th>
                                        <th>Date Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($companies as $company)
                                        <tr class="tr_click" data-url="{{ route('company.show', $company) }}">
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->rigs->count() }}</td>
                                            <td>{{ $company->created_at->format('H:i, j F Y') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">There are no company registered</td>
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
