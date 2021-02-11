<?php

namespace App\Http\Livewire\Back;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateProfile extends Component
{

    public $name,$email;
    protected $rules = [
        'name' => ['required','min:3','max:15'],
        'email'=>['required','email','max:50']
    ];
    public function render()
    {
        return view('livewire.back.update-profile');
    }
    public function mount(){
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;

    }
    public function updated(){
        $this->validate();
    }
    public function updatefor(){
        if($this->name === Auth::user()->name || $this->email === Auth::user()->email){

            User::find(auth()->user()->id)->update(['name'=> $this->name,'email'=>$this->email]);
        }

    }
}
