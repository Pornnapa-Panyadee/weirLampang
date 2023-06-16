<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use AuthenticatesUsers;
use App\Models\Location;

class LocationController extends Controller
{
    public function locationCR(){

        $districtData['data'] = Location::getDistrictCR();
        // dd($districtData);
        return view('form/form', compact('districtData'));
    }

    public function getDistrict($vill_provinceid=0){
      header('Access-Control-Allow-Origin: *');
      header('Access-Control-Allow-Methods: *');
      header('Access-Control-Allow-Headers: *');
      $userData['data'] = Location::getprovinceDistrict($vill_provinceid);        
      echo json_encode($userData);
      exit;
  }

  // Fetch tumbol
  public function getTumbol($vill_districtid=0){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Headers: *');
    // Fetch Employees by Departmentid
    $userData['data'] = Location::getdistrictTumbol($vill_districtid);        
    echo json_encode($userData);
    exit;
  }

  public function getVillage($vill_districtid=0,$vill_tumbolid=0){
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Headers: *');
    // Fetch Employees by Departmentid
    $userVill['data'] = Location::gettumbolVillage($vill_districtid,$vill_tumbolid); 

    echo json_encode($userVill);
    exit;
  }
}
