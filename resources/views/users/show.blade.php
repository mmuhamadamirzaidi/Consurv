@extends('layouts.app', ['title' => __('User Management')])

@section('content')
@include('users.partials.header', ['title' => __('User Details')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('User Management') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-primary">{{ __('Edit User') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">


                    <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                    <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>
    
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>
    
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Phone Number') }}</label>
                                <input type="text" name="phone_number" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('phone_number', $user->phone_number) }}" required autofocus>
    
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
    
                    </div>

                    <div class="row">

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Date Of Birth') }}</label>
                                {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('name') }}" required autofocus> --}}
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control datepicker" name="date_of_birth" placeholder="Select date" type="text" value="{{ optional($user->date_of_birth)->format('m/d/Y') }}">
                                    {{-- value="06/20/2018" --}}
                                </div>
                                {{-- @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif --}}
                            </div>
                            {{-- <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6">
                            <label class="form-control-label" for="input-name">{{ __('Company') }}</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Company') }}" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div> --}}
    
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="input-role">Company</label>
                            <select name="role_id" id="input-role" class="form-control" placeholder="Company" required>
                                <option value="">Select company</option>
                                <option value="1">Company A</option>
                                <option value="2">Company B</option>
                            </select>
    
                        </div>
    
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="input-role">Rig</label>
                            <select name="role_id" id="input-role" class="form-control" placeholder="Rig" required>
                                <option value="">Select rig</option>
                                <option value="1">Rig A</option>
                                <option value="2">Rig B</option>
                                <option value="3">Rig B</option>
                            </select>
                        </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
    
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">{{ __('Patient History List') }}</h3>
                            </div>
                            @if (auth()->user()->is_admin)
                            <div class="col-6 text-right">
                                    {{-- <a href="#" data-toggle="modal" data-target="#add_rig" class="btn btn-sm btn-primary">Update Patient Info</a> --}}
                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-sm btn-primary">{{ __('Update Patient Info') }}</a>
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
                                    <th scope="col">{{ __('History Date') }}</th>
                                    <th scope="col">{{ __('Age') }}</th>
                                    <th scope="col">{{ __('Framingham Result') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
    
                            <tbody>
                                <tr>
                                    <td>29/11/2019 07:13</td>
                                    <td>50</td>
                                    <td>Medium Risk Level</td>

                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                @if (auth()->user()->is_admin)
                                                <form action="{{ route('user.destroy', $user) }}" method="post">
                                                    @csrf
                                                    @method('delete')
    
                                                    <a class="dropdown-item" href="{{ route('user.show', $user) }}">{{ __('View') }}</a>
                                                    
                                                    <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this history?") }}') ? this.parentElement.submit() : ''">
                                                        {{ __('Delete') }}
                                                    </button>
                                                </form> 
                                                
                                                 @else
                                                <a class="dropdown-item" href="{{ route('user.show', $user) }}">{{ __('View') }}</a>
                                                @endif
                                            </div>

                                        </div>
                                    </td> 
                                 </tr>

                            </tbody>
    
                        </table>
                    </div>
        
                </div>
            </div>
    </div>
    
</div>

@include('layouts.footers.auth')
</div>
@endsection