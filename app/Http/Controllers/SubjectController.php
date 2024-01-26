<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Teacher;
use App\Traits\Common;

class SubjectController extends Controller
{
    use Common;


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $subjects = Subject::get();
        $subjects = Subject::paginate(3);
        return view('admin.classesList',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::get();
        return view('admin.insertClass',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $teachers = Teacher::get();
        $data = $request->validate([
            'className'=>'required|string|max:50',
            'ageStart'=>'required',
            'ageEnd'=>'required',
            'timeStart'=>'required',
            'timeEnd'=>'required',
            'capacity'=>'required',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'teacherId'=>'required',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/img');    
        $data['image'] = $fileName;

        $data['published'] = isset($request->published);
        Subject::create($data);
        return redirect ('admin/classesList');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::findOrFail($id);
        return view('admin.showClass',compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::findOrFail($id);
        $teachers = Teacher::get();
        return view('admin.updateClass',compact('subject','teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $teachers = Teacher::get();
        $data = $request->validate([
            'className'=>'required|string|max:50',
            'ageStart'=>'required',
            'ageEnd'=>'required',
            'timeStart'=>'required',
            'timeEnd'=>'required',
            'capacity'=>'required',
            'price' => 'required',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'teacherId'=>'required',
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/img');    
                $data['image'] = $fileName;
                unlink("assets/img/" . $request->oldImage);
            }
            
            $data['published'] = isset($request->published);
            Subject::where('id', $id)->update($data);
            return redirect('admin/classesList')->with('message', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Subject::where('id',$id)->delete();
        return redirect ('admin/classesList');
    }

        /**
     * Trashed List
     */
    public function trashed()
    {
        $subjects = Subject::onlyTrashed()->get();
        return view('admin.trashedClasses',compact('subjects'));
    }

    /**
     * Force Delete
     */
    public function forceDelete(string $id)
    {
        Subject::where('id',$id)->forceDelete();
        return redirect ('admin/trashedClasses');
    }

    /**
     * Restore
     */
    public function restore(string $id)
    {
        Subject::where('id',$id)->restore();
        return redirect ('admin/classesList');
    }
    public function messages(){
        return[
                'className.required'=>'Class Name is required',
                'ageStart.required'=> 'Age Start is required',
                'ageEnd.required'=> 'Age End is required',
                'timeStart.required'=> 'Time Start is required',
                'timeEnd.required'=> 'Time Start is required',
                'capacity.required'=> 'Capacity is required',
                'price.required'=> 'Price is required',
                'teacherId.required'=> 'Teacher is required',
                'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size is exceeded',               
                ];
    }

    public function insertClass()
    {
        $teachers = Teacher::get();
        return view('admin.insertClass',compact('teachers'));
    }
}
