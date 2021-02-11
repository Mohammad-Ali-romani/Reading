<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use App\Rules\CheckPassOld;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    // use CheckPassOld;
    // this is the proprety
    public $confirmPassword,$newPassword,$confirmNewPassword;
    // this is the script proprty
    public $eye,$control;
    protected $rules = [

    ];
    public function rules(){
        return [
            'confirmPassword' => ['required',new CheckPassOld],
            'newPassword' => ['required'],
            'confirmNewPassword'=>['required','same:newPassword']
        ];
    }
    public function render()
    {
        return view('livewire.back.change-password');
    }
    public function mount(){
        $this->eye = 'fa-eye';
        $this->control = 'password';
    }
    // function change password
    public function changePassword(){
        $this->validate();
        User::find(auth()->user()->id)->update(['password'=> Hash::make($this->newPassword)]);
    }
    public function controlPass(){
        if($this->eye === 'fa-eye'){
            $this->eye = 'fa-eye-slash';
            $this->control = 'text';
        }else{
            $this->eye = 'fa-eye';
            $this->control = 'password';
        }

    }
}
