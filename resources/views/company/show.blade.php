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
                        <div class="d-flex justify-content-between">
                            <h3 class="">List of Rigs</h3>
                            @if (auth()->user()->is_admin)
                            <div class="">
                                <a href="#" data-toggle="modal" data-target="#add_rig" class="btn btn-sm btn-primary">Add Rig</a>
                            </div>
                            @endif
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
<div class="modal fade" id="add_rig" tabindex="-1" role="dialog" aria-labelledby="add_rigTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add New Rig</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('rig.store') }}" method="post">
                @csrf
                <input type="hidden" name="company_id" value="{{ $company->id }}">
                <div class="modal-body">
                    <div class="pl-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="name">Rig Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="" required="" autofocus="">
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