<div class="table-responsive">
    <table id="example" class="display" style="min-width: 845px">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $category->title }}</td>
                <td>
                    <a href="{{ Route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
                </td>
                <td>
                    <form wire:submit.prevent="remove({{ $category->id }})" method="post">
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
                <th>Title</th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>
