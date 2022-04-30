<?php

namespace App\Services\Comment;

use App\Models\Comments;
use Illuminate\Support\Facades\Auth;

class Comment
{
    public function addComment($request, $id)
    {
        $data = $request->all();
        $data['task_id'] = $id;
        $data['user_id'] = Auth::user()->id;
        Comments::create($data);
    }
}
