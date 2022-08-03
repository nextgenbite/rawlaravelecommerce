<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Multi_image;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    { $categories =Category::select('id', 'category_name_en', 'category_name_bn')->latest()->get();
      $sliders =Slider::whereStatus('1')->latest()->get();
      $featured =Product::whereFeatured('1')->select('id','product_name_en','product_name_bn', 'product_slug_en','product_slug_bn','product_thambnail', 'selling_price', 'discount_price')->whereStatus('1')->latest()->get();
      $newAllproduct =Product::select('id','product_name_en', 'product_name_bn','product_slug_en','product_slug_bn', 'product_thambnail', 'selling_price','discount_price')->whereStatus('1')->latest()->limit(10)->get();
       return view('Frontend.index', compact('featured', 'newAllproduct', 'sliders', 'categories'));
    }

    public function ProfileUpdate(Request $request)
    {
      $id = Auth::user()->id;
      $data = User::find($id);
		$data->name = $request->name;
		$data->email = $request->email;
		$data->phone = $request->phone;


		if ($request->file('profile_photo_path')) {
			$file = $request->file('profile_photo_path');
			@unlink(public_path('uploads/user_images/'.$data->profile_photo_path));
			$filename = time().$file->getClientOriginalName();
			$file->move(public_path('uploads/user_images'),$filename);
			$data['profile_photo_path'] = $filename;
		}
        // return response()->json($data);
		$data->save();
       return redirect('dashboard');
    }

    public function UserLogout()
    {
       Auth::logout();
       return redirect('/');
    }
    public function ChangePassword()
    {
      return view('profile.change_password');
    }
    public function userPasswordUpdate(Request $request)
    {
      $validateData = $request->validate([
			'oldpassword' => 'required',
			'password' => 'required|confirmed',
		]);

		$hashedPassword = Auth::user()->password;
		if (Hash::check($request->oldpassword,$hashedPassword)) {
			$user = User::find(Auth::id());
			$user->password = Hash::make($request->password);
			$user->save();
			Auth::logout();
			return redirect()->route('user.logout');
		}else{
			return redirect()->back();
		}
    }

    public function ProductDetails($id,$slug)
    {
      $p_details =Product::whereId($id)
      ->whereStatus('1')
      ->first();
      $color_en = $p_details->product_color_en;
      $product_color_en = explode(',', $color_en);
      $size_en = $p_details->product_size_en;
      $product_size_en = explode(',', $size_en);

        $imgs =Multi_image::whereProduct_id($id)->get();

      // return response()->json( $size_en);
      return view('Frontend.product.productdetails', compact('p_details', 'imgs', 'product_color_en','product_size_en'));
    }
    /// Product View With Ajax
	public function ProductViewAjax($id){
		$product = Product::with('category','brand')->findOrFail($id);

		$color = $product->product_color_en;
		$product_color = explode(',', $color);

		$size = $product->product_size_en;
		$product_size = explode(',', $size);

		return response()->json(array(
			'product' => $product,
			'color' => $product_color,
			'size' => $product_size,

		));

	} // end method 
  public function SubCatWiseProduct($sub_id, $slug)
  {
    $products = Product::whereStatus(1)->whereSubcategory_id($sub_id)->with('category', 'brand')->get();
    $categories = Category::all();
    $brands = Brand::all();
    return view('Frontend.product.subcategory_view', compact('products','categories', 'brands' ));
  }
  public function SubSubCatWiseProduct($sub_id, $slug)
  {
    $products = Product::whereStatus(1)->whereSubsubcategory_id($sub_id)->with('category', 'brand')->get();
    // return response()->json($products);
    $categories = Category::all();
    $brands = Brand::all();
    return view('Frontend.product.sub_subcategory_view', compact('products','categories', 'brands' ));
  }
}
