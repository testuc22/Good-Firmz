<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
	States,City
};
use App\CommonHelper;
class StatesController extends Controller
{
    //

    public function __construct(CommonHelper $common_helper){
	    $this->middleware('auth:admin')->except(['all_locations_for_search']);
	    $this->common_helper = $common_helper;
	    
	}

	public function list_states(){
		$allStates = States::orderByDesc('id')->get();
		return view('admin.state.list')->with(['allStates'=>$allStates]);
	}
	public function add_state(){
		return view('admin.state.create');
	}
	public function save_state(Request $request){
		$request->validate([
        	'name'=>'required'
        ]);
        $data = array(
            'name'=>$request->name,
            'status'=>$request->has('status') ? 1 : 0
        );
        States::create($data);
        $this->common_helper->setFlashMessage($request,'State Created Successfully',"success");
        return redirect()->route('list-states');
	}
	public function edit_state(Request $request,$id){
		$state=States::find($id);
		return view('admin.state.edit')->with(['state'=>$state]);
	}
	public function update_state(Request $request,$id){
		$request->validate([
        	'name'=>'required'
        ]);
        $data = array(
            'name'=>$request->name,
            'status'=>$request->has('status') ? 1 : 0
        );
        $state=States::find($id);
        $state->update($data);
        $this->common_helper->setFlashMessage($request,'State Updated Successfully',"success");
        return redirect()->route('list-states');
	}
	public function delete_state(Request $request,$id){
		States::find($id)->delete($id);
		$this->common_helper->setFlashMessage($request,'State deleted Successfully',"success");
        return redirect()->route('list-states');
	}
	public function change_state_status(Request $request){
		States::find($request->state)->update(['status'=>$request->status]);
        return response(['message'=>'Status Updated Successfully',200]);
	}

	public function all_locations_for_search(){
		$states = States::select('name')->where('status',1)->get();
		$cities = City::select('name')->where('status',1)->get();

		$locations = array();
		$locations = $states->map(function($state){
			return $state->name;
		});

		$citiesName = $cities->map(function($city){
			return $city->name;
		});
		// $locations = array_merge($locations,$citiesName);

		$locations = $locations->merge($citiesName);
		return response(['message'=>'success','locations'=>$locations,200]);
	}
}
