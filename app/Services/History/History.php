<?php

namespace App\Services\History;

use App\Models\Task;
use App\Models\HistoryLog;

class History
{
    public function save($id, $data)
    {

        $task = Task::find($id);

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

        if($data['status_id'] != $task['status_id']) {

            $changes['task_id'] = $id;
            $changes['changing_column'] = 'status_id';
            $changes['before'] = $task['status_id'];
            $changes['after'] = $data['status_id'];

            HistoryLog::create($changes);
        }
    }
}

