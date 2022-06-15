<div class="form-group">
    <label class="form-control-label">Name</label>
    @error('name')
        <br><label style="color: red">{{ $message }}</label>
    @enderror
    <input class="form-control" type="text" name="name">
</div>
<div class="form-group">
    <label class="form-control-label">Email</label>
    @error('email')
        <br><label style="color: red">{{ $message }}</label>
    @enderror
    <input class="form-control" type="email" name="email">
</div>
<div class="form-group">
    <label class="form-control-label">Role</label>
    @error('role')
        <br><label style="color: red">{{ $message }}</label>
    @enderror
    <select class="form-control" name="role">
        @foreach ($list as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label class="form-control-label">Avtar</label>
    @error('image')
        <br><label style="color: red">{{ $message }}</label>
    @enderror
    <input class="form-control" type="file" name="image">
</div>
