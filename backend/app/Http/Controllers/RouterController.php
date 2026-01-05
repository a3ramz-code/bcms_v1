<?php

namespace App\Http\Controllers;

use App\Jobs\SyncMikrotikRouterJob;
use App\Models\Router;
use Illuminate\Http\Request;

class RouterController extends Controller
{
    public function index() { return Router::paginate(); }

    public function store(Request $r)
    {
        $router = Router::create($r->validate(['company_id'=>'required|integer','name'=>'required','host'=>'required']));
        SyncMikrotikRouterJob::dispatch($router->id);
        return $router;
    }

    public function show(Router $router) { return $router; }
    public function update(Request $r, Router $router) { $router->update($r->all()); return $router; }
    public function destroy(Router $router) { $router->delete(); return response()->noContent(); }
}
