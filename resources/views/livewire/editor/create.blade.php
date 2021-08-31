<div class="basic-form">
    @if(Session::has('message'))
    <div class="alert alert-success">
        <span>{{ Session::get('message') }}</span>
    </div>
    @endif
    <form method="POST" wire:submit.prevent="save">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="John F candy" wire:model="name">
            @error('name')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="john@america.com" wire:model="email">
            @error('email')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="*********" wire:model="password">
            @error('password')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>
        <button class="btn btn-success">Add</button>
        <a href="{{ Route('admin.editors.index') }}" class="btn btn-primary text-light float-right">Back</a>
    </form>
</div>
