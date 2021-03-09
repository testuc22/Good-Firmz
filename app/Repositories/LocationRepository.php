<?php 
namespace App\Repositories;
use Illuminate\Http\Request;
use App\Models\{
	States,
	City
};
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\CommonHelper;

class LocationRepository{
	public function __construct(CommonHelper $common_helper){
        $this->common_helper = $common_helper;
    }
    public function getAllCities(){
    	return City::orderByDesc('id')->paginate(10);
    }
    public function getAllStates(){
    	return States::all();
    }

    public function cities(){
        return City::get();
    }

    public function get_cities_by_state($state_id){
    	return City::where('state_id',$state_id)->get();
    }
    public function city_options($cities){
    	$html = '';
    	foreach ($cities as $key => $city) {
    		$html .= '<option value="'.$city->id.'">'.$city->name.'</option>';
    	}
    	return $html;
    }
}
?>