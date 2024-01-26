<!DOCTYPE html>
<html lang="en">
@extends('includes.head',["title"=>"Testimonials List"])

@include('admin.includes.navBarAdmin')

<body>

<div class="container">
  <h2>Testimonials List</h2>
  <table class="table table-hover">
    <thead>
    <tr>
        <th>Client Name</th>
        <th>Profession</th>
        <th>Content</th>
        <th>Published</th>
        <th>Show</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>

    @foreach($testimonials as $testimonial)  
    <tbody>
      <tr>
        <td>{{$testimonial->clientName}}</td>
        <td>{{$testimonial->profession}}</td>
        <td>{{$testimonial->content}}</td>
        <td>{{$testimonial->published ? 'yes':'no'}}</td>
        <td><a href="showTestimonial/{{ $testimonial->id }}">Show</a></td>
        <td><a href="updateTestimonial/{{ $testimonial->id }}">Edit</a></td>
        <td><a href="deleteTestimonial/{{ $testimonial->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
        <!-- Another method to transform 1 and 0 in published into yes and no -->
        <!-- <td>
            {{$testimonial->published}}
            @if($testimonial->published)
                Yes
            @else
                No
            @endif
        </td> -->
      </tr>
    @endforeach
   
    </tbody>
  </table>
  {{$testimonials->links()}}
</div>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

</body>
</html>
