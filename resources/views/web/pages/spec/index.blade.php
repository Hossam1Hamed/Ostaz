@extends('web.layouts.base')
@section('content')

<div class="alert alert-success" id="success_msg" style="display: none;">
  {{ session()->get('message') }}
</div>
<div class="alert alert-danger" id="failure_msg" style="display: none;">
  {{ session()->get('message') }}
</div>
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- Card header -->
        <div class="card-header pb-0">
          <div class="d-lg-flex">
            <div>
              <h3 class="mb-0">All Specializations</h3>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <button type="button" class="btn bg-gradient-primary btn-sm mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  +&nbsp; New Specialization
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <form method="post" id="create" action="" enctype="multipart/form-data">
                        @csrf
                        @include('web.pages.spec.partials.form')
                        <div class="modal-footer">
                          <button type="button" id="cancel" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" id="save" class="btn bg-gradient-primary">Save</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          @include('web.pages.spec.partials.table')
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')

<script>
  $(document).on('click', '#save', function(e) {
    e.preventDefault();
    $('#exampleModal').modal('hide');
    $('#name_error').text('');
    $('#image_error').text('');
    var formData = new FormData($('#create')[0]);
    $.ajax({
      type: 'post',
      url: ("{{ route('specs.store')}}"),
      data: formData,
      processData: false,
      contentType: false,
      cache: false,
      success: function(data) {
        if (data.status == true) {
          // $('#success_msg').show();
          location.reload();
        } else {
          // $('#failure_msg').show();
          location.reload();
        }

      },
      error: function(reject) {
        var response = $.parseJSON(reject.responseText);
        $.each(response.errors, function(key, val) {
          $("#" + key).text(val[0]);

        });
      },
    });
  });
  $(document).on('click', '#cancel', function(e) {
    $('#exampleModal').modal('hide');
  });
</script>


@endsection