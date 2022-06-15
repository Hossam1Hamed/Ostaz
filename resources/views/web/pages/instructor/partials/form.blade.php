{{-- action="{{ route('instructors.handleUpgrade' ,$user->id) }}" --}}
<form method="POST"  enctype="multipart/form-data">
    @csrf
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-8 m-auto">

                        <div class="multisteps-form__content">
                            <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input class="form-control" type="text" name="name" value="{{ $user->name }}"
                                    required>
                                @error('name')
                                    <br><label style="color: red">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input class="form-control" type="email" name="email" value="{{ $user->email }}"
                                    required>
                                @error('email')
                                    <br><label style="color: red">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="row mt-3">

                                <div class="col-12 col-sm-6">
                                    <label>Phone Number</label>
                                    <input class="multisteps-form__input form-control" type="text" name="phone"
                                        value="{{ $user->phone }}" required />
                                    @error('phone')
                                        <br><label style="color: red">{{ $message }}</label>
                                    @enderror
                                </div>


                                <div class="col-12 col-sm-6">
                                    <label>WhatsApp Number</label>
                                    <input class="multisteps-form__input form-control" type="text" name="whatsapp"
                                        value="{{ $user->whatsapp }}" required />
                                    @error('whatsapp')
                                        <br><label style="color: red">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Facebook Account</label>
                                <input class="form-control" type="text" name="facebook" required>
                                @error('facebook')
                                    <br><label style="color: red">{{ $message }}</label>
                                @enderror
                            </div>

                            <div class="row mt-3">
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Country</label>
                                    <select class="multisteps-form__select form-control" name="country">

                                        <option> egypt</option>
                                        <option> egypt</option>
                                        <option> egypt</option>

                                    </select>
                                    @error('country')
                                        <br><label style="color: red">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="col-6 col-sm-3 mt-3 mt-sm-0">
                                    <label>City</label>
                                    <select class="multisteps-form__select form-control" name="city">
                                        {{-- <option selected="selected">masr</option> --}}
                                        <option value="1">State 1</option>
                                        <option value="2">State 2</option>
                                    </select>
                                    @error('city')
                                        <br><label style="color: red">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="col-6 col-sm-3 mt-3 mt-sm-0">
                                    <label>Area</label>
                                    <select class="multisteps-form__select form-control" name="area">
                                        {{-- <option selected="selected">masr</option> --}}
                                        <option value="1">State 1</option>
                                        <option value="2">State 2</option>
                                    </select>
                                    @error('area')
                                        <br><label style="color: red">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                    <label>Secialization</label>
                                    <select class="multisteps-form__select form-control" name="specializations[]" multiple>
                                        @foreach ($specializations as $item)
                                          <option value="{{$item->id}}"> {{$item}}</option>
                                        @endforeach
                                       </select>
                                    @error('specializations')
                                        <br><label style="color: red">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <div class="button-row  mt-3 ">
                                <button type="submit" class="btn btn-primary ">UPGRADE</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>