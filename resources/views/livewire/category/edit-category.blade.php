<div class="basic-form">
    @if(Session::has('message'))
    <div class="alert alert-success">
        <span>{{ Session::get('message') }}</span>
    </div>
    @endif
    <form method="POST" wire:submit.prevent="update">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Fashion" value="{{ $title }}" wire:model="title">
            @error('title')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>
        <button class="btn btn-success float-left">Update</button>
        <a href="{{ Route('admin.categories.index') }}" class="btn btn-primary text-light float-right">Back</a>
    </form>
</div>
