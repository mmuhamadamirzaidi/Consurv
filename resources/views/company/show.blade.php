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
                        <div class="col-6">
                            <h3 class="mb-0">{{ __('Company Details') }}</h3>
                        </div>
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

                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_company">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this company?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
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

    <div class="row mt-5">
        <div class="col">
            <div class="card shadow">

                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3 class="mb-0">{{ __('Rig List') }}</h3>
                        </div>
                        @if (auth()->user()->is_admin)
                        <div class="col-6 text-right">
                            <a href="#" data-toggle="modal" data-target="#add_rig" class="btn btn-sm btn-primary">Add rig</a>
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
                                <th scope="col">{{ __('Rig Name') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($rigs as $rig)
                            <tr>
                                <td>{{ $rig->name }}</td>
                                <td>{{ $rig->created_at->format('H:i, j F Y') }}</td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            @if (auth()->user()->is_admin)
                                            <form action="{{ route('rig.destroy', $rig) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a class="dropdown-item" href="#" data-target="#edit_rig" data-toggle="modal" data-route="{{ route('rig.update', $rig) }}" data-name="{{ $rig->name }}" data-id="{{ $rig->id }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this rig?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="3">There are no rig list </td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
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
                            <h3 class="mb-0">{{ __('Patient List') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-items-center table-flush">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Patient Name') }}</th>
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($patients as $patient)
                            <tr>
                                <td>{{ $patient->name }}</td>
                                <td>{{ $patient->created_at->format('H:i, j F Y') }}</td>

                                <td class="text-right">
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            <a class="dropdown-item" href="{{ route('user.show', $patient) }}">{{ __('View') }}</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            @empty
                            <tr>
                                <td colspan="3">There are no patient in the list</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
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
                            <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Rig Name" required="" autofocus="">
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

<div class="modal fade" id="edit_rig" tabindex="-1" role="dialog" aria-labelledby="edit_rigTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Existing Rig</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post" id="form_edit_rig">
                @csrf
                @method('PATCH')
                <input type="hidden" name="rig_id" value="">
                <div class="modal-body">
                    <div class="pl-lg-4">
                        <div class="form-group focused">
                            <label class="form-control-label" for="name">Rig Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Rig Name" required="" autofocus="">
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

<div class="modal fade" id="edit_company" tabindex="-1" role="dialog" aria-labelledby="edit_companyTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Edit Company</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('company.update', $company) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="modal-body pl-lg-4">
                    <div class="form-group focused">
                        <label class="form-control-label" for="name">Company Name</label>
                        <input type="text" name="name" id="name" class="form-control form-control-alternative" placeholder="Company Name" required="" value="{{ $company->name }}">
                    </div>

                    <div class="form-group focused">
                        <label class="form-control-label" for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control form-control-alternative" placeholder="Address" required="" value="{{ $company->address }}">
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

@push('js')
<script>
    $('#edit_rig').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var route = button.data('route') // Extract info from data-* attributes
        var name = button.data('name');
        var id = button.data('id');
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('#name').val(name)
        modal.find('#rig_id').val(id)
        modal.find('#form_edit_rig').attr('action', route)
    })
</script>
@endpush