<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Teacher</title>
</head>
<body>
    <h1> Teacher Data </h1>
    <h2> Teacher's Name: </h2> <h3 style="color:blue;"> {{$teacher->teacherName}} </h3>
    <h2> designation: </h2> <h3 style="color:blue;"> {{$teacher->designation}} </h3>
    <h2> Facebook Page: </h2> <h3 style="color:blue;"> {{$teacher->facebook}} </h3>
    <h2> Twitter Page: </h2> <h3 style="color:blue;"> {{$teacher->twitter}} </h3>
    <h2> Instagram Page: </h2> <h3 style="color:blue;"> {{$teacher->instagram}} </h3>
    <h2> Published or Not Published: </h2> <h3 style="color:blue;"> {{ $teacher->published? "Published" : "Not Published" }} </h3>
    <h2> Created at: </h2> <h3 style="color:blue;">  {{$teacher->created_at}} </h3>
    <h2> Updated at: </h2> <h3 style="color:blue;"> {{$teacher->updated_at}} </h3>
    <h2> Teacher's Image: </h2>
    <img src="{{ asset('assets/img/'.$teacher->image) }}" alt="teacher" style="width:200px;">

</body>
</html>