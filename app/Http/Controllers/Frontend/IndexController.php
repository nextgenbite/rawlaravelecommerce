<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    { 
      $featured =Product::whereFeatured('1')->select('id','product_name_en','product_thambnail', 'selling_price')->whereStatus('1')->latest()->get();
      $newAllproduct =Product::select('id','product_name_en','product_thambnail', 'selling_price')->whereStatus('1')->latest()->limit(10)->get();
       return view('Frontend.index', compact('featured', 'newAllproduct'));
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
}
