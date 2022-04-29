<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Image;
use App\Models\Multi_image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index =Product::latest()->get();
       return view('backend.product.index', compact('index'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand =Brand::select('brand_name_en', 'id')->orderBy('brand_name_en', 'ASC')->get();
        $cat =category::select('category_name_en', 'id')->orderBy('category_name_en', 'ASC')->get();
        //return response()->json($cat);
        return view('backend.product.create', compact('cat', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    return response()->json($request->all());

    	$image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
    	$save_url = 'uploads/products/thambnail/'.$name_gen;

        $product_id= Product::insertGetId([
		'brand_id' => $request->brand_id,
		'category_id' => $request->category_id,
		'subcategory_id' => $request->subcategory_id,
		'subsubcategory_id' => $request->subsubcategory_id,
		'product_name_en' => $request->product_name_en,
		'product_name_bn' => $request->product_name_bn,
		'product_slug_en' => strtolower(str_replace(' ', '-',$request->product_name_en)),
		'product_slug_bn' => str_replace(' ', '-',$request->product_name_bn),
		'product_code' => $request->product_code,
		'product_qty' => $request->product_qty,
		'product_tags_en' => $request->product_tags_en,
		'product_tags_bn' => $request->product_tags_bn,
		'product_size_en' => $request->product_size_en,
		'product_size_bn' => $request->product_size_bn,
		'product_color_en' => $request->product_color_en,
		'product_color_bn' => $request->product_color_bn,
		'selling_price' => $request->selling_price,
		'discount_price' => $request->discount_price,
		'short_descp_en' => $request->short_descp_en,
		'short_descp_bn' => $request->short_descp_bn,
		'long_descp_en' => $request->long_descp_en,
		'long_descp_bn' => $request->long_descp_bn,
		'short_descp_en' => $request->short_descp_en,
		'short_descp_bn' => $request->short_descp_bn,
		'product_thambnail' => $save_url,
		'hot_deals' => $request->hot_deals,
		'featured' => $request->featured,
		'special_offer' => $request->special_offer,
		'special_deals' => $request->special_deals,
		'status' => 1,

    	]);

        $images = $request->file('multi_img');
        foreach ($images as $key => $img) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('uploads/products/multi_img/'.$name_gen);
    	$uploadPath = 'uploads/products/multi_img/'.$name_gen;
            Multi_image::create([
                'product_id' => $product_id,
                'photo_name' => $uploadPath,
            ]);
            
        } 

	    $notification = array(
			'message' => 'Product Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect(route('product.index'))->with($notification);
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
        $edit =Product::findOrFail($id);
        $brand =Brand::select('brand_name_en', 'id')->orderBy('brand_name_en', 'ASC')->get();
        $cat =category::select('category_name_en', 'id')->orderBy('category_name_en', 'ASC')->get();
        return view('backend.product.create', compact('edit', 'cat', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id =0)
    {
        // return response()->json($request->all());
        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
    	$save_url = 'uploads/products/thambnail/'.$name_gen;

        $product = Product::findOrNew($id);
        $product->fill($request->all());
        $product->product_thambnail = $save_url;
        $product->save();
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
