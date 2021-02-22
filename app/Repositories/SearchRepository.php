<?php 
namespace App\Repositories;

use Session;
use App\Models\{
    Sellers
};
use App\CommonHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class SearchRepository{


	public function __construct(CommonHelper $common_helper){
        $this->common_helper = $common_helper;
    }
    public function search_listings($request){
        $location = $request->location;
        $keyword = $request->keyword;

        $searchQuery = Sellers::select('*');
        if($keyword!=""){
            $searchQuery = $searchQuery->where('name','like','%'.$keyword.'%')
                                       ->orWhere('desc','like','%'.$keyword.'%')
                                       ->orWhere('email','like','%'.$keyword.'%')
                                       ->orWhere('address1','like','%'.$keyword.'%')
                                       ->orWhere('address2','like','%'.$keyword.'%')
                                       ->orWhere('website','like','%'.$keyword.'%');
        }
        if($location!=""){
            $searchQuery = $searchQuery->whereHas('state',function(Builder $query) use ($location){
                $query->where('name','like','%'.$location.'%');
            });
            $searchQuery = $searchQuery->orWhereHas('city',function(Builder $query) use ($location){
                $query->where('name','like','%'.$location.'%');
            });
        }

        
        $searchQuery = $searchQuery->get();
        return $searchQuery;
    }
}