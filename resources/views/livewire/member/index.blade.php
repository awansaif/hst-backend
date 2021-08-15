<div class="card">
    <div class="card-header">
        <h4 class="card-title float-left">Members</h4>
        @if($showAddForm or $showEditForm)
        <button wire:click="closeForm" class="btn btn-success text-light btn-sm">Close</button>
        @else
        <button wire:click="showAddForm" class="btn btn-success text-light btn-sm">Add</button>
        @endif
    </div>
    <div class="card-body">
        <div class="basic-form">
            @if(Session::has('message'))
            <div class="alert alert-success">
                <span>{{ Session::get('message') }}</span>
            </div>
            @endif
            @if($showAddForm)
            <form method="POST" class="mb-2" wire:submit.prevent="save" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="John F Candy" wire:model.bounce="name">
                    @error('name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" wire:model.bounce="avatar_path">
                    @error('avatar_path')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <button class="btn btn-success text-light">Save</button>
            </form>
            @endif

            @if($showEditForm)
            <form method="POST" class="mb-2" wire:submit.prevent="edit" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="John F Candy" value="{{ $name }}"
                        wire:model.bounce="name">
                    @error('name')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" wire:model.bounce="avatar">
                    @error('avatar')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <button class="btn btn-success text-light">Update</button>
            </form>
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
                                <button wire:click="showEditForm({{ $member->id }})"
                                    class="btn btn-primary">Edit</button>
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
