<!DOCTYPE html>
<html lang="en">
@extends('includes.head',["title"=>"Appointments List"])

@include('admin.includes.navBarAdmin')

<body>

<div class="container">
  <h2>Appointments List</h2>
  <table class="table table-hover">
    <thead>
    <tr>
        <th>Guardian Name</th>
        <th>Guardian Email</th>
        <th>Child Name</th>
        <th>Child Age</th>
        <th>Message</th>
    </tr>
    </thead>

    @foreach($appointments as $appointment)  
    <tbody>
      <tr>
        <td>{{$appointment->guardianName}}</td>
        <td>{{$appointment->guardianEmail}}</td>
        <td>{{$appointment->childName}}</td>
        <td>{{$appointment->childAge}}</td>
        <td>{{$appointment->message}}</td>
      </tr>
    @endforeach
   
    </tbody>
    {{$appointments->links()}}
  </table>

</div>

</body>
</html>
