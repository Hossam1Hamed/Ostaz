@extends('web.layouts.base')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">All Users</h5>

                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                               
                                <div class="ms-auto my-auto">
                                    <form method="GET" action="{{ route('users.index') }}">
                                        @csrf
                                        <select class="multisteps-form__select btn btn-outline-primary btn-sm  mb-0  "
                                            name="type">
                                            <option selected="selected">Filter By Type</option>
                                            <option value="3">Instructor</option>
                                            <option value="4">Parent</option>
                                            <option value="5">Student</option>
                                        </select>
                                        <button type="submit" class="btn bg-gradient-primary btn-sm mb-0" >
                                            Filter
                                        </button>
                                    </form>
                                    <a href="{{ route('users.create') }}"
                                        class="btn bg-gradient-primary btn-sm mb-0">+&nbsp;
                                        New
                                        User</a>
                                    <button type="button" class="btn btn-outline-primary btn-sm mb-0" data-bs-toggle="modal"
                                        data-bs-target="#import">
                                        Import
                                    </button>
                                    <div class="modal fade" id="import" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog mt-lg-10">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ModalLabel">Import CSV</h5>
                                                    <i class="fas fa-upload ms-3"></i>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>You can browse your computer for a file.</p>
                                                    <input type="text" placeholder="Browse file..."
                                                        class="form-control mb-3">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            id="importCheck" checked="">
                                                        <label class="custom-control-label" for="importCheck">I accept the
                                                            terms and conditions</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gradient-secondary btn-sm"
                                                        data-bs-dismiss="modal">Close
                                                    </button>
                                                    <button type="button" class="btn bg-gradient-primary btn-sm">Upload
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv"
                                        type="button" name="button">Export
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <form method="GET" action="{{ route('users.index') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" name="email" class="form-control"
                                        placeholder="Please enter the user's email">
                                    <button type="submit" class="btn btn-outline-primary mb-0" type="button"
                                        id="button-addon2">search</button>
                                </div>
                            </form>

                        </div>
                        @if (session('message'))
                            <div class="alert alert-danger text-center">{{ session('message') }}</div>
                        @endif
                        @include('web.pages.user.partials.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('web.pages.user.partials.scripts')
@endsection
