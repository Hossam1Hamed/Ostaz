@extends('web.layouts.base')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <h3>Edit Role: {{ $spec[0]->name }}</h3>
            <div class="card">
                <div class="card-body px-0 pb-0">
                    <form method="post" id="create" action="{{route('specs.update',$spec[0]->id)}}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}
                        @include('web.pages.spec.partials.form')
                        <input type="hidden" name="file" value="{{$spec[0]->attachments[0]->file}}">
                        <div class="modal-footer">
                            <a href="{{route('specs.index')}}"><button type="button" id="cancel" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancel</button></a>
                            <button type="submit" id="save" class="btn bg-gradient-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection