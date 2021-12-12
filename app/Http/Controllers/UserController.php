<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();

        return view('users.index', ['users' => $users]);
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

   public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Удалено');
    }

}
