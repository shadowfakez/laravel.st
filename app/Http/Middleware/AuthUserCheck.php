<?php

namespace App\Http\Middleware;

use App\Models\Task;
use Auth;
use Closure;
use Illuminate\Http\Request;

class AuthUserCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $task = Task::find($request->task);

        if (Auth::user()->id !== $task->user->id) {
            return redirect(404);
        }
        return $next($request);
    }
}
