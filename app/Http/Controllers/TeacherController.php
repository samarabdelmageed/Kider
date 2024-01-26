<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Traits\Common;

class TeacherController extends Controller
{
    use Common;


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $teachers=Teacher::get();
        $teachers = Teacher::paginate(3);
        return view('admin.teachers',compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::get();
        return view('admin.insertTeacher',compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'teacherName'=>'required|string|max:50',
            'designation'=>'required|string|max:50',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'facebook'=>'required|string',
            'twitter'=>'required|string',
            'instagram'=>'required|string',
        ], $messages);

        $fileName = $this->uploadFile($request->image, 'assets/img');    
        $data['image'] = $fileName;

        $data['published'] = isset($request->published);
        Teacher::create($data);
        return redirect ('admin/teachers');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.showTeacher',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.updateTeacher',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $messages = $this->messages();
        $data = $request->validate([
            'teacherName'=>'required|string|max:50',
            'designation'=>'required|string|max:50',
            'image' => 'sometimes|mimes:png,jpg,jpeg|max:2048',
            'facebook'=>'required|string',
            'twitter'=>'required|string',
            'instagram'=>'required|string',
            ], $messages);

            if($request->hasFile('image')){
                $fileName = $this->uploadFile($request->image, 'assets/img');    
                $data['image'] = $fileName;
                unlink("assets/img/" . $request->oldImage);
            }
            
            $data['published'] = isset($request->published);
            Teacher::where('id', $id)->update($data);
            return redirect('admin/teachers')->with('message', 'Data updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Teacher::where('id',$id)->delete();
        return redirect ('admin/teachers');
    }

        /**
     * Trashed List
     */
    public function trashed()
    {
        $teachers = Teacher::onlyTrashed()->get();
        return view('admin.trashedTeachers',compact('teachers'));
    }

    /**
     * Force Delete
     */
    public function forceDelete(string $id)
    {
        Teacher::where('id',$id)->forceDelete();
        return redirect ('admin/trashedTeachers');
    }

    /**
     * Restore
     */
    public function restore(string $id)
    {
        Teacher::where('id',$id)->restore();
        return redirect ('admin/teachers');
    }
    public function messages(){
        return[
                'teacherName.required'=>'Teacher Name is required',
                'designation.required'=> 'Designation is required',
                'facebook.required'=> 'Facebook page is required',
                'twitter.required'=> 'Twitter page is required',
                'instagram.required'=> 'Instagram page is required',
                'image.required'=> 'Please be sure to select an image',
                'image.mimes'=> 'Incorrect image type',
                'image.max'=> 'Max file size is exceeded',               
                ];
    }

    public function insertTeacher()
    {
        $teachers=Teacher::get();
        return view('admin.insertTeacher', compact('teachers'));
    }
}
