<?php

namespace App\Services\History;

use App\Models\Task;
use App\Models\HistoryLog;

class History
{
    public function save($id, $data)
    {

        $task = Task::find($id);

        $this->checkTitle($task, $data, $id);
        $this->checkContent($task, $data, $id);
        $this->checkStatus($task, $data, $id);
    }

    protected function checkTitle($task, $data, $id) {
        if($data['title'] !== $task['title']) {

            $changes['task_id'] = $id;
            $changes['changing_column'] = 'title';
            $changes['before'] = $task['title'];
            $changes['after'] = $data['title'];

            HistoryLog::create($changes);
        }
    }

    protected function checkContent($task, $data, $id) {
        if ($data['content'] !== $task['content']) {

            $changes['task_id'] = $id;
            $changes['changing_column'] = 'content';
            $changes['before'] = $task['content'];
            $changes['after'] = $data['content'];

            HistoryLog::create($changes);
        }
    }

    protected function checkStatus($task, $data, $id) {
        if($data['status_id'] != $task['status_id']) {

            $changes['task_id'] = $id;
            $changes['changing_column'] = 'status_id';
            $changes['before'] = $task['status_id'];
            $changes['after'] = $data['status_id'];

            HistoryLog::create($changes);
        }
    }
}

