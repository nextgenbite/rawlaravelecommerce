<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $index = Slider::all();
        return view('backend.slider.index', compact('index'));
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
        $image = $request->file('slider_img');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
    	$save_url = 'uploads/slider/'.$name_gen;

        $img =  Slider::create([
            'slider_img' => $save_url,
            'title' => $request->title,
            'description' => $request->description,
            ]);
        $notification = array(
			'message' => 'Slider Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect(route('slider.index'))->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $edit =Slider::findOrFail($id);
       return view('backend.slider.edit', compact('edit'));
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
        if ($request->file('slider_img')) {
            unlink($request->old_image);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('uploads/slider/'.$name_gen);
            $save_url = 'uploads/slider/'.$name_gen;
    
                Slider::findOrFail($id)->update([
                'slider_img' => $save_url,
                'title' => $request->title,
                'description' => $request->description,
                
                ]);
            $notification = array(
                'message' => 'Slider Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect(route('slider.index'))->with($notification);
        }else{
            Slider::findOrFail($id)->update([
                'slider_img' => $request->old_image,
                'title' => $request->title,
                'description' => $request->description,
                ]);
            $notification = array(
                'message' => 'Slider Inserted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect(route('slider.index'))->with($notification);

        }
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
    public function sliderActive($id)
    {
        Slider::findOrFail($id)->update([
           
            'status' => 1,
            
            ]);
        $notification = array(
            'message' => 'Slider Activated Successfully',
            'alert-type' => 'info'
        );

        return redirect(route('slider.index'))->with($notification);
    }
    public function sliderInactive($id)
    {
        Slider::findOrFail($id)->update([
           
            'status' => 0,
            
            ]);
        $notification = array(
            'message' => 'Slider Deactivated Successfully',
            'alert-type' => 'info'
        );

        return redirect(route('slider.index'))->with($notification);
    }


}
