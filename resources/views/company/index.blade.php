@extends('layouts.app', ['title' => __('Company Management')])

@section('content')
@include('users.partials.header', [
        'title' => __('Company Management'),
        'description' => __('This is company management page. You can see the company lists you\'ve add and manage the company'),
        'class' => 'col-lg-12'
    ])

<div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
    
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Company Lists') }}</h3>
                            </div>
                            @if (auth()->user()->is_admin)
                            <div class="col-4 text-right">
                                    <a href="#" data-toggle="modal" data-target="#add_company" class="btn btn-sm btn-primary">Add company</a>
                            </div>
                            @endif
                        </div>
                    </div>
    
                    <div class="col-12">
                        @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                    </div>
    
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
    
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Company Name') }}</th>
                                    <th scope="col">{{ __('Company Address') }}</th>
                                    <th scope="col">{{ __('Total Rig') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
    
                            <tbody>
                                @forelse ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->address}}</td>
                                    <td>{{ $company->rigs->count() }}</td>
                                    <td>{{ $company->created_at->format('H:i, j F Y') }}</td>

                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                @if (auth()->user()->is_admin)
                                                <form action="{{ route('company.destroy', $company) }}" method="post">
                                                    @csrf
                                                    @method('delete')
    
                                                    <a class="dropdown-item" href="{{ route('company.show', $company) }}">{{ __('View') }}</a>
                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this company?") }}') ? this.parentElement.submit() : ''">
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form>
                                                
                                                @else
                                                <a class="dropdown-item" href="{{ route('company.show', $company) }}">{{ __('View') }}</a>
                                                @endif
                                            </div>

                                        </div>
                                    </td> 
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

<div class="modal fade" id="add_company" tabindex="-1" role="dialog" aria-labelledby="add_companyTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Add New Company</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('company.store') }}" method="post">
                @csrf

                <div class="modal-body pl-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="name">Company Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Company Name" required="" autofocus="">
                        </div>

                        <div class="form-group focused">
                            <label class="form-control-label" for="address">Address</label>
                            <input type="text" name="address" id="address" class="form-control form-control-alternative" placeholder="Address" required="" autofocus="">
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