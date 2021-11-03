<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserSave extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $user;
    public $avatar;
    public $msj = "";

    protected $rules = [
        'name'=> 'required|min:3',
        'email'=> 'required|email|unique:users,email',
        'password'=> 'required|min:3',
        'avatar'=> 'nullable|image|max:1024'
    ];

    public function mount($id=null){
        $this->init($id);
    }

    public function render()
    {
        return view('livewire.user-save');
    }

    public function submit(){
        if($this->user)
            $this->rules['email'] = 'required|email|unique:users,email,'.$this->user->id;
        //validar
        $this->validate();

        $this->password = Hash::make($this->password);

        if($this->user){
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]);
            $this->msj = "Usuario Actualizado";
        } else {
            $this->user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password
            ]);
            $this->msj = "Usuario Creado";
            //$this->name = $this->email = $this->password;
            return redirect()->route('user.list');
        }   

        if($this->avatar){
            //$avatarName = time() . '_avatar.' . $this->avatar->getClientOriginalExtension();
    
            //$this->avatar->storeAs('avatar', $avatarName, 'public_uploads');
           // $this->avatar->storeAs('avatar', $avatarName);
           $this->user->updateProfilePhoto($this->avatar);
        }
        
       
    }

    private function init($id){
        $user = null;
        if($id){
            $user = User::findOrFail($id);
        }
        $this->user = $user;
        if($this->user){
            $this->name = $this->user->name;
            $this->email = $this->user->email;
        }
    }
}
