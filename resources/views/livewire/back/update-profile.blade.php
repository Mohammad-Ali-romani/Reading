<div>
    <div class="row">
        <div class="col-md-5">
            <div class="form-group bmd-form-group @error('name') border-error @enderror is-filled">
                <label class="bmd-label-floating @error('name') text-danger @enderror" >Username</label>
                <input type="text" class="form-control " wire:model="name">
            </div>
        </div>
        <div class="col-md-7">
            <div class="form-group bmd-form-group @error('email') border-error @enderror is-filled">
                <label class="bmd-label-floating @error('email') text-danger @enderror" >Email address</label>
                <input type="email" class="form-control"  wire:model="email">
            </div>
        </div>
    </div>
    <button  wire:click="updatefor"  class="btn btn-primary pull-right">Update Profile</button>
    <div class="clearfix"></div>
</div>
