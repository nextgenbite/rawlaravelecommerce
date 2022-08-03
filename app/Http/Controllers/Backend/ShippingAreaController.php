<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;

class ShippingAreaController extends Controller
{
     ////////////////// Ship Division //////////
    public function divisionView()
    {
        $sVisions =ShipDivision::latest()->get();
        return view('Backend.ship.division', compact('sVisions'));
    }
    public function divisionStore(Request $request)
    {
       ShipDivision::create($request->all());

        $notification = array(
			'message' => 'Ship Division Inserted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }
    public function divisionEdit($id)
    {
        $edit =ShipDivision::findOrFail($id);
        return view('Backend.ship.division-edit', compact('edit'));
    }
    public function divisionUpdate(Request $request, $id)
    {
       ShipDivision::findOrFail($id)->update($request->all());

        $notification = array(
			'message' => 'Ship Division Updated',
			'alert-type' => 'info'
		);
        return redirect(Route('division.view'))->with($notification);
    }
    
    public function divisionDestroy($id)
    {
        ShipDivision::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'Division Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
 
    }
    //// End Ship Division

     ////////////////// Ship State //////////
    public function stateView()
    {
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::orderBy('id','DESC')->get();
        $state = ShipState::with('division', 'district')->orderBy('id','DESC')->get();
        return view('Backend.ship.state.index', compact('division', 'district', 'state'));
    }
    public function stateStore(Request $request)
    {
        $request->validate([
    		'division_id' => 'required',  
    		'district_id' => 'required',  
    		'state_name' => 'required',  	 
    	 
    	]);
        ShipState::create($request->all());

        $notification = array(
			'message' => 'Ship State Inserted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }
    public function stateEdit($id)
    {
        $edit =ShipState::findOrFail($id);
        $division = ShipDivision::findOrFail($id)->orderBy('division_name','ASC')->get();
        return view('Backend.ship.state.edit', compact('edit', 'division'));
    }
    public function stateUpdate(Request $request, $id)
    {
       ShipState::findOrFail($id)->update($request->all());

        $notification = array(
			'message' => 'Ship State Updated',
			'alert-type' => 'info'
		);
        return redirect(Route('state.view'))->with($notification);
    }
    
    public function stateDestroy($id)
    {
        ShipState::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'district Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
 
    }
    //// End Ship District
     ////////////////// Ship District //////////
    public function districtView()
    {
        $division = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::with('division')->orderBy('id','DESC')->get();
        return view('Backend.ship.district', compact('division', 'district'));
    }
    public function districtStore(Request $request)
    {
        $request->validate([
    		'division_id' => 'required',  
    		'district_name' => 'required',  	 
    	 
    	]);
        ShipDistrict::create($request->all());

        $notification = array(
			'message' => 'Ship district Inserted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }
    public function districtEdit($id)
    {
        $edit =ShipDistrict::findOrFail($id);
        return view('Backend.ship.district-edit', compact('edit'));
    }
    public function districtUpdate(Request $request, $id)
    {
       ShipDistrict::findOrFail($id)->update($request->all());

        $notification = array(
			'message' => 'Ship district Updated',
			'alert-type' => 'info'
		);
        return redirect(Route('district.view'))->with($notification);
    }
    
    public function districtDestroy($id)
    {
        ShipDistrict::findOrFail($id)->delete();

    	$notification = array(
			'message' => 'district Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
 
    }
    //// End Ship State
   
}
