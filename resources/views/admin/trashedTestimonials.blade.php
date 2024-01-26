<!DOCTYPE html>
<html lang="en">
@extends('includes.head',["title"=>"Trashed Testimonials"])

@include('admin.includes.navBarAdmin')

<body>

<div class="container">
  <h2>Trashed Testimonials List</h2>
  <table class="table table-hover">
    <thead>
    <tr>
        <th>Client Name</th>
        <th>Profession</th>
        <th>Content</th>
        <th>Published</th>
        <th>Delete</th>
        <th>Restore</th>
    </tr>
    </thead>

    @foreach($testimonials as $testimonial)  
    <tbody>
      <tr>
        <td>{{$testimonial->clientName}}</td>
        <td>{{$testimonial->profession}}</td>
        <td>{{$testimonial->content}}</td>
        <td>{{$testimonial->published ? 'yes':'no'}}</td>
        <td><a href="forceDeleteTestimonial/{{ $testimonial->id }}" onclick="return confirm('Are you sure you want to permanently delete?')">Force Delete</a></td>
        <td><a href="restoreTestimonial/{{ $testimonial->id }}" onclick="return confirm('Are you sure you want to restore?')">Restore</a></td>
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
</div>

</body>
</html>
