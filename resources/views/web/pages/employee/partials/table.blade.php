<div class="card">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr class="text-center">
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Name</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Avtar</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Email</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Role</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10">Added date</th>
                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-10 ps-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                    <tr>
                        <td class="text-center">
                            <p class="text font-weight-bold mb-0">{{ $item->name }}</p>
                        </td>
                        <td class="text-center">
                            <img src="{{ asset($item->attachment->file ?? '') }}" class="img-fluid border-radius-sm"
                                height="100" width="100">
                        </td>
                        <td class="text-center">
                            <p class="text font-weight-bold mb-0">{{ $item->email }}</p>
                        </td>
                        <td class="text-center">
                            <p class="text font-weight-bold mb-0">{{ $item->roles->first()->name ?? '' }}</p>
                        </td>
                        <td class="text-center">
                            <p class="text font-weight-bold mb-0">{{ $item->created_at }}</p>
                        </td>
                        <td class="align-middle text-center text-sm">
                            @can('employees_view')
                                <a href="{{ route('employees.show', $item->id) }}" class="btn btn-outline-success"
                                    type="button">
                                    <span class="btn-inner--icon"><i class="fas fa-eye"></i></span>
                                </a>
                            @endcan
                            @can('employees_edit')
                                <a href="{{ route('employees.edit', $item->id) }}" class="btn btn-outline-info" type="button">
                                    <span class="btn-inner--icon"><i class="fas fa-pen"></i></span>
                                </a>
                            @endcan
                            @can('employees_delete')
                                <form style="display:inline" method="POST"
                                    action="{{ route('employees.destroy', [$item->id]) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-outline-danger show_confirm" type="button">
                                        <span class="btn-inner--icon"><i class="fas fa-trash"></i></span>
                                    </button>

                                </form>
                            @endcan
                            {{-- @can('employees_block')
                                <form style="display:inline" method="POST"
                                    action="{{ route('roles.block', [$item->id]) }}">
                                    @csrf
                                    <button class="btn btn-outline-warning" type="submit">
                                        <span class="btn-inner--icon"><i class="fas fa-ban"></i></span>
                                    </button>
                                </form>
                            @endcan --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
