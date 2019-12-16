@extends('layouts.app', ['title' => __('User Management')])

@section('content')
@include('users.partials.header', ['title' => __('Edit User')])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3 class="mb-0">{{ __('User Management') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('health-information.update', $healthInformation) }}" autocomplete="off">
                        @csrf
                        @method('patch')

                        <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $healthInformation->patient->name) }}" disabled autofocus>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $healthInformation->patient->email) }}" disabled>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Phone Number') }}</label>
                                <input type="text" name="phone_number" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('phone_number', $healthInformation->patient->phone_number) }}" disabled autofocus>

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
                                {{-- <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('name') }}" readonly> --}}
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control datepicker" name="date_of_birth" placeholder="Select date" type="text" value="{{ optional($healthInformation->patient->date_of_birth)->format('m/d/Y') }}" disabled>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="company_id">Company</label>
                                <input type="text" name="" id="" class="form-control" value="{{ $healthInformation->patient->company->name }}" disabled>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="rig_id">Rig</label>
                                <input type="text" name="" id="" class="form-control" value="{{ $healthInformation->patient->rig->name }}" disabled>

                            </div>

                            @if ($healthInformation->patient->is_patient)
                            <div class="col-md-12">
                                <h6 class="heading-small text-muted mb-4">{{ __('Health information') }}</h6>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                                <label class="form-control-label" for="input-name">{{ __('Gender') }}</label>

                                <input type="text" name="" id="" class="form-control" value="{{ $healthInformation->patient->gender == 'F' ? 'Female' : 'Male' }}" readonly>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Weight (kg)') }}</label>
                                <input type="text" name="weight" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Weight (kg)') }}" value="{{ old('weight', optional($healthInformation->patient->healthInformation)->weight) }}" readonly>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Height (cm)') }}</label>
                                <input type="text" name="height" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Height (cm)') }}" value="{{ old('height', optional($healthInformation->patient->healthInformation)->height) }}" readonly>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('HDL-C (mmol/L)') }}</label>
                                <input type="text" name="hdlc" id="input-name" class="form-control form-control-alternative{{ $errors->has('hdlc') ? ' is-invalid' : '' }}" placeholder="{{ __('Cholesterol (mmol/L)') }}" value="{{ old('hdlc', optional($healthInformation->patient->healthInformation)->hdlc) }}" readonly>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Systolic Blood Pressure (mmHg)') }}</label>
                                <input type="text" name="blood_pressure" id="input-name" class="form-control form-control-alternative{{ $errors->has('blood_pressure') ? ' is-invalid' : '' }}" placeholder="{{ __('Blood Pressure (mmHg)') }}" value="{{ old('blood_pressure', optional($healthInformation->patient->healthInformation)->blood_pressure) }}" readonly>

                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>



                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                                <label class="form-control-label" for="input-name">{{ __('Treatment') }}</label>
                                <input type="text" name="name" id="input-name" class="form-control form-control" placeholder="{{ __('Weight') }}" value="{{ optional($healthInformation->patient->healthInformation)->treatment == '1' ? 'Yes' : 'No' }}" readonly>
                            </div>




                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Total Cholesterol (mg/dL)') }}</label>
                                <input type="text" class="form-control" value="{{ optional($healthInformation->patient->healthInformation)->total_cholesterol == '1' ? 'Yes' : 'No' }}" readonly>

                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                                <label class="form-control-label" for="input-name">{{ __('Diabetes') }}</label>
                                <input type="text" class="form-control" value="{{ optional($healthInformation->patient->healthInformation)->diabetes == '1' ? 'Yes' : 'No' }}" readonly>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4 ">
                                <label class="form-control-label" for="input-name">{{ __('Smoker') }}</label>
                                <input type="text" class="form-control" value="{{ optional($healthInformation->patient->healthInformation)->smoker == '1' ? 'Yes' : 'No' }}" readonly>
                            </div>




                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Family History') }}</label>
                                <textarea name="family_history" class="form-control form-control-alternative" rows="3" placeholder="Write a brief about family history..." readonly>{{ optional($healthInformation)->family_history }}</textarea>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-4">
                                <label class="form-control-label" for="input-name">{{ __('Medical History') }}</label>
                                <textarea name="medical_history" class="form-control form-control-alternative" rows="3" placeholder="Write a brief about medical history..." readonly>{{ optional($healthInformation)->medical_history }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <h5>Age Risk Point : {{ optional($healthInformation)->risk_point_age }}</h5>
                                <h5>HDL-C Risk Point : {{ optional($healthInformation)->risk_point_hdlc }}</h5>
                                <h5>Total Cholesterol Risk Point : {{ optional($healthInformation)->risk_point_cholesterol }}</h5>
                                <h5>Systolic Blood Pressure Risk Point : {{ optional($healthInformation)->risk_point_blood_pressure }}</h5>
                                <h5>Diabetes Risk Point : {{ optional($healthInformation)->risk_point_diabetes }}</h5>
                                <h5>Smoker Risk Point : {{ optional($healthInformation)->risk_point_smoker }}</h5>
                                <h5>Total Point: {{ optional($healthInformation)->total_points }}</h5>
                                <h5>CVD Risk Point: {{ optional($healthInformation)->risk_point_cvd }}</h5>
                                <h5>Risk Level: {{ optional($healthInformation)->risk_level_text }}</h5>


                            </div>
                            @endif
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
    $("#company_id").change(function (e) {
        $.ajax({
            type: "GET",
            url: "../../api/rigs-by-company/" + this.value,
            dataType: "json",
            success: function (response) {
                console.log(response.rigs)
                $("#rig_id").html("");
                $("#rig_id").append(new Option("Select rig", ""));
                response.rigs.forEach(rig => {
                    $("#rig_id").append(new Option(rig.name, rig.id));
                });

                $("#rig_id option[value=" + $("#selected_rig_id").val() + "]").prop('selected', true);
            },
            error: function (error) {
                console.log(error)
            }
        });
    });

    // $("#rig_id option[value=1]").prop('selected', true);
    $("#company_id").trigger('change');
</script>
@endpush