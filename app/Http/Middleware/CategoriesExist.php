<?php

namespace App\Http\Middleware;

use Closure;
use App\Categories;

class CategoriesExist
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Categories::all()->count() === 0) {

            session()->flash("error", "You have to create categories to be allow to create post");
            return redirect(route("categories.index"));

        }

        return $next($request);
    }
}
