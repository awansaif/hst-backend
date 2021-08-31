{{--
    @if($show)
    <button wire:click="closeAddForm" class="btn btn-success float-right sm">Close</button>
    @else
    <button wire:click="showAddForm" class="btn btn-success float-right sm">Add</button>
    @endif
    @if($show)
    <form method="POST" class="mt-4" wire:submit.prevent="save">
        @csrf
        <div class="form-group mt-4">
            <input type="email" class="form-control" placeholder="email@email.com" wire:model="email">
            @error('email')
            <p class="text-danger">
                {{ $message }}
</p>
@enderror
</div>
<button class="btn btn-success">Save</button>
</form>
@endif
<br>
<br> --}}
<table id="datatable" class="table table-bordered mt-4 dt-responsive nowrap"
    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th>#</th>
            <th>Email</th>
            <th>Subscribed at</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($subscribers as $key => $subscriber)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $subscriber->email }}</td>
            <td>
                {{ date('d M Y h:i:s a', strtotime($subscriber->created_at)) }}
            </td>
            <td>
                <form wire:submit.prevent="remove({{ $subscriber->id }})" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mb-1">
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
