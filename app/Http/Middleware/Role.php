<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
{
    protected $actions = [
        'get' => 'read',
        'post' => 'create',
        'create' => 'create',
        'put' => 'update',
        'update' => 'update',
        'patch' => 'update',
        'delete' => 'delete',
    ];

    public function handle($request, Closure $next, $do)
    {
        if (!$request->user()->hasRoleWith($this->action($request, $do))) {
            return response('Unauthorized.', 401);
        }
        return $next($request);
    }

    protected function action($request, $do)
    {
        $action = $this->actions[$request->route()->getActionMethod()];
        return $action . '-' . $do;
    }

}
