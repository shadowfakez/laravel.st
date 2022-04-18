<?php

namespace App\Services\FileHandle;

use App\Models\Task;
use Illuminate\Support\Facades\Storage;

class FileDelete
{

    public function delete($id)
    {
        $task = Task::find($id);
        Storage::delete('public/uploaded_files/' . $task['file']);
        $task['file'] = null;
        $task->update();
    }

}
