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






                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                        <label class="form-control-label" for="input-role">Role</label>
                        <select name="role" id="input-role" class="form-control" placeholder="Role" required>
                            <option value="">Select role</option>
                            <option value="80">Administrator</option>
                            <option value="81">Doctor</option>
                            <option value="82">Patient</option>
                        </select>
                    </div>

                    @if ($user->is_patient)


                    <div class="col-md-12">
                        <h6 class="heading-small text-muted mb-4">{{ __('Health information') }}</h6>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                        <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>
                        {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}" required autofocus> --}}

                        <div class="col-auto row">
                            <div class="custom-control custom-radio mb-3 col-md-3">
                                <input name="gender" {{ $user->gender == 'M' ? 'selected' : '' }} value="M" class="custom-control-input" id="customRadio1" checked="" type="radio">
                                <label class="custom-control-label" for="customRadio1">Male</label>
                            </div>
                            <div class="custom-control custom-radio mb-3 col-md-3">
                                <input name="gender" {{ $user->gender == 'F' ? 'selected' : '' }} value="F" class="custom-control-input" id="customRadio2" type="radio">
                                <label class="custom-control-label" for="customRadio2">Female</label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                        <label class="form-control-label" for="input-name">{{ __('Weight (kg)') }}</label>
                        <input type="text" name="weight" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight (kg)') }}" value="{{ old('weight', optional($user->healthInformation)->weight) }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                        <label class="form-control-label" for="input-name">{{ __('Height (cm)') }}</label>
                        <input type="text" name="height" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Height (cm)') }}" value="{{ old('height', optional($user->healthInformation)->height) }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>



                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                        <label class="form-control-label" for="input-name">{{ __('HDL-C (mmol/L)') }}</label>
                        <input type="text" name="hdlc" id="input-name" class="form-control form-control-alternative{{ $errors->has('hdlc') ? ' is-invalid' : '' }}" placeholder="{{ __('Cholesterol (mmol/L)') }}" value="{{ old('hdlc', optional($user->healthInformation)->hdlc) }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                        <label class="form-control-label" for="input-name">{{ __('Systolic Blood Pressure (mmHg)') }}</label>
                        <input type="text" name="blood_pressure" id="input-name" class="form-control form-control-alternative{{ $errors->has('blood_pressure') ? ' is-invalid' : '' }}" placeholder="{{ __('Blood Pressure (mmHg)') }}" value="{{ old('blood_pressure', optional($user->healthInformation)->blood_pressure) }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>



                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                        <label class="form-control-label" for="input-name">{{ __('Treatment') }}</label>
                        {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}" required autofocus> --}}

                        <div class="col-auto row">
                            <div class="custom-control custom-radio mb-3 col-md-3">
                                <input name="treatment" {{ optional($user->healthInformation)->treatment == "1" ? 'checked' : '' }} value="1" class="custom-control-input" id="customRadio3" type="radio">
                                <label class="custom-control-label" for="customRadio3">Yes</label>
                            </div>
                            <div class="custom-control custom-radio mb-3 col-md-3">
                                <input name="treatment" {{ optional($user->healthInformation)->treatment == "0" ? 'checked' : '' }} value="0" class="custom-control-input" id="customRadio4" type="radio">
                                <label class="custom-control-label" for="customRadio4">No</label>
                            </div>

                        </div>
                    </div>




                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                        <label class="form-control-label" for="input-name">{{ __('Total Cholesterol (mg/dL)') }}</label>
                        <input type="text" name="total_cholesterol" id="input-name" class="form-control form-control-alternative{{ $errors->has('total_cholesterol') ? ' is-invalid' : '' }}" placeholder="{{ __('Cholesterol (mmol/L)') }}" value="{{ old('total_cholesterol', optional($user->healthInformation)->total_cholesterol) }}" required autofocus>

                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                        <label class="form-control-label" for="input-name">{{ __('Diabetes') }}</label>
                        {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}" required autofocus> --}}

                        <div class="col-auto row">
                            <div class="custom-control custom-radio mb-3 col-md-3">
                                <input name="diabetes" {{ optional($user->healthInformation)->diabetes == '1' ? 'checked' : '' }} value="1" class="custom-control-input" id="customRadio5" type="radio">
                                <label class="custom-control-label" for="customRadio5">Yes</label>
                            </div>
                            <div class="custom-control custom-radio mb-3 col-md-3">
                                <input name="diabetes" {{ optional($user->healthInformation)->diabetes == '0' ? 'checked' : '' }} value="0" class="custom-control-input" id="customRadio6" type="radio">
                                <label class="custom-control-label" for="customRadio6">No</label>
                            </div>

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                        <label class="form-control-label" for="input-name">{{ __('Smoker') }}</label>
                        {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}" required autofocus> --}}

                        <div class="col-auto row">
                            <div class="custom-control custom-radio mb-3 col-md-3">
                                <input name="smoker" {{ optional($user->healthInformation)->smoker == '1' ? 'checked' : '' }} value="1" class="custom-control-input" id="customRadio7" type="radio">
                                <label class="custom-control-label" for="customRadio7">Yes</label>
                            </div>
                            <div class="custom-control custom-radio mb-3 col-md-3">
                                <input name="smoker" {{ optional($user->healthInformation)->smoker == '0' ? 'checked' : '' }} value="0" class="custom-control-input" id="customRadio8" type="radio">
                                <label class="custom-control-label" for="customRadio8">No</label>
                            </div>

                        </div>
                    </div>




                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                        <label class="form-control-label" for="input-name">{{ __('Family History') }}</label>
                        <textarea name="family_history" class="form-control form-control-alternative" rows="3" placeholder="Write a brief about family history...">{{ optional($user->healthInformation)->family_history }}</textarea>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                        <label class="form-control-label" for="input-name">{{ __('Medical History') }}</label>
                        <textarea name="medical_history" class="form-control form-control-alternative" rows="3" placeholder="Write a brief about medical history...">{{ optional($user->healthInformation)->medical_history }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <h5>Age Risk Point : {{ optional($user->healthInformation)->risk_point_age }}</h5>
                        <h5>HDL-C Risk Point : {{ optional($user->healthInformation)->risk_point_hdlc }}</h5>
                        <h5>Total Cholesterol Risk Point : {{ optional($user->healthInformation)->risk_point_cholesterol }}</h5>
                        <h5>Systolic Blood Pressure Risk Point : {{ optional($user->healthInformation)->risk_point_blood_pressure }}</h5>
                        <h5>Diabetes Risk Point : {{ optional($user->healthInformation)->risk_point_diabetes }}</h5>
                        <h5>Smoker Risk Point : {{ optional($user->healthInformation)->risk_point_smoker }}</h5>
                        <h5>Total Point: {{ optional($user->healthInformation)->total_points }}</h5>
                        <h5>CVD Risk Point: {{ optional($user->healthInformation)->risk_point_cvd }}</h5>
                        <h5>Risk Level: {{ optional($user->healthInformation)->risk_level_text }}</h5>


                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection