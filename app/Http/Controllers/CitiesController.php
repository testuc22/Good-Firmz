<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\CommonHelper;
use App\Repositories\{
	LocationRepository
};

class CitiesController extends Controller{
 	public function __construct(CommonHelper $common_helper,LocationRepository $location_repository){
	    $this->middleware('auth:admin')->except('get_cities_by_state');
	    $this->common_helper = $common_helper;
	    $this->location_repository = $location_repository;
	}
	public function list_cities(){
		$allCities = $this->location_repository->getAllCities();
		return view('admin.cities.list')->with(['allCities'=>$allCities]);
	}

	public function add_city(){
		$allStates = $this->location_repository->getAllStates();
		return view('admin.cities.create')->with(['allStates'=>$allStates]);
	}
	public function save_city(Request $request){
		$request->validate([
        	'name'=>'required',
        	'state_id'=>'required'
        ]);
        $data = array(
            'name'=>$request->name,
            'state_id'=>$request->state_id,
            'status'=>$request->has('status') ? 1 : 0
        );
        City::create($data);
        $this->common_helper->setFlashMessage($request,'City Created Successfully',"success");
        return redirect()->route('list-cities');
	}
	public function edit_city(Request $request,$id){
		$city=City::find($id);
		$allStates = $this->location_repository->getAllStates();
		return view('admin.cities.edit')->with(['city'=>$city,'allStates'=>$allStates]);
	}
	public function update_city(Request $request,$id){
		$request->validate([
        	'name'=>'required',
        	'state_id'=>'required'
        ]);
        $data = array(
            'name'=>$request->name,
            'state_id'=>$request->state_id,
            'status'=>$request->has('status') ? 1 : 0
        );
        $city=City::find($id);
        $city->update($data);
        $this->common_helper->setFlashMessage($request,'City Updated Successfully',"success");
        return redirect()->route('list-cities');
	}
	public function delete_city(Request $request,$id){
		City::find($id)->delete($id);
		$this->common_helper->setFlashMessage($request,'City deleted Successfully',"success");
        return redirect()->route('list-cities');
	}
	public function change_city_status(Request $request){
		City::find($request->city)->update(['status'=>$request->status]);
        return response(['message'=>'Status Updated Successfully',200]);
	}
	public function get_cities_by_state(Request $request){
		$cities = $this->location_repository->get_cities_by_state($request->state);
		$city_options = $this->location_repository->city_options($cities);
		// $this->common_helper->setFlashMessage($request,'Cities fetched Successfully',"success");
        return response(['message'=>'Cities fetched Successfully','html'=>$city_options,200]);
	}
}
