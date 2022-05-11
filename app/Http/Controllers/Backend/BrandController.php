<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use App\Models\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand =Brand::latest()->get();
    
        return view('backend.brand.index', compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    		'brand_name_en' => 'required',
    		'brand_name_bn' => 'required',
    		'brand_image' => 'required',
    	],[
    		'brand_name_en.required' => 'Input Brand English Name',
    		'brand_name_bn.required' => 'Input Brand bndi Name',
    	]);

    	$image = $request->file('brand_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300)->save('uploads/brand/'.$name_gen);
    	$save_url = 'uploads/brand/'.$name_gen;

	Brand::insert([
		'brand_name_en' => $request->brand_name_en,
		'brand_name_bn' => $request->brand_name_bn,
		'brand_slug_en' => strtolower(str_replace(' ', '-',$request->brand_name_en)),
		'brand_slug_bn' => str_replace(' ', '-',$request->brand_name_bn),
		'brand_image' => $save_url,

    	]);

	    $notification = array(
			'message' => 'Brand Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $edit =Brand::findOrFail($id);
        // return response()->json('hello');
        return view('backend.brand.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    	$old_img = $request->old_image;

    	if ($request->file('brand_image')) {

    	unlink($old_img);
    	$image = $request->file('brand_image');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(300,300)->save('uploads/brand/'.$name_gen);
    	$save_url = 'uploads/brand/'.$name_gen;

	Brand::findOrFail($id)->update([
		'brand_name_en' => $request->brand_name_en,
		'brand_name_hin' => $request->brand_name_hin,
		'brand_slug_en' => strtolower(str_replace(' ', '-',$request->brand_name_en)),
		'brand_slug_hin' => str_replace(' ', '-',$request->brand_name_hin),
		'brand_image' => $save_url,

    	]);

	    $notification = array(
			'message' => 'Brand Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect('admin/brand')->with($notification);

    	}else{

    	Brand::findOrFail($id)->update([
		'brand_name_en' => $request->brand_name_en,
		'brand_name_bn' => $request->brand_name_bn,
		'brand_slug_en' => strtolower(str_replace(' ', '-',$request->brand_name_en)),
		'brand_slug_bn' => str_replace(' ', '-',$request->brand_name_bn),
		 

    	]);

	    $notification = array(
			'message' => 'Brand Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect('admin/brand')->with($notification);

    	} // end else 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
    	$img = $brand->brand_image;
    	unlink($img);

    	Brand::findOrFail($id)->delete();

    	 $notification = array(
			'message' => 'Brand Deleted Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
}
