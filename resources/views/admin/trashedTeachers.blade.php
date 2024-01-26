<!DOCTYPE html>
<html lang="en">
@extends('includes.head',["title"=>"Trashed Teachers"])

@include('admin.includes.navBarAdmin')

<body>

<div class="container">
  <h2>Trashed Teachers List</h2>
  <table class="table table-hover">
    <thead>
    <tr>
        <th>Teacher's Name</th>
        <th>Designation</th>
        <th>Facebook Page</th>
        <th>Twitter Page</th>
        <th>Instagram Page</th>
        <th>Published</th>
        <th>Delete</th>
        <th>Restore</th>
    </tr>
    </thead>

    @foreach($teachers as $teacher)  
    <tbody>
      <tr>
        <td>{{$teacher->teacherName}}</td>
        <td>{{$teacher->designation}}</td>
        <td>{{$teacher->facebook}}</td>
        <td>{{$teacher->twitter}}</td>
        <td>{{$teacher->instagram}}</td>
        <td>{{$teacher->published ? 'yes':'no'}}</td>
        <td><a href="forceDeleteTeacher/{{ $teacher->id }}" onclick="return confirm('Are you sure you want to permanently delete?')">Force Delete</a></td>
        <td><a href="restoreTeacher/{{ $teacher->id }}" onclick="return confirm('Are you sure you want to restore?')">Restore</a></td>
        <!-- Another method to transform 1 and 0 in published into yes and no -->
        <!-- <td>
            {{$teacher->published}}
            @if($teacher->published)
                Yes
            @else
                No
            @endif
        </td> -->
      </tr>
    @endforeach
   
    </tbody>
  </table>
</div>

</body>
</html>
