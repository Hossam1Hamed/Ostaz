@extends('web.layouts.base')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h3>Employee List</h3>

            </div>
            <div class="col-3">
                <a href="{{ route('employees.create') }}" class="btn btn-primary form-control" type="button">add new</a>

            </div>
        </div>

        @include('web.pages.employee.partials.table')
        <div class="row">
            <div class="col-12 mt-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {{ $list->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
