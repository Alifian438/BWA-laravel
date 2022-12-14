<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use App\Models\ManagementAccess\Role;
use Illuminate\Support\Facades\Gate;


class AuthGates
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
        //get all user by session browser
        $user = \Auth::user();

        //checking validation middleware (validasi apakah aplikasi kita jalan apa tidak)
        if (!app()->runningInConsole() && $user) {
            $roles = Role::with('permission')->get();
            $permissionsArray = [];

            foreach ($roles as $role) {
                foreach ($role->$permission as $permissions){
                    $permissionsArray[$permissions->tittle] []= $role->id;
                }
            }

            //check user role
            foreach ($permissionsArray as $title => $roles){
                Gate::define($title, function(\App\Models\User $user)
                use ($roles) {
                    return count(array_intersect($user->role->pluck('id')
                    ->toArray(), $roles)) > 0;
                });

            }

        }

        //return all middleware
        return $next($request);
    }
}
