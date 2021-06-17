<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriMo;
use Illuminate\Support\Facades\Validator;


class KategoriCo extends Controller
{
    public function category(Request $req)
    {
    	$v = Validator::make($req->all(),[
    		'kategori'=>'required',
    	]);
    	if ($v->fails()) {
    		return Response()->json($v->errors());
    	}
    	$sv = KategoriMo::create([
    		'kategori'=>$req->kategori,
   		]);
    	if ($sv) {
    		return Response()->json(['status'=>true]);
    	}else{
    		return Response()->json(['status'=>false]);
    	}
	}
	public function upcategory(Request $req, $id)
	{
    	$v = Validator::make($req->all(),[
    		'kategori'=>'required',
    	]);
    	if ($v->fails()) {
    		return Response()->json($v->errors());
    	}
    	$chge = KategoriMo::where('id_kategori',$id)->update([
    		'kategori'=>$req->kategori,
    	]);
    	if ($chge) {
    		return Response()->json(['status'=>true]);
    	}else{
    		return Response()->json(['status'=>false]);
    	}
	}
	public function delcategory($id)
    {
    	$del = KategoriMo::where('id_kategori',$id)->delete();
    	if ($del) {
    		return Response()->json(['status'=>true]);
    	}else{
    		return Response()->json(['status'=>false]);
    	}
    }
        public function show()
    {
        $shw = KategoriMo::get();
        return Response()->json($shw);
    }
}
