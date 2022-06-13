<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
   
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index',compact('testimonials'));
    }

   

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'comments' => 'required',
            'photopath' => 'required',
        ]);	   	
            //file name with extentsion
            $filenameWithExt_image=$request->file('photopath')->getClientOriginalName();
            //only file name
            $filename_image=pathinfo($filenameWithExt_image,PATHINFO_FILENAME);
            //only extension
            $extension_image=$request->file('photopath')->getClientOriginalExtension();
            //file name to store
            $path=$filename_image.'_'.time().'.'.$extension_image;

            $request->file('photopath')->storeAs('public/testimonials', $path);
            // $request->file('image')->move('images/products/',$path);
            $data['photopath'] = $path;

            Testimonial::create($data);
            return redirect(route('testimonials.index'))->with('success','Testimonial Added Successfully');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit',compact('testimonial'));
    }

   
    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'comments' => 'required',
            'oldpath' => 'required',
        ]);	  
        $data['photopath'] = $data['oldpath']; 	
            if($request->has('image'))
            {
                //file name with extentsion
            $filenameWithExt_image=$request->file('image')->getClientOriginalName();
            //only file name
            $filename_image=pathinfo($filenameWithExt_image,PATHINFO_FILENAME);
            //only extension
            $extension_image=$request->file('image')->getClientOriginalExtension();
            //file name to store
            $path=$filename_image.'_'.time().'.'.$extension_image;

            $request->file('image')->storeAs('public/testimonials', $path);
            // $request->file('image')->move('images/products/',$path);

            Storage::delete('/public/testimonials/'.$data['oldpath']);

            $data['photopath'] = $path;
            }

            $testimonial->name = $data['name'];
            $testimonial->title = $data['title'];
            $testimonial->comments = $data['comments'];
            $testimonial->photopath = $data['photopath'];
            $testimonial->save();
            return redirect(route('testimonials.index'))->with('success','Testimonial Updated Successfully');
    }

    
    public function destroy(Testimonial $testimonial)
    {
        //
    }

    public function delete(Request $request)
    {
        $data = Testimonial::find($request->dataid);
        if($data->delete())
        {
            Storage::delete('/public/testimonials/'.$data['photopath']);
            return back()->with('success','Testimonial Deleted Successfully');
        }
        else
        return back()->with('error','Something Went Wrong');
    }
}
