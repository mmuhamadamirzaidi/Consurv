@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="mb-0">Company List</h3>
                            @if (auth()->user()->is_admin)
                            <div class="text-right">
                                <a href="#" data-toggle="modal" data-target="#add_company" class="btn btn-sm btn-primary">Add company</a>
                            </div>
                            @endif
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
                                        <td>
                                            {{ $company->name }}
                                            <p class="mb-0" style="font-size:10px">{{ $company->address}}</p>
                                        </td>
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

<div class="modal fade" id="add_company" tabindex="-1" role="dialog" aria-labelledby="add_companyTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('company.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="pl-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="name">Company Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="" required="" autofocus="">
                        </div>
                        <div class="form-group focused">
                            <label class="form-control-label" for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control form-control-alternative" placeholder="" required="" autofocus="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection