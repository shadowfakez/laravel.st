<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        echo "This is HomeController,  index method";

        echo '<br>';

        /*$tasks = Status::find(1)->tasks;

        foreach ($tasks as $task) {
            echo $task->title;
        }

        echo '<br>';

        $task = Task::find(2);

        echo $task->status->name;*/

        $task = Task::find(5);

        foreach ($task->labels as $label) {

            echo $label->name . ' ' . $label->color . '<br>';
        }

        /*$label = Label::find(2);
        foreach ($label->tasks as $task) {
            echo $task->title . "<br>";
        }*/

        return view('home');
    }
}
