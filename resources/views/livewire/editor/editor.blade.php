<table id="datatable" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($editors as $key => $editor)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $editor->name }}</td>
            <td>{{ $editor->email }}</td>
            <td>{{ $editor->status ? 'Active' : 'Deactive' }}</td>
            <td>
                <a href="{{ Route('admin.editors.edit', $editor->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form wire:submit.prevent="remove({{ $editor->id }})" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
