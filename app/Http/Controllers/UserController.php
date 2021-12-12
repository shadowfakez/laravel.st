<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        echo "This is UserController, index method";
    }

    public function registration()
    {
        echo "This is UserController, registration method";
    }

    public function authorization()
    {
        echo "This is UserController, authorization method";
    }

    public function show()
    {
        echo "This is UserController, show method";
    }

    public function delete()
    {
        echo "This is UserController, delete method";
    }
}
