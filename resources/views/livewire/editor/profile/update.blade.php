<form method="POST" wire:submit.prevent="updateProfile" enctype="multipart/form-data">
    @csrf
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ Session::get('message') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="form-group">
        @if($avatar)

        @endif
        @if($profile)
        <img src="{{ $profile->temporaryUrl()}}" width="100px" height="100px"
            style="border-radius: 10px;  overflow:hidden" alt="{{ $name }}" />
        @else
        <img src="{{ asset('storage/' .$avatar) }}" alt="{{ $name  }}" width="100px" height="100px"
            style="border-radius: 10px;  overflow:hidden" />
        @endif
        <div>
            <label for="Email">Profile</label>
            <input type="file" wire:model="profile" class="form-control" accept="image/*">
            @error('profile')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="form-group">
        <label for="FullName">Name</label>
        <input type="text" wire:model="name" placeholder="Name" class="form-control">
        @error('name')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="text">Website Link</label>
        <input type="url" wire:model="website_link" placeholder="http:://facebook.com" class="form-control">
        @error('website_link')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="text">About Me</label>
        <textarea wire:model="about_me" id="" cols="20" rows="10" class="form-control"></textarea>
        @error('about_me')
        <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button class="btn btn-primary waves-effect waves-light width-md" type="submit">Update</button>
</form>
