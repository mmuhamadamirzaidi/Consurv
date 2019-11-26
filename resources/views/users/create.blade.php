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
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}">

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
                                <input type="text" name="phone_number" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('name') }}">

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
                                    <input class="form-control datepicker" name="date_of_birth" placeholder="Select date" type="text">
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
                            <label class="form-control-label" for="company_id">Company</label>
                            <select name="company_id" id="company_id" class="form-control" placeholder="Company" required>
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="rig_id">Rig</label>
                            <select name="rig_id" id="rig_id" class="form-control" placeholder="Rig" required>
                                <option value="">Select Rig</option>
                            </select>
                        </div>






                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="role">Role</label>
                            <select name="role" id="role" class="form-control" placeholder="Role" required>
                                <option value="">Select role</option>
                                <option value="Admin">Administrator</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Patient">Patient</option>
                            </select>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} col-md-4">
                            <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-control-label " for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="" required>
                        </div>

                        <div id="health_information" class="col-md-12 form-group m-0" style="display:none"> 
                            <div class="row">
                                <div class="col-md-12">
                                    <h6 class="heading-small text-muted mb-4">{{ __('Health information') }}</h6>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                                    <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>
                                    {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}" required autofocus> --}}

                                    <div class="col-auto row">
                                        <div class="custom-control custom-radio mb-3 col-md-3">
                                            <input name="gender" value="M" class="custom-control-input" id="customRadio1" type="radio">
                                            <label class="custom-control-label" for="customRadio1">Male</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3 col-md-3">
                                            <input name="gender" value="F" class="custom-control-input" id="customRadio2" type="radio">
                                            <label class="custom-control-label" for="customRadio2">Female</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                    <label class="form-control-label" for="input-name">{{ __('Weight (kg)') }}</label>
                                    <input type="text" name="weight" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight (kg)') }}" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                    <label class="form-control-label" for="input-name">{{ __('Height (cm)') }}</label>
                                    <input type="text" name="height" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Height (cm)') }}" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                    <label class="form-control-label" for="input-name">{{ __('HDL-C (mmol/L)') }}</label>
                                    <input type="text" name="hdlc" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Cholesterol (mmol/L)') }}" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                    <label class="form-control-label" for="input-name">{{ __('Systolic Blood Pressure (mmHg)') }}</label>
                                    <input type="text" name="blood_pressure" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Blood Pressure (mmHg)') }}" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                                    <label class="form-control-label" for="input-name">{{ __('Treatment') }}</label>
                                    {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}"> --}}

                                    <div class="col-auto row">
                                        <div class="custom-control custom-radio mb-3 col-md-3">
                                            <input name="treatment" value="1" class="custom-control-input" id="customRadio3" type="radio">
                                            <label class="custom-control-label" for="customRadio3">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3 col-md-3">
                                            <input name="treatment" value="0" class="custom-control-input" id="customRadio4" type="radio">
                                            <label class="custom-control-label" for="customRadio4">No</label>
                                        </div>

                                    </div>
                                </div>




                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                    <label class="form-control-label" for="input-name">{{ __('Total Cholesterol (mg/dL)') }}</label>
                                    <input type="text" name="total_cholesterol" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Cholesterol (mmol/L)') }}" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                                    <label class="form-control-label" for="input-name">{{ __('Diabetes') }}</label>
                                    {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}"> --}}

                                    <div class="col-auto row">
                                        <div class="custom-control custom-radio mb-3 col-md-3">
                                            <input name="diabetes" value="1" class="custom-control-input" id="customRadio5" type="radio">
                                            <label class="custom-control-label" for="customRadio5">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3 col-md-3">
                                            <input name="diabetes" value="0" class="custom-control-input" id="customRadio6" type="radio">
                                            <label class="custom-control-label" for="customRadio6">No</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                                    <label class="form-control-label" for="input-name">{{ __('Smoker') }}</label>
                                    {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight') }}" value="{{ old('name') }}"> --}}

                                    <div class="col-auto row">
                                        <div class="custom-control custom-radio mb-3 col-md-3">
                                            <input name="smoker" value="1" class="custom-control-input" id="customRadio7" type="radio">
                                            <label class="custom-control-label" for="customRadio7">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio mb-3 col-md-3">
                                            <input name="smoker" value="0" class="custom-control-input" id="customRadio8" type="radio">
                                            <label class="custom-control-label" for="customRadio8">No</label>
                                        </div>

                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                    <label class="form-control-label" for="input-name">{{ __('Family History') }}</label>
                                    <textarea name="family_history" class="form-control form-control-alternative" rows="3" placeholder="Write a brief about family history..."></textarea>
                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                    <label class="form-control-label" for="input-name">{{ __('Medical History') }}</label>
                                    <textarea name="medical_history" class="form-control form-control-alternative" rows="3" placeholder="Write a brief about medical history..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footers.auth')
</div>
@endsection

@push('js')
<script>
    $("#role").change(function (e) {
        $role = this.value;
        if ($role == 'Patient') {
            $("#health_information").css('display', 'block')
        } else {
            $("#health_information").css('display', 'none')
        }
    });

    $("#company_id").change(function (e) {
        $.ajax({
            type: "GET",
            url: "../api/rigs-by-company/" + this.value,
            dataType: "json",
            success: function (response) {
                console.log(response.rigs)
                $("#rig_id").html("");
                $("#rig_id").append(new Option("Select rig", ""));
                response.rigs.forEach(rig => {
                    $("#rig_id").append(new Option(rig.name, rig.id));
                });
            },
            error: function(error) {
                console.log(error)
            }
        });
        
    });
</script>
@endpush