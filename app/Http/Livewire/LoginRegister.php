<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginRegister extends Component
{
    public $username = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $action;

    public function updated($field) 
    {
        if($this->action != 'singUp') {
            $this->validateOnly($field, [
                'email' => "required|email:rfc|max:200",
                'password' => "required|string|max:200",
            ]);
        }else {
            $this->validateOnly($field, [
                'username' => "string|min:3|required|max:200",
                'email' => "required|email:rfc|unique:users,email|max:200",
                'password' => "required|string|min:6|max:200",
                'password_confirmation' => "required|string|"
            ]);
        }

    }

    public function singUp()
    {
        $this->action = 'singUp';
    }

    public function singIn()
    {
        $this->action = 'singIn';
    }


    public function render()
    {
        return view('livewire.login-register');
    }
}
