<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcat =SubCategory::select('id', 'category_id', 'subcategory_name_en')->latest()->get();
      
        $category =Category::select('id', 'category_name_en')->orderBy('category_name_en','ASC')->get();

        return view('backend.subcategory.index', compact('subcat', 'category'));
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
    		'subcategory_name_en' => 'required',
    		'subcategory_name_bn' => 'required',
    		
    	],[
    		'subcategory_name_en.required' => 'Input Sub Category English Name',
    		'subcategory_name_bn.required' => 'Input Sub Category Bangla Name',
    	]);

	SubCategory::create([
        'category_id' => $request->category_id,
		'subcategory_name_en' => $request->subcategory_name_en,
		'subcategory_name_bn' => $request->subcategory_name_bn,
		'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
		'subcategory_slug_bn' => str_replace(' ', '-',$request->subcategory_name_bn),
    	]);

	    $notification = array(
			'message' => 'Sub Category Inserted Successfully',
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
        $category =Category::orderBy('category_name_en','ASC')->get();
        $edit=  SubCategory::findOrFail($id);

        return view('backend.subcategory.edit', compact('edit', 'category'));
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
        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_bn' => $request->subcategory_name_bn,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_bn' => str_replace(' ', '-',$request->subcategory_name_bn),
            ]);
    
            $notification = array(
                'message' => 'Sub Category Updated Successfully',
                'alert-type' => 'info'
            );
    
            return redirect(route('subcategory.index'))->with($notification); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::findOrFail($id)->delete($id);

    	$notification = array(
			'message' => 'Sub Category Deleted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
}
