<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home');
    }
    /**
     * @param Request $requests
     */
    public function setVanzator(Request $request){
        $id = (int)$request->id;
        $user = User::find($id);
        $user->givePermissionTo('vanzator_perms');
        //$user->revokePermissionTo('vanzator_perms');
    }

    public function deleteVanzator(Request $request){
        $id = (int)$request->id;
        $user = User::find($id);
        $user->revokePermissionTo('vanzator_perms');
    }
}
