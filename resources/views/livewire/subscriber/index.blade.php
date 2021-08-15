<div class="card">
    <div class="card-header">
        <h4 class="card-title float-left">Subscribers List</h4>
        @if($show)
        <button wire:click="closeAddForm" class="btn btn-success sm">Close</button>
        @else
        <button wire:click="showAddForm" class="btn btn-success sm">Add</button>
        @endif
    </div>
    <div class="card-body">
        @if($show)
        <form method="POST" class="mb-4" wire:submit.prevent="save">
            @csrf
            <div class="form-group">
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
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Subscribed at</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
