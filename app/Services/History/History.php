<?php

namespace App\Services\History;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\HistoryLog;

class History
{
    public function test($id, $data)
    {

        $task = Task::find($id);

        //dd($data->status);
        //dd($task->status->id);
/*        $changes['task_id'] = $id;
        $changes['changing_column'] = $data['title'];
        $changes['before'] = $task['content'];
        $changes['after'] = $data['content'];*/

        // изменения в title

        if($data['title'] !== $task['title']) {

            $changes['task_id'] = $id;
            $changes['changing_column'] = 'title';
            $changes['before'] = $task['title'];
            $changes['after'] = $data['title'];

            HistoryLog::create($changes);
        }

        if ($data['content'] !== $task['content']) {

            $changes['task_id'] = $id;
            $changes['changing_column'] = 'content';
            $changes['before'] = $task['content'];
            $changes['after'] = $data['content'];

            HistoryLog::create($changes);
        }

        if($data['status_id'] !== $task->status->id) {

            $changes['task_id'] = $id;
            $changes['changing_column'] = 'status_id';
            $changes['before'] = $task->status->id;
            $changes['after'] = $data['status_id'];

            HistoryLog::create($changes);
        }


    }
}
/* data = ["title" => "1"
        "content" => "13"
        "status_id" => "1"]*/
