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
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" disabled>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" disabled>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="input-name">{{ __('Phone Number') }}</label>
                            <input type="text" name="phone_number" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('phone_number', $user->phone_number) }}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="input-name">{{ __('Date Of Birth') }}</label>
                            <input class="form-control datepicker" name="date_of_birth" placeholder="Select date" type="text" value="{{ optional($user->date_of_birth)->format('m/d/Y') }}" disabled>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="input-role">Company</label>
                            <input type="text" name="" id="" class="form-control" value="{{ $user->company->name }}" disabled>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="input-role">Rig</label>
                            <input type="text" name="" id="" class="form-control" value="{{ $user->rig->name }}" disabled>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($user->is_patient)
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
                            @if ($user->healthInformation)
                            <a href="{{ route('health-information.edit', $user->healthInformation) }}" class="btn btn-sm btn-primary">{{ __('Update Patient Info') }}</a>
                            @endif
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
                            @if ($user->healthInformation)
                                
                            
                            <tr>
                                <td>{{ $user->healthInformation->created_at }}</td>
                                <td>{{ $user->healthInformation->heart_age }}</td>
                                <td>{{ $user->healthInformation->risk_level_text }}</td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            @if (auth()->user()->is_admin)
                                            <a class="dropdown-item" href="{{ route('user.show', $user) }}">{{ __('View') }}</a>
                                            <form action="{{ route('health-information.destroy', $user->healthInformation) }}" method="post">
                                                @csrf
                                                @method('delete')
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
                            @else
                            <tr>
                                <td colspan="4" class="text-center mt-3 mb-3">No record found</td>
                            </tr>
                            @endif
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@include('layouts.footers.auth')
</div>
@endsection