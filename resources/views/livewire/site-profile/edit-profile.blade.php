<form wire:submit.prevent="update">
    @if(Session::has('message'))
    <div class="alert alert-success">
        <span>
            {{ Session::get('message') }}
        </span>
    </div>
    @endif
    <div class="form-group">
        <label for="FullName">Name</label>
        <input type="text" wire:model="name" placeholder="Heeny" id="FullName" class="form-control">
    </div>
    <div class="form-group">
        <label for="Email">City</label>
        <input type="text" wire:model="city" placeholder="London" class="form-control">
    </div>
    <div class="form-group">
        <label for="Username">State</label>
        <input type="text" wire:model="state" placeholder="London" class="form-control">
    </div>
    <div class="form-group">
        <label for="Password">Country</label>
        <input type="text" wire:model="country" placeholder="England" class="form-control">
    </div>
    <div class="form-group">
        <label for="text">Address</label>
        <input type="text" wire:model="address" placeholder="Street # 12" class="form-control">
    </div>
    <div class="form-group">
        <label for="text">Facebook</label>
        <input type="text" wire:model="facebook" placeholder="http:://facebook.com" class="form-control">
    </div>
    <div class="form-group">
        <label for="text">Twitter</label>
        <input type="text" wire:model="twitter" placeholder="Twitter " class="form-control">
    </div>
    <div class="form-group">
        <label for="text">Instagram</label>
        <input type="text" wire:model="instagram" placeholder="Instagram" class="form-control">
    </div>
    <div class="form-group">
        <label for="text">Pentrest</label>
        <input type="text" wire:model="pentrest" placeholder="Pentrest" class="form-control">
    </div>
    <div class="form-group">
        <label for="text">Messenger</label>
        <input type="text" wire:model="messenger" placeholder="Messenger" class="form-control">
    </div>
    <button class="btn btn-primary waves-effect waves-light width-md" type="submit">Update</button>
</form>
