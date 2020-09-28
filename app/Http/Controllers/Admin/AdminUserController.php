<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    public function users()
    {
        return view('admin.user.userList');
    }

    public function users_get()
    {
        $all_users = DB::table('users')->orderBy('id');
        return DataTables::of($all_users)
            ->addColumn('action',function ($all_users){
                return ' <button id="'.$all_users->id .'" onclick="useredit(this.id)" class="btn btn-success btn-info btn-sm" data-toggle="modal" data-target="#adminuseredit"><i class="fas fa-edit"></i> </button>
                        <button id="'.$all_users->id .'" onclick="userdelete(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#adminuserdelete"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function users_save(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','User Successfully Created');

    }

    public function users_single(Request $request)
    {
        $single_user = User::where('id',$request->id)->first();
        return $single_user;
    }

    public function users_update(Request $request)
    {
        $user_update = User::where('id',$request->user_edit)->first();
        $user_update->name = $request->name;
        $user_update->email = $request->email;
        if ($request->password != "" || $request->password != null) {
            $user_update->password = Hash::make($request->password);
        }
        $user_update->save();

        return back()->with('success','User Successfully Updated');

    }

    public function users_delete(Request $request)
    {
        $delete_user = User::where('id',$request->user_delete)->first();
        $delete_user->delete();
        return back()->with('success','User Successfully Deleted');
    }




}
