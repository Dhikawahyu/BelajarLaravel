<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class A extends Controller
{
    public function tampil($a,$b)
    {
    	return "Hello World ".$a." ".$b;
    }
    public function input(Request $req)
    {
		return response()->json(['Nama'=>$req->input('nama'),
			'Kelas'=>$req->input('kelas'),
			'No Absen'=>$req->input('absen'),
			'Hobi'=>$req->input('hobi')]);
	}
	public function update(Request $req, $id)
	{
		return response()->json(['Nama'=>$req->input('nama'),
			'Kelas'=>$req->input('kelas'),
			'No Absen'=>$req->input('absen'),
			'Hobi'=>$req->input('hobi'),
			'id'=>$id]);
	}
	public function delete($id)
	{
		return response()->json(['idnya'=>$id]);
	}
}
