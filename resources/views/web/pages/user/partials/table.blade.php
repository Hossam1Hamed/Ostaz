<div class="card-body px-0 pb-0">
    <div class="table-responsive">

        <table class="table table-flush" id="products-list">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    {{-- <th>City</th> --}}
                    {{-- <th>Area</th> --}}
                    <th> Specialization </th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $key => $user)
                    <tr>
                        <td class="text-sm">{{ ++$key }}</td>
                        <td>
                            <div class="d-flex">
                                <h6 class="ms-3 my-auto">{{ $user->name }}</h6>
                            </div>
                        </td>
                        <td class="text-sm">{{ $user->email }}</td>
                        <td class="text-sm">{{ $user->phone }}</td>
                        {{-- <td class="text-sm">{{ $user->area }}</td> --}}
                        {{-- <td class="text-sm">{{ $user->area->area }}</td> --}}
                        <td class="text-sm">
                            @foreach ($user->specializations as $specialization)
                                {{ $specialization->name }}
                            @endforeach
                        </td>
                        <td class="text-sm">
                            @switch($user->type)
                                @case(3)
                                    Instructor
                                @break

                                @case(4)
                                    Parent
                                @break

                                @case(5)
                                    Student
                                    @break
                            @endswitch
                        </td>
                        <td class="text-sm ">
                            <div class="flex">
                                <input type="checkbox" id="chkToggle" checked data-toggle="toggle" data-on="Active" data-off="Not Active" data-onstyle="success" data-offstyle="danger">

                                <a href="" data-bs-toggle="tooltip" data-bs-original-title="Show user">
                                    <i class="fas fa-eye text-secondary"></i>
                                </a>
                                <a href="" class="mx-3" data-bs-toggle="tooltip"
                                    data-bs-original-title="Edit user">
                                    <i class="fas fa-user-edit text-secondary"></i>
                                </a>
                                @if ($user->type == 4 || $user->type == 5)
                                <a href="{{route('instructors.upgrade', $user->id)}}" data-bs-toggle="tooltip" data-bs-original-title="Upgrade to Instructor">
                                    <i class="fas fa-level-up-alt text-secondary"></i>
                                </a>
                                @endif
                               
                                <a data-bs-toggle="tooltip" data-bs-original-title="Delete user">
                                    <form method="POST">
                                        @csrf
                                        <button type="submit" class="fas fa-trash text-secondary show-alert-delete-box">
                                        </button>
                                    </form>
                                </a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
