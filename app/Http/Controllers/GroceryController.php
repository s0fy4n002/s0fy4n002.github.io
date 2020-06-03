<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grocery;
use App\Member;
use DataTables;

class GroceryController extends Controller
{
	public function index(){

		return view("grocery-home");

	}
	public function show(){

		$item = Grocery::all();
		if (request()->ajax()) {
			Response::json($item);
		}
		
		return view('data');

	}
    

	public function store(Request $request)
	{
		$grocery = new Grocery();
		$grocery->name = $request->name;
		$grocery->type = $request->type;
		$grocery->price = $request->price;

		$grocery->save();
		return response()->json(['success'=>'Data is successfully added']);
	}

	public function member(){
		$members = Member::all();
		return view('member')->with('members', $members);
	}

	public function insertMember(Request $request){
		$member = new Member;
		$member->name = $request->name;
		$member->age = $request->age;
		$member->email = $request->email;
		$member->address = $request->address;
		$member->save();
		return response()->json($member);
	}

	public function updateMember(Request $request){
		$member = Member::findOrFail($request->id);
		$member->name = $request->name;
		$member->age = $request->age;
		$member->email = $request->email;
		$member->address = $request->address;
		$member->save();
		return response()->json($member);
	}

	public function deleteMember(Request $request){
		Member::findOrFail($request->id)->delete();
		return response()->json();

	}

	public function ajaxindex(){
		return view('ajax.index');
	}

	public function ajaxshow(){

	}

	public function ajaxedit(){

	}

	public function ajaxdestroy(){

	}

	public function datable(){
		$model = Member::query();
		return DataTables::of($model)
		->addColumn('action', function($model){
			return view('layouts._action', [
				'model'	=> $model,
				'url_show' => route('ajax.show', $model->id),
				'url_edit' => route('ajax.edit', $model->id),
				'url_destroy' => route('ajax.destroy', $model->id),
			]);
		})
		->addIndexColumn()
		->rawColumns(['action'])
		->make(true);
	}
}
