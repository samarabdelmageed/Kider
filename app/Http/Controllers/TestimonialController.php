<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Traits\Common;

class TestimonialController extends Controller
{
    use Common;

    // private $columns = ['clientName','profession','content','published'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $testimonials=Testimonial::get();
        $testimonials = Testimonial::paginate(3);
        return view('admin.testimonials',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $testimonials = Testimonial::get();
        return view('admin.insertTestimonial',compact('testimonials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'clientName'=>'required|string|max:50',
            'profession'=>'required|string',
            'content'=>'required|string',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/img');    
        $data['image'] = $fileName;

        $data['published'] = isset($request->published);
        Testimonial::create($data);
        return redirect ('admin/testimonials');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.showTestimonial',compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.updateTestimonial',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'clientName'=>'required|string|max:50',
            'profession'=>'required|string',
            'content'=>'required|string',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/img');    
                $data['image'] = $fileName;
                unlink("assets/img/" . $request->oldImage);
            }
            
            $data['published'] = isset($request->published);
            Testimonial::where('id', $id)->update($data);
            return redirect('admin/testimonials')->with('message', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Testimonial::where('id',$id)->delete();
        return redirect ('admin/testimonials');
    }

        /**
     * Trashed List
     */
    public function trashed()
    {
        $testimonials = Testimonial::onlyTrashed()->get();
        return view('admin.trashedTestimonials',compact('testimonials'));
    }

    /**
     * Force Delete
     */
    public function forceDelete(string $id)
    {
        Testimonial::where('id',$id)->forceDelete();
        return redirect ('admin/trashedTestimonials');
    }

    /**
     * Restore
     */
    public function restore(string $id)
    {
        Testimonial::where('id',$id)->restore();
        return redirect ('admin/testimonials');
    }
    public function messages(){
        return[
                'clientName.required'=>'Client Name is required',
                'profession.required'=> 'Profession is required',
                'content.required'=> 'Content is required',
                'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size is exceeded',               
                ];
    }

    public function insertTestimonial()
    {
        return view('admin.insertTestimonial');
    }
}
