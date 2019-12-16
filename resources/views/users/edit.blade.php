@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
@include('users.partials.header', [
'title' => __('Hello') . ' '. $user->name,
'description' => __('This is the profile page. You can see the informations you\'ve add to the profile and manage the related informations'),
'class' => 'col-lg-12'
])

<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="{{ asset('argon') }}/img/theme/profile.png" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                        <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                    </div>
                </div>
                <div class="card-body pt-0 pt-md-4">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                {{-- <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                            </div>
                            <div>
                                <span class="heading">10</span>
                                <span class="description">{{ __('Photos') }}</span>
                            </div>
                            <div>
                                <span class="heading">89</span>
                                <span class="description">{{ __('Comments') }}</span>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <h3>
                        {{ $user->name }}<span class="font-weight-light">, 27</span>
                    </h3>
                    <div class="h5 font-weight-300">
                        <i class="ni location_pin mr-2"></i>{{ __('Kuala Lumpur, Malaysia') }}
                    </div>
                    <div class="h5 mt-4">
                        <i class="ni business_briefcase-24 mr-2"></i>{{ __('Administrator') }}
                    </div>
                    <div>
                        <i class="ni education_hat mr-2"></i>{{ __('Consurv Technic Sdn. Bhd') }}
                    </div>
                    <hr class="my-4" />
                    <p>{{ __('Empowering Data. Providing Digital Solutions.') }}</p>
                    <a href="#">{{ __('Show more') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <h3 class="col-12 mb-0">{{ __('Edit Profile') }}</h3>
                </div>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off">
                    @csrf
                    @method('put')

                    <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>

                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>

                            @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>

                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('phone_number') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-phone_number">{{ __('Phone Number') }}</label>
                            <input type="phone_number" name="phone_number" id="input-phone_number" class="form-control form-control-alternative{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Phone Number') }}" value="{{ old('phone_number', $user->phone_number) }}" required>

                            @if ($errors->has('phone_number'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('date_of_birth') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-date_of_birth">{{ __('Date of Birth') }}</label>
                            <input type="date_of_birth" name="date_of_birth" id="input-date_of_birth" class="form-control form-control-alternative{{ $errors->has('date_of_birth') ? ' is-invalid' : '' }}" placeholder="{{ __('Date of Birth') }}" value="{{ old('date_of_birth', optional($user->date_of_birth)->format('m/d/Y')) }}" required>

                            @if ($errors->has('date_of_birth'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('date_of_birth') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="company_id">Company</label>
                            <select name="company_id" id="company_id" class="form-control" placeholder="Company" required>
                                <option value="">Select company</option>
                                @foreach ($companies as $company)
                                <option {{ $company->id == $user->company_id ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->name }}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="rig_id">Rig</label>
                            <select name="rig_id" id="rig_id" class="form-control" placeholder="Rig" required>
                                <option value="">Select rig</option>
                            </select>
                            <input type="hidden" name="selected_rig_id" id="selected_rig_id" value="{{ $user->rig_id }}">
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                        </div>
                    </div>
                </form>
                <hr class="my-4" />
                <form method="post" action="{{ route('user.password', $user) }}" autocomplete="off">
                    @csrf
                    @method('put')

                    <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>

                    @if (session('password_status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('password_status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    <div class="pl-lg-4">
                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}" value="" required>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-4">{{ __('Change Password') }}</button>
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