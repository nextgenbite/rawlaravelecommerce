<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsubcat =SubSubCategory::select('id',  'category_id', 'subcategory_id', 'subsubcategory_name_en')->latest()->get();
        $subcat =SubCategory::select('id', 'category_id', 'subcategory_name_en')->latest()->get();
       // return response()->json($subsubcat);
        $category =Category::orderBy('category_name_en','ASC')->get();

        return view('backend.category.subsubcategory.index', compact('subsubcat','subcat', 'category'));
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
    		'subsubcategory_name_en' => 'required',
    		'subsubcategory_name_bn' => 'required',
    		
    	],[
    		'subsubcategory_name_en.required' => 'Input Sub Sub Category English Name',
    		'subsubcategory_name_bn.required' => 'Input Sub Sub Category Bangla Name',
    	]);
        SubSubCategory::create([
            'category_id'            => $request->category_id,
            'subcategory_id'         => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ','-', $request->subsubcategory_name_bn),
        ]);
        $notification = array(
			'message' => 'Sub Category Inserted Successfully',
			'alert-type' => 'success'
		);
        return redirect()->back();
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
        $edit =SubSubCategory::findOrFail($id);
        $subcat =SubCategory::latest()->get();
       // return response()->json($subcat);
        $category =Category::orderBy('category_name_en','ASC')->get();

        return view('backend.category.subsubcategory.edit', compact('edit','subcat', 'category'));
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
        SubSubCategory::findOrFail($id)->update([
            'category_id'            => $request->category_id,
            'subcategory_id'         => $request->subcategory_id,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_bn' => $request->subsubcategory_name_bn,
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_bn' => str_replace(' ','-', $request->subsubcategory_name_bn),
        ]);
        $notification = array(
            'message' => 'Sub Sub-Category Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect(route('subsubcategory.index'))->with($notification); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subsubcategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Sub Sub-Category Delete Successfully',
            'alert-type' => 'danger'
        );

        return redirect(route('subsubcategory.index'))->with($notification); 
    }
    public function GetSubCategory($category_id)
    {
        
     	$subcat = SubCategory::where('category_id',$category_id)->select('id', 'subcategory_name_en')->orderBy('subcategory_name_en','ASC')->get();
     	return json_encode($subcat);
    }
    public function GetSubSubCategory($subcategory_id)
    {
        
     	$subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->select('id', 'subsubcategory_name_en')->orderBy('subsubcategory_name_en','ASC')->get();
        // return response()->json($subsubcat);
         return json_encode($subsubcat);
    }
}
