
    <div class="form-group">
        <label for="exampleFormControlInput1">Photo</label>
        @error('photo')
        <br><label style="color: red">{{ $message }}</label>
        @enderror
        <input type="file" name="image" class="form-control image" id="exampleFormControlInput1">
    </div>
    <div class="form-group">
        <img src="{{ asset('uploads/specs/default.jpg') }}" style="width:100px;" class="img-thumbnail image-preview" alt="">

    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Name</label>
        @error('name')
        <br><label style="color: red">{{ $message }}</label>
        @enderror
        <input type="text" value="{{ $spec[0]->name ?? '' }}" name="name" class="form-control" id="exampleFormControlInput1">
    </div>
