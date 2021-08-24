<div class="card">
    <div class="card-header">
        <h4 class="card-title float-left">Change Password </h4>
        <button wire:click="showAddForm" class="btn btn-success sm">Add</button>
    </div>
    <div class="card-body">
        <div class="basic-form">
            @if(Session::has('message'))
            <div class="alert alert-success">
                <span>{{ Session::get('message') }}</span>
            </div>
            @endif
            <form method="POST" wire:submit.prevent="changePasword">
                @csrf
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Old Password" wire:model="old_password">
                    @error('old_password')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="New Password" wire:model="new_password">
                    @error('new_password')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                <button class="btn btn-success">Change</button>
            </form>
        </div>
    </div>
</div>
