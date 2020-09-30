<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\all_document;
use App\Models\document_data;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $practice = all_document::distinct()->select('practice')->get();
        $count = all_document::count();
        return view('user.index',compact('practice','count'));
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function profile_update(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        if($request->hasFile('profile_image')){
            @unlink($user->profile_image);
            $image = $request->file('profile_image');
            $imageName = time().'.'.'png';
            $directory = 'assets/admin/images/users/';
            $imgUrl  = $directory.$imageName;
            Image::make($image)->save($imgUrl);
            $user->profile_image = $imgUrl;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->save();

        return back()->with('success','Profile Successfully Updated');



    }


    public function change_pass()
    {
        return view('user.changePass');
    }

    public function change_pass_save(Request $request)
    {
        $npass = $request->npass;
        $cpass = $request->cpass;

        if ($npass != $cpass) {
            return back()->with('alert','Password Not Match');
        }else{
            $user = User::where('id',Auth::user()->id)->first();
            $user->password = Hash::make($npass);
            $user->save();
            return back()->with('success','Password Successfully Changed');

        }

    }




}
