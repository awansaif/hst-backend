<table id="datatable" class="table table-bordered dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Category</th>
            <th>Title</th>
            <th>Editor</th>
            <th>Views</th>
            <th>Publish at</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $key => $blog)
        <tr style="mb-1">
            <td>{{ $key + 1 }}</td>
            <td>{{ $blog->category->title }}</td>
            <td style="mx-width: 200px; text-overflow:hidden;">{{ $blog->title }}</td>
            <td>{{ $blog->editor ?  $blog->editor->name: ''}}</td>
            <td>{{ $blog->view->views }}</td>
            <td>{{ date('d M y h:i:s a', strtotime($blog->created_at)) }}</td>
            <td>
                <a href="{{ Route('admin.blogs.edit', $blog->id)  }}" class="btn mb-2 btn-primary">Edit</a>
            </td>
            <td>
                <form wire:submit.prevent="remove({{ $blog->id }})" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mb-2">Remove</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
