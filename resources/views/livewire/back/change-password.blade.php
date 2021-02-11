<div>
    <div class="form-group bmd-form-group mt-3 @error('confirmPassword') border-error @enderror is-filled">
        <label class="bmd-label-floating @error('confirmPassword') text-danger @enderror" >confirm password</label>
        <input type="password" class="form-control" wire:model="confirmPassword">
    </div>
    <div class="form-group bmd-form-group mt-3 @error('newPassword') border-error @enderror is-filled">
        <label class="bmd-label-floating @error('newPassword') text-danger @enderror" >new password</label>
        <input type="{{$control}}" class="form-control " wire:model="newPassword">
        <span class="text-muted icon-pass" wire:click="controlPass"><i class="fas {{$eye}} "></i></span>
    </div>
    <div class="form-group bmd-form-group mt-3 mb-2 @error('confirmNewPassword') border-error @enderror is-filled">
        <label class="bmd-label-floating @error('confirmNewPassword') text-danger @enderror" >confirm the new password</label>
        <input type="password" class="form-control " wire:model="confirmNewPassword">
    </div>
    <button class="btn btn-primary" wire:click="changePassword">Change Password</button>
</div>
