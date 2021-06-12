<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\UserInformation;

class UserInfo extends Component
{
    public $user;
    public $user_info;
    public $show;
    public $action;

    //General info
    public $nombre;
    public $age;
    public $born;
    public $email;
    public $phone;

    //formation and work
    public $employe;
    public $work_place;
    public $university;
    public $school;

    //living info
    public $origin;
    public $living;

    //about info
    public $description;
    public $hobbieOne;
    public $hobbieTwo;
    public $hobbieThree;
    public $skillOne;
    public $skillTwo;
    public $skillThree;
    public $status;

    //other info
    public $eventOne;
    public $eventTwo;
    public $eventThree;

    public function mount($user)
    {
        $this->user = $user;
        $this->user_info = UserInformation::where('user_id',$user->id)->first();
        $this->show = 'falso';
        $this->action = 'index';
    }

    public function updateAction($action)
    {
        $this->action = $action;
    }

    public function showInfoForm()
    {   
        if($this->show == 'falso') {
            $this->show = 'verdadero';
        }else {
            $this->show = 'falso';
        }
    }

    public function updated()
    {

    }

    public function saveInfo()
    {
        $this->validate([
            'nombre' => 'string|nullable|min:3',
            'age' => 'numeric|nullable',
            'born' => 'date|nullable',
            'email' => 'email|nullable',
            'phone' => 'numeric|nullable',
            'employe' => 'string|nullable|max:100',
            'work_place' => 'string|nullable|max:70',
            'university' => 'string|nullable|min:5|max:100',
            'school' => 'string|nullable|min:5|max:100',
            'origin' => 'string|nullable|max:100',
            'living' => 'string|nullable|max:100',
            'description' => 'string|nullable|min:6|max:200',
            'hobbieOne' => 'string|nullable|min:3|max:40',
            'hobbieTwo' => 'string|nullable|min:3|max:40',
            'hobbieThree' => 'string|nullable|min:3|max:40',
            'skillOne' => 'string|nullable|min:3|max:40',
            'skillTwo' => 'string|nullable|min:3|max:40',
            'skillThree' => 'string|nullable|min:3|max:40',
            'status' => 'string|nullable|min:3|max:40',
            'eventOne' => 'string|nullable|min:6|max:100',
            'eventTwo' => 'string|nullable|min:6|max:100',
            'eventThree' => 'string|nullable|min:6|max:100',
        ]);

        if($this->user_info !== null) {

        }else {

            UserInformation::create([
                'user_id' => $this->user->id,
                'nombre' => $this->nombre,
                'edad' => $this->age,
                'born' => $this->born,
                'email' => $this->email,
                'phone' => $this->phone,
                'trabajo' => $this->employe,
                'work_place' => $this->work_place,
                'estudios1' => $this->university,
                'estudios2' => $this->school,
                'procedencia' => $this->origin,
                'residencia' => $this->living,
                'description' => $this->description,
                'hobbie1' => $this->hobbieOne,
                'hobbie2' => $this->hobbieTwo,
                'hobbie3' => $this->hobbieThree,
                'hobbie4' => $this->skillOne,
                'hobbie5' => $this->skillTwo,
                'hobbie6' => $this->skillThree,
                'status' => $this->status,
                'curiosidad1' => $this->eventOne,
                'curiosidad2' => $this->eventTwo,
                'curiosidad3' => $this->eventThree
            ]);
        }

        $this->nombre = '' ;
        $this->age = null;
        $this->born = null;
        $this->email = null;
        $this->phone = null;
        $this->employe = '';
        $this->work_place = '';
        $this->university = '';
        $this->school = '';
        $this->origin = '';
        $this->living = '';
        $this->description = '';
        $this->hobbieOne = '';
        $this->hobbieTwo = '';
        $this->hobbieThree = '';
        $this->skillOne = '';
        $this->skillTwo = '';
        $this->skillThree = '';
        $this->status = '';
        $this->eventOne = '';
        $this->eventTwo = '';
        $this->eventThree = '';

        $this->emitUp('newInfo');
        $this->showInfoForm();

    }

    public function render()
    {
        return view('livewire.users.user-info');
    }
}
