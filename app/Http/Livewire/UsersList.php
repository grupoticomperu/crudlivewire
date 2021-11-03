<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\This;

class UsersList extends Component
{

    //public $name = "Michael";
    use WithPagination;
    public $name;
    protected $queryString = ['name'];

    public function mount(){
       //$this->name="Mike";
    }

    public function render()
    {
        $users = User::orderBy('created_at','desc');

        if($this->name){
            $users->where('name','like','%'. $this->name.'%')
            ->orwhere('email','like','%'. $this->name.'%');
        }
        $users = $users->paginate(4);
        return view('livewire.users-list',['users' => $users]);
    }

    public function cleanFilter(){
        $this->name="";
    }
    public function delete(User $user){
        $user->delete();
    }
}
