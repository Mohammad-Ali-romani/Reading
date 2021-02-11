<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\old_comment;
use Livewire\Component;

class Notifications extends Component
{
    public $numnoti,$comments=[];
    public $show,$new,$old;
    protected $listeners = ['mount'];
    public function mount(){
        if($this->show !== "show"){ // حل مشكلة اضافة البيانات مرة تانية
            if($this->checkdata()){
                $this->numnoti = $this->new-$this->old;
                $this->comments = Comment::all()->where('id','>',$this->old);

            }else{
                $this->numnoti = 0 ;
                $this->comments = [];
            }
        }
    }
    public function update(){
        $this->numnoti = 0;
        $news =Comment::all()->where('id','>',$this->old);
        foreach($news as $new){
            old_comment::create([
                'id'=>$new->id,
                'comment'=>$new->comment
            ]);
        }
        if($this->show === "show") $this->show = '';
        else  $this->show = 'show';
    }
    public function checkdata(){
        $this->old = old_comment::all()->count();
        $this->new = Comment::all()->count();
        if($this->old < $this->new){
            return true;
        }else{
            return false;
        }
    }
    public function render()
    {
        return view('livewire.back.notifications');
    }
}
