<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BukuM;
use Illuminate\Support\Facades\Validator;

class BukuC extends Controller
{
    public function book(Request $req)
    {
    	$v = Validator::make($req->all(),[
    		'nama'=>'required',
    		'nama_barang'=>'required',
    		'stok'=>'required',
    		'id_kategori'=>'required'
    	]);
    	if ($v->fails()) {
    	   return Response()->json($v->errors());
    	}
    	$sv = BukuM::create([
    		'nama'=>$req->nama,
    		'id_barang.nama_barang'=>$req->nama_barang,
    		'id_stok.stok'=>$req->stok,
    		'id_kategori'=>$req->id_kategori
   		]);
    	if ($sv) {
    		return Response()->json(['status'=>true]);
    	}else{
    		return Response()->json(['status'=>false]);
    	}
	}
    public function upbook(Request $req, $id)
    {
        $v = Validator::make($req->all(),[
            'penerbit'=>'required',
            'judul'=>'required',
            'stok'=>'required',
            'id_kategori'=>'required'
        ]);
        if ($v->fails()) {
            return Response()->json($v->errors());
        }
        $chge = BukuM::where('id_buku',$id)->update([
            'penerbit'=>$req->penerbit,
            'judul'=>$req->judul,
            'stok'=>$req->stok,
            'id_kategori'=>$req->id_kategori
        ]);
        if ($chge) {
            return Response()->json(['status'=>true]);
        }else{
            return Response()->json(['status'=>false]);
        }
    }
    public function delbook($id)
    {
        $del = BukuM::where('id_buku',$id)->delete();
        if ($del) {
            return Response()->json(['status'=>true]);
        }else{
            return Response()->json(['status'=>false]);
        }
    }

    public function show()
    {
        $shw = BukuM::join('barang','penjual.id_barang','barang.id_barang')
        ->join('kategori','barang.id_barang','kategori.id_kategori')
        ->get();
        return Response()->json($shw);
    }
    public function cari_data($a){
        $shw=BukuM::join('barang','penjual.id_barang','barang.id_barang')
        ->join('kategori','barang.id_barang','kategori.id_kategori')
        ->where('nama', 'like' , '%'.$a.'%')
        ->get();
        return response()->json($shw);
    }
}