<table id="datatable" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                <img src="{{ asset('storage/' . $member->avatar_path) }}" alt="member image" width="50px" height="50px"
                    style="border-radius: 50%; object-fit:cover;">
            <td>
                <a href="{{ Route('admin.members.edit', $member->id)  }}" class="btn btn-primary">Edit</a>
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
</table>
