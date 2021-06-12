<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class PublicationController extends Controller
{
    public function getFile($filename)
    {
        $file = Storage::disk('publication')->get($filename);
        return new Response($file, 200);
    }

    public function commentFile($filename)
    {
        $file = Storage::disk('comment')->get($filename);
        return new Response($file, 200);
    }

}
