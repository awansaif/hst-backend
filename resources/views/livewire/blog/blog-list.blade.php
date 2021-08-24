<div class="card">
    <div class="card-header">
        <h4 class="card-title float-left">Members</h4>
        <a href="{{ Route('admin.blogs.create') }}" class="btn btn-success text-light btn-sm">Add</a>
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
                            <th>Category</th>
                            <th>Title</th>
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
                            <td>{{ date('d m y h:i:s a', strtotime($blog->created_at)) }}</td>
                            <td>
                                <a href="{{ Route('admin.blogs.edit', $blog->id)  }}"
                                    class="btn mb-2 btn-primary">Edit</a>
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
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Publish at</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
