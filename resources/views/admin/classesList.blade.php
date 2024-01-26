<!DOCTYPE html>
<html lang="en">
@extends('includes.head',["title"=>"Classes List"])

@include('admin.includes.navBarAdmin')

<body>

<div class="container">
  <h2>Classes List</h2>
  <table class="table table-hover">
    <thead>
    <tr>
        <th>Class Title</th>
        <th>Age Start</th>
        <th>Age End</th>
        <th>Time Start</th>
        <th>Time End</th>
        <th>Capacity</th>
        <th>Price</th>
        <th>Teacher</th>
        <th>Published</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>

    @foreach($subjects as $subject)  
    <tbody>
      <tr>
        <td>{{$subject->className}}</td>
        <td>{{$subject->ageStart}}</td>
        <td>{{$subject->ageEnd}}</td>
        <td>{{$subject->timeStart}}</td>
        <td>{{$subject->timeEnd}}</td>
        <td>{{$subject->capacity}}</td>
        <td>{{$subject->price}}</td>
        <td>{{$subject->teacher->teacherName}}</td>
        <td>{{$subject->published ? 'yes':'no'}}</td>
        <td><a href="showClass/{{ $subject->id }}">Show</a></td>
        <td><a href="updateClass/{{ $subject->id }}">Edit</a></td>
        <td><a href="deleteClass/{{ $subject->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
        <!-- Another method to transform 1 and 0 in published into yes and no -->
        <!-- <td>
            {{$subject->published}}
            @if($subject->published)
                Yes
            @else
                No
            @endif
        </td> -->
      </tr>
    @endforeach
   
    </tbody>
  </table>
  {{$subjects->links()}}
</div>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

</body>
</html>
