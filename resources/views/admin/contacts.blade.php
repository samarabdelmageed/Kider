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
        <th>Read/Unread</th>
        <th>Mark As Read</th>
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
        <td>{{$contact->is_read ? 'Read':'Unread'}}</td>
        <td><a href="markAsRead/{{ $contact->id }}" onclick="return confirm('Are you sure you want to mark as read?')"><button class="btn btn-primary btn-sm" type="submit">Mark As Read</button></a></td>
        <td><a href="deleteContact/{{ $contact->id }}" onclick="return confirm('Are you sure you want to delete?')">Delete</a></td>
      </tr>
    @endforeach
   
    </tbody>
  </table>
  {{$contacts->links()}}
</div>

</body>
</html>
