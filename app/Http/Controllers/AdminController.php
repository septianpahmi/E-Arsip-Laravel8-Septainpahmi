<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    function index(){
        $data = User::all();
        return view('admin.index', compact('data'));
    }
    function kelola(){
        $data = User::all();
        return view('admin.auth.kelolauser', compact('data'));
    }
    function adduser(Request $request){
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt ($request->password);
        $data->role = $request->role;
        $data->save();
        return redirect()->back();
    }
    function deluser($id){
        $data = User::find($id);
        $data->delete();
        return redirect()->back();
    }
    function editprofil(){
        $data = User::all();
        return view('admin.auth.edituser', compact('data'));
    }
    function saveprofil(Request $request, $id){
        $data=User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $photo=$request->file('file');
        if($photo){
            $photoname=time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('profile'), $photoname);
            $data->photo=$photoname;
        }
        $data->save();
        return redirect()->back();
    }

    function uploadfile(){
        $data = File::all();
        return view('admin.auth.uploadfile', compact('data'));
    }

    function savefile(Request $request){
        // $this->validate($request,[
        //     'name_file' => 'required',
        //     'dokumen' => 'mimes:doc,docx,pdf,xls,xlsx,ppt,pptx'
        // ]);
        $data = new File;
        $data->name_file = $request->name;        
        $dokumen = $request->file;
            $nama_dokumen=time().'.'.$dokumen->getClientOriginalExtension();
            $request->file->move('dokumen',$nama_dokumen);
            $data->dokumen=$nama_dokumen;
            $data->save();
            return redirect()->back();
    }

    function delfile($id){
        $data=File::find($id);
        $data->delete();
        return redirect()->back();
    }

    function file(){
    $data=File::all();
    return view('admin.auth.file', compact('data'));
    }

    function editfile(Request $request, $id){
        $data = File::find($id);
        $data->name_file = $request->name;
        $data->save();
        return redirect()->back();
    }
}
