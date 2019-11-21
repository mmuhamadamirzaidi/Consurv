@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add User')])   

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
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                            <div class="row">

                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>
        
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-4">
                                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>
        
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                                <label class="form-control-label" for="input-name">{{ __('Phone Number') }}</label>
                                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('name') }}" required autofocus>
            
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                            </div>

                            <div class="row">

                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6">
                                            <label class="form-control-label" for="input-name">{{ __('Date Of Birth') }}</label>
                                            {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('name') }}" required autofocus> --}}
                                            <div class="input-group input-group-alternative">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                    </div>
                                                    <input class="form-control datepicker" placeholder="Select date" type="text" value="06/20/2018">
                                                </div>
                                            {{-- @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif --}}
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6">
                                            <label class="form-control-label" for="input-name">{{ __('Company') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Company') }}" value="{{ old('name') }}" required autofocus>
        
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                            </div>

                            <div class="row">
                                

                                

                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} col-md-6">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required>
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-control-label " for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="" required>
                                </div>
                            </div>

                            <h6 class="heading-small text-muted mb-4">{{ __('Health information') }}</h6>
                            <div class="row">

                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 " >
                                            <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>
                                            {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}" required autofocus> --}}

                                            <div class="col-auto row">
                                                <div class="custom-control custom-radio mb-3 col-md-3">
                                                    <input name="custom-radio-1" class="custom-control-input" id="customRadio1"  checked="" type="radio">
                                                    <label class="custom-control-label" for="customRadio1">Male</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3 col-md-3">
                                                    <input name="custom-radio-1" class="custom-control-input" id="customRadio2"type="radio">
                                                    <label class="custom-control-label" for="customRadio2">Female</label>
                                                  </div>

                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                                <label class="form-control-label" for="input-name">{{ __('Weight (kg)') }}</label>
                                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight (kg)') }}" value="{{ old('name') }}" required autofocus>
            
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                                    <label class="form-control-label" for="input-name">{{ __('Height (cm)') }}</label>
                                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Height (cm)') }}" value="{{ old('name') }}" required autofocus>
                
                                                    @if ($errors->has('name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>

                            </div>

                            <div class="row">

                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                            <label class="form-control-label" for="input-name">{{ __('HDL-C (mmol/L)') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Cholesterol (mmol/L)') }}" value="{{ old('name') }}" required autofocus>
        
                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                                <label class="form-control-label" for="input-name">{{ __('Systolic Blood Pressure (mmHg)') }}</label>
                                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Blood Pressure (mmHg)') }}" value="{{ old('name') }}" required autofocus>
            
                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                           

                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 " >
                                                    <label class="form-control-label" for="input-name">{{ __('Treatment') }}</label>
                                                    {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}" required autofocus> --}}
        
                                                    <div class="col-auto row">
                                                        <div class="custom-control custom-radio mb-3 col-md-3">
                                                            <input name="custom-radio-2" class="custom-control-input" id="customRadio3"  checked="" type="radio">
                                                            <label class="custom-control-label" for="customRadio3">Yes</label>
                                                          </div>
                                                          <div class="custom-control custom-radio mb-3 col-md-3">
                                                            <input name="custom-radio-2" class="custom-control-input" id="customRadio4"type="radio">
                                                            <label class="custom-control-label" for="customRadio4">No</label>
                                                          </div>
        
                                                    </div>
                                                </div>

                            </div>

                            <div class="row">

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                    <label class="form-control-label" for="input-name">{{ __('Total Cholesterol (mg/dL)') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Cholesterol (mmol/L)') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 " >
                                        <label class="form-control-label" for="input-name">{{ __('Diabetes') }}</label>
                                        {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}" required autofocus> --}}

                                        <div class="col-auto row">
                                            <div class="custom-control custom-radio mb-3 col-md-3">
                                                <input name="custom-radio-3" class="custom-control-input" id="customRadio5"  checked="" type="radio">
                                                <label class="custom-control-label" for="customRadio5">Yes</label>
                                              </div>
                                              <div class="custom-control custom-radio mb-3 col-md-3">
                                                <input name="custom-radio-3" class="custom-control-input" id="customRadio6"type="radio">
                                                <label class="custom-control-label" for="customRadio6">No</label>
                                              </div>

                                        </div>
                                    </div>

                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 " >
                                            <label class="form-control-label" for="input-name">{{ __('Smoker') }}</label>
                                            {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}" required autofocus> --}}

                                            <div class="col-auto row">
                                                <div class="custom-control custom-radio mb-3 col-md-3">
                                                    <input name="custom-radio-4" class="custom-control-input" id="customRadio7"   type="radio">
                                                    <label class="custom-control-label" for="customRadio7">Yes</label>
                                                  </div>
                                                  <div class="custom-control custom-radio mb-3 col-md-3">
                                                    <input name="custom-radio-4" class="custom-control-input" id="customRadio8"type="radio">
                                                    <label class="custom-control-label" for="customRadio8">No</label>
                                                  </div>

                                            </div>
                                        </div>

                    </div>

                            <div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Family History') }}</label>
                                    {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Family History') }}" value="{{ old('name') }}" required autofocus> --}}

                                    <form>
                                            <textarea class="form-control form-control-alternative" rows="3" placeholder="Write a brief about family history..."></textarea>
                                          </form>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Medical History') }}</label>
                                    {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Medical History') }}" value="{{ old('name') }}" required autofocus> --}}

                                    <form>
                                        <textarea class="form-control form-control-alternative" rows="3" placeholder="Write a brief about medical history..."></textarea>
                                      </form>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection