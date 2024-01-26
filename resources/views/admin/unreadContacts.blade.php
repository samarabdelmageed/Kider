<!DOCTYPE html>
<html lang="en">
@extends('includes.head',["title"=>"Contacts List"])

@include('admin.includes.navBarAdmin')

<body>

<div class="container">
  <h2>Contacts List</h2>
  <table class="table table-hover">
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Delete</th>
    </tr>
    </thead>

    @foreach($contacts as $contact)  
    <tbody>
      <tr>
        <td>{{$contact->name}}</td>
        <td>{{$contact->email}}</td>
        <td>{{$contact->subject}}</td>
        <td>{{$contact->message}}</td>
        <td><a href="deleteContact/{{ $contact->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
    @endforeach
   
    </tbody>
  </table>
</div>

</body>
</html>
