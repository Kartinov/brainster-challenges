<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManageCommentMiddleware
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
        $comment = $request->route('comment'); // comment model

        abort_if(
            auth()->id() != $comment->user_id && !auth()->user()->isAdmin(),
            403
        );

        return $next($request);
    }
}
