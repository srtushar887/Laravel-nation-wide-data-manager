<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\all_document;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserDocumentController extends Controller
{
    public function demo()
    {

        $data = DB::table('all_documents')->orderBy('id');
        return DataTables::of($data)
            ->addColumn('action',function ($data){
                return ' <button id="'.$data->id .'" onclick="useredit(this.id)" class="btn btn-success btn-sm" data-toggle="modal" data-target="#adminuseredit"><i class="fas fa-file-pdf"></i> </button> |
                        <button id="'.$data->id .'" onclick="userdelete(this.id)" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adminuserdelete"><i class="far fa-edit"></i> </button>';
            })
            ->make(true);
    }


    public function get_practice_filter(Request $request)
    {
        $type = $request->type_name;
        $practice_name = $request->practice_name;
        $from = Carbon::parse($request->from_date)->format('Y-m-d');
        $to = Carbon::parse($request->to_date)->format('Y-m-d');


        $data = DB::table('all_documents')
            ->where('practice',$practice_name)
            ->where('type',$type)
            ->where('dos','>=',$from)
            ->where('dos','<=',$to)
            ->orderBy('dos','desc');
        return DataTables::of($data)
            ->addColumn('action',function ($data){
            })
            ->editColumn('action',function ($data){
                $path = public_path().'/assets/admin/pdfiles/'.'/'.$data->document_name.'.pdf';
                if (file_exists($path)) {
                    return '<a href="'.asset('/public/assets/admin/pdfiles/').'/'.$data->document_name.'.pdf'.'"  target="_blank">  <i class="far fa-file-pdf" style="font-size: 20px;padding-right: 5px;"></i></a>  |
                        <i class="far fa-edit" id="'.$data->id .'" onclick="editdata(this.id)" style="font-size: 20px;padding-left: 5px;" data-toggle="modal" data-target="#userupdate"></i>';
                }else{
                    return '<i class="far fa-file" style="font-size: 20px;padding-right: 5px;"></i>  |
                        <i class="far fa-edit" style="font-size: 20px;padding-left: 5px;" id="'.$data->id .'" onclick="editdata(this.id)" data-toggle="modal" data-target="#userupdate"></i>';
                }
            })
            ->make(true);



    }


    public function get_single_data(Request $request)
    {
        $single = all_document::where('id',$request->id)->first();
        return $single;

    }

    public function update_data(Request $request)
    {
        $doc = all_document::where('id',$request->edit_id)->first();
        $doc->patient_name = $request->patient_name;
        $doc->account_number = $request->account_number;
        $doc->dos = Carbon::parse($request->dos)->format('m/d/Y');
        $doc->document_name = $request->document_name;
        $doc->status = $request->status;
        $doc->save();

        return back()->with('success','Data Successfully Updated');

    }



}
