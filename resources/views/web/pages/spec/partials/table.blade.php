<div class="table-responsive">
    <table class="table table-flush" id="products-list">
        <thead class="thead-light">
            <tr>
                <th>Name</th>
                <th>Photo</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($specs as $spec)
            <tr>
                <td class="text">{{$spec->name}}</td>
                
                <td>
                    @foreach($spec->attachments as $attach)
                    
                    @if($loop->iteration > 1)
                        <br />
                    @endif
                    
                    <img src="{{ $attach->image_path }}" class="img-thumbnail" style="width:100px;height:100px;" alt="">
                    
                    @endforeach
                </td>
                <td class="text-sm">
                    <a href="" data-bs-toggle="tooltip" data-bs-original-title="Preview">
                        <i class="fas fa-eye text-secondary"></i>
                    </a>
                    <a href="{{route('specs.edit',$spec->id)}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                        <i class="fas fa-edit text-secondary"></i>
                    </a>
                    <div style="display:inline-block;">
                    <form method="post" action="{{route('specs.destroy',$spec->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Delete">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button><i class="fas fa-trash text-secondary"></i></button>
                    </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>