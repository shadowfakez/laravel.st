<?php

namespace App\Http\Controllers;

use App\Facades\Comment;
use App\Facades\FileDelete;
use App\Facades\History;
use App\Facades\FileHandle;
use App\Facades\TGBot;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Comments;
use App\Models\Label;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = Task::orderBy('id', 'desc')->paginate(2);
        $statuses = Status::get();

        return view('tasks.index', ['tasks' => $tasks, 'statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if (Auth::check()) {
            $statuses = Status::get();

            $labels = Label::get();

            return view('tasks.create', ['statuses' => $statuses, 'labels' => $labels]);
        }
        return redirect(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(TaskRequest $request)
    {
        $data = $request->all();

        $data['file'] = FileHandle::addFile($request);

        $data['creator_id'] = Auth::user()->id;

        $task = Task::create($data);

        $task->labels()->sync($request->labels);


        TGBot::sendMessage($task);

        return redirect()->route('task.index')->with('success', 'New task was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function show($id)
    {
        $task = Task::find($id);
        if (Auth::check() and Auth::user()->hasRole('admin') or $task->user->id == Auth::user()->id) {

            $comments = Comments::where('task_id', $id)->orderBy('id', 'desc')->get();
            $statuses = Status::get();

            return view('tasks.show', ['task' => $task, 'statuses' => $statuses, 'comments' => $comments]);
        }
        return redirect(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $task = Task::find($id);
        if (Auth::check() and Auth::user()->hasRole('admin') or $task->user->id == Auth::user()->id) {
            $statuses = Status::get();
            $labels = Label::get();

            return view('tasks.edit', compact('task', 'statuses', 'labels'));
        }
        return redirect(404);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(TaskRequest $request, $id)
    {
        $task = Task::find($id);

        $data = $request->all();

        $data['file'] = FileHandle::addFile($request);

        History::save($id, $data);

        $task->update($data);
        $task->labels()->sync($request->labels);

        return redirect()->route('task.index')->with('success', 'Изменения сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $task = Task::find($id);
        Storage::delete('public/uploaded_files/' . $task['file']);
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Статья удалена');
    }

    public function comment(CommentRequest $request, $id)
    {

        Comment::addComment($request, $id);

        return redirect()->back()->with('success', 'New comment was added successfully');
    }

    public function deleteFile($id)
    {
        FileDelete::delete($id);

        return back();
    }

}
