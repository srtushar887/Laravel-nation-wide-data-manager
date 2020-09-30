<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\all_document;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class UserDocumentController extends Controller
{
    public function demo()
    {

        $type = $request->type_name;
        $practice_name = $request->practice_name;

        $data = DB::table('all_documents')
            ->where('practice',$practice_name)
            ->where('type',$type)
            ->orderBy('dos','desc');


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($data){
            })
            ->editColumn('action',function ($data){


                $path = public_path('/assets/admin/pdffiles').'/'.$data->document_name.'.pdf';

                if (file_exists($path)) {
                    return '<a href="'.$path.'"  target="_blank">  <i class="far fa-file-pdf" style="font-size: 20px;padding-right: 5px;"></i></a>  |
                        <i class="far fa-edit" id="'.$data->id .'" onclick="editdata(this.id)" style="font-size: 20px;padding-left: 5px;" data-toggle="modal" data-target="#exampleModalCenter"></i>';
                }else{
                    return '<i class="far fa-file" style="font-size: 20px;padding-right: 5px;"></i> |
                        <i class="far fa-edit" style="font-size: 20px;padding-left: 5px;" id="'.$data->id .'" onclick="editdata(this.id)" data-toggle="modal" data-target="#exampleModalCenter"></i>';
                }
            })
            ->editColumn('dos',function ($data){
                return Carbon::parse($data->dos)->format('m/d/Y');
            })
            ->toJson();
    }


    public function get_practice_filter(Request $request)
    {
        $type = $request->type_name;
        $practice_name = $request->practice_name;

        $data = DB::table('all_documents')
            ->where('practice',$practice_name)
            ->where('type',$type)
            ->orderBy('dos','desc');


        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($data){
            })
            ->editColumn('action',function ($data){


                $path = public_path('/assets/admin/pdffiles').'/'.$data->document_name.'.pdf';

                if (file_exists($path)) {
                    return '<a href="'.$path.'"  target="_blank">  <i class="far fa-file-pdf" style="font-size: 20px;padding-right: 5px;"></i></a>  |
                        <i class="far fa-edit" id="'.$data->id .'" onclick="editdata(this.id)" style="font-size: 20px;padding-left: 5px;" data-toggle="modal" data-target="#exampleModalCenter"></i>';
                }else{
                    return '<i class="far fa-file" style="font-size: 20px;padding-right: 5px;"></i> |
                        <i class="far fa-edit" style="font-size: 20px;padding-left: 5px;" id="'.$data->id .'" onclick="editdata(this.id)" data-toggle="modal" data-target="#exampleModalCenter"></i>';
                }
            })
            ->editColumn('dos',function ($data){
                return Carbon::parse($data->dos)->format('m/d/Y');
            })
            ->toJson();



    }


    public function get_practice_by_search(Request $request)
    {
        $value = $request->search;

        $data = DB::table('all_documents')
            ->where('patient_name','LIKE',"%".$value."%")
            ->orWhere('account_number','LIKE',"%".$value."%")
            ->orWhere('document_name','LIKE',"%".$value."%")
            ->orWhere('status','LIKE',"%".$value."%")
            ->orWhere('type','LIKE',"%".$value."%")
            ->orderBy('dos','desc');

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action',function ($data){
            })
            ->editColumn('action',function ($data){


                $path = public_path('/assets/admin/pdffiles/').'/'.$data->document_name.'.pdf';

                if (file_exists($path)) {
                    return '<a href="'.$path.'"  target="_blank">  <i class="far fa-file-pdf" style="font-size: 20px;padding-right: 5px;"></i></a>  |
                        <i class="far fa-edit" id="'.$data->id .'" onclick="editdata(this.id)" style="font-size: 20px;padding-left: 5px;" data-toggle="modal" data-target="#exampleModalCenter"></i>';
                }else{
                    return '<i class="far fa-file" style="font-size: 20px;padding-right: 5px;"></i> |
                        <i class="far fa-edit" style="font-size: 20px;padding-left: 5px;" id="'.$data->id .'" onclick="editdata(this.id)" data-toggle="modal" data-target="#exampleModalCenter"></i>';
                }
            })
            ->editColumn('dos',function ($data){
                return Carbon::parse($data->dos)->format('m/d/Y');
            })
            ->toJson();


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
