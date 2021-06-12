<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\User;
use App\UserInformation;

class UserController extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('layouts/user-view', ['user' => $user]);
    }

    public function portada($filename)
    {
        $file = Storage::disk('portada')->get($filename);
        return new Response($file, 200);
    }

    public function perfil($filename)
    {
        $file = Storage::disk('perfile')->get($filename);
        return new Response($file, 200);
    }

    public function album($filename)
    {
        $file = Storage::disk('album')->get($filename);
        return new Response($file, 200);
    }
}
