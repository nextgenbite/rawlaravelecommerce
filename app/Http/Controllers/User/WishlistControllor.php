<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;
class WishlistControllor extends Controller
{
    public function Addtowishlist(Request $request, $id)
    {
        if (Auth::check()) {

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$id)->first();

            if (!$exists) {
               Wishlist::create([
                'user_id' => Auth::id(), 
                'product_id' => $id,
            ]);
           return response()->json(['success' => 'Successfully Added On Your Wishlist']);

            }else{

                return response()->json(['error' => 'This Product has Already on Your Wishlist']);

            }            
            
        }else{

            return response()->json(['error' => 'At First Login Your Account']);

        }
    }
    public function wishlist()
    {
        
        return view('Frontend.wishlist.wishlist');
    }
    public function getwishlist()
    {
        $wishlist= Wishlist::where('user_id',Auth::id())->with('product')->get();
        return response()->json($wishlist);
    }
    public function removewishlist($id)
    {
        Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully Product Remove']);
    }
}
