<div class="basic-form">
    @if(Session::has('message'))
    <div class="alert alert-success">
        <span>{{ Session::get('message') }}</span>
    </div>
    @endif
    <form method="POST" wire:submit.prevent="update">
        @csrf
        <div class="form-group">
            <textarea class="form-control" placeholder="about us" wire:model.bounce="about"
                rows="15">{{ $text->about_text }}</textarea>
            @error('about')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
        </div>
        <button class="btn btn-success text-light">Update</button>
    </form>
</div>
