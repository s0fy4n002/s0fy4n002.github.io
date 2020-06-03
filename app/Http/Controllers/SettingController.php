<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

	public function index(){

    	return view('admin.settings.setting')->with('setting', Setting::first());
    }

    public function update(Request $request, Setting $setting){
    	
    	$this->validate($request, [
    		'site_name' => 'required',
    		'contact_email' => 'required',
    		'contact_number' => 'required',
    		'address' => 'required',
    	]);
    	

    	$setting->update([
    		'site_name' => $request->site_name,
    		'contact_email' => $request->contact_email,
    		'contact_number' => $request->contact_number,
    		'address' => $request->address,
    	]);
    	if ($setting) {
    		session()->flash('success', 'Setting Updated');
    	}else{
    		session()->flash('error', 'Setting not Updated');
    	}
    	return redirect()->route('settings');


    }
}
