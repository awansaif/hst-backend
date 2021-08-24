<div class="card">
    <div class="card-header">
        <h4 class="card-title float-left">Members</h4>
        <a href="{{ Route('admin.members.create') }}" class="btn btn-success text-light btn-sm">Add</a>
    </div>
    <div class="card-body">
        <div class="basic-form">
            @if(Session::has('message'))
            <div class="alert alert-success">
                <span>{{ Session::get('message') }}</span>
            </div>
            @endif
            <div class="table-responsive">
                <table id="example" class="display" style="min-width: 845px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($members as $key => $member)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $member->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $member->avatar_path) }}" alt="member image"
                                    width="50px" height="50px" style="border-radius: 50%; object-fit:cover;">
                            <td>
                                <a href="{{ Route('admin.members.edit', $member->id)  }}"
                                    class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form wire:submit.prevent="remove({{ $member->id }})" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
