<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriM;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class KategoriC extends Controller
{
    public function category(Request $req)
    {
    	$v = Validator::make($req->all(),[
            'nama_barang'=>'required',
            'stok'=>'required',
            'id_kategori'=>'required'
        ]);
        if ($v->fails()) {
            $data['status']=false;
            $data['message']=$v->errors();
           return Response()->json($data);
        }
        $sv = KategoriM::create([
            'nama_barang'=>$req->nama_barang,
            'stok'=>$req->stok,
            'id_kategori'=>$req->id_kategori
        ]);
        if ($sv) {
            return Response()->json(['status'=>true]);
        }else{
            return Response()->json(['status'=>false]);
        }
	}

    public function editpen(Request $req, $id){
        $v = Validator::make($req->all(),[
            'nama_barang'=>'required',
            'stok'=>'required',
            'id_kategori'=>'required'
        ]);
        if ($v->fails()) {
            $data['status']=false;
            $data['message']=$v->errors();
           return Response()->json($data);
        }
        $sv = KategoriM::where('id_barang',$id)->update([
            'nama_barang'=>$req->nama_barang,
            'stok'=>$req->stok,
            'id_kategori'=>$req->id_kategori
        ]);
        if ($sv) {
            return Response()->json(['status'=>true]);
        }else{
            return Response()->json(['status'=>false]);
        }
    }

    public function deletepen(Request $req, $id){
        $del = KategoriM::where('id_barang',$id)->delete();
        if ($del) {
            return Response()->json(['status'=>true]);
        }else{
            return Response()->json(['status'=>false]);
        }
    }

    public function detail($id)
    {
        $v = KategoriM::where('id_barang',$id)->first();
        return Response()->json($v);
    }
    public function show()
    {
        $shw = KategoriM::join('kategori','barang.id_kategori','kategori.id_kategori')
        ->get();
        return Response()->json($shw);
    }
    public function cari_data($a){
        $shw=KategoriM::join('kategori','barang.id_kategori','kategori.id_kategori')
        ->where('nama_barang', 'like' , '%'.$a.'%')
        ->get();
        return response()->json($shw);
    }
}