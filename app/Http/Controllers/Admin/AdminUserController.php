<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\all_document;
use App\Models\document_data;
use App\Models\User;
use App\Models\user_practice;
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
                return ' <a href="'.route('admin.edit.user',$all_users->id).'"> <button class="btn btn-success btn-info btn-sm" ><i class="fas fa-edit"></i> </button></a>
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
        $user_update->save();


//        $usr = user_practice::where('user_id',$request->user_edit)->delete();

        $data = $request->practiceid;
        for ($i=0;$i<count($data);$i++){

            $exist_data = user_practice::where('user_id',$user_update->id)->where('practice_name',$data[$i])->first();

            if (!$exist_data) {
                $new_npl = new user_practice();
                $new_npl->user_id = $user_update->id;
                $new_npl->practice_name = $data[$i];
                $new_npl->save();
            }

        }




        return back()->with('success','User Successfully Updated');

    }

    public function users_delete(Request $request)
    {
        $delete_user = User::where('id',$request->user_delete)->first();
        $delete_user->delete();
        return back()->with('success','User Successfully Deleted');
    }

    public function user_edit($id)
    {
        $practice = all_document::distinct()->select('practice')->get();
        $usr = User::where('id',$id)->first();
        return view('admin.user.userEdit',compact('practice','usr'));
    }

    public function user_pracice_dlete(Request $request)
    {
        $prac= user_practice::where('id',$request->id)->first();
        $prac->delete();
    }






}
