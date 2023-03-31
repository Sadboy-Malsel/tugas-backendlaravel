<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
   public function getmahasiswa()
   {
        $dt_mahasiswa=mahasiswa::get();
        return response()->json($dt_mahasiswa);
   }
   public function getid($id)
   {
      $dt_mahasiswa=mahasiswa::where('id','=',$id)->get();
      return response()->json($dt_mahasiswa);
   }
   public function createmahasiswa(Request $req){
      $validate = Validator::make($req->all(),[
          'nama'=>'required',
          'alamat'=>'required',
          'jeniskelamin'=>'required',
          'id_jurusan'=>'required',

      ]);
      if($validate->fails()){
          return response()->json($validate->errors()->toJson());
      }
      $create = Mahasiswa::create([
          'nama'=>$req->nama,
          'alamat'=>$req->alamat,
          'jeniskelamin'=>$req->jeniskelamin,
          'id_jurusan'=>$req->id_jurusan
      ]);
      if($create){
          return response()->json(['status'=>true, 'message'=>'Sukses menambah data mahasiswa.']);
      }else{
          return response()->json(['status'=>false, 'message'=>'Gagal menambah data mahasiswa.']);
      }
   }
   public function updatemahasiswa(Request $req, $id){
      $validate = Validator::make($req->all(),[
          'nama'=>'required',
          'alamat'=>'required',
          'jeniskelamin'=>'required',
          'id_jurusan'=>'required',
   
      ]);
      if($validate->fails()){
          return response()->json($validate->errors()->toJson());
      }
      $update = Mahasiswa::where('id',$id)->update([
          'nama'=>$req->get('nama'),
          'alamat'=>$req->get('alamat'),
          'jeniskelamin'=>$req->get('jeniskelamin'),
          'id_jurusan'=>$req->get('id_jurusan'),
      ]);
      if($update){
          return response()->json(['status'=>true, 'message'=>'Sukses merubah data mahasiswa.']);
      }else{
          return response()->json(['status'=>false, 'message'=>'Gagal merubah data mahasiswa.']);
      }
   }
   public function deletemahasiswa($id){
      $delete = mahasiswa::where('id',$id)->delete();
      if($delete){
         return response()->json(['status'=>true, 'message'=>'Sukses menghapus data mahasiswa.']);
      }else{
         return response()->json(['status'=>false, 'message'=>'Gagal menghapus data mahasiswa.']);
     }
   }
}