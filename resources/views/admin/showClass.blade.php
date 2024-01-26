<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Class</title>
</head>
<body>
    <h1> Class Data </h1>
    <h2> Class Title: </h2> <h3 style="color:blue;"> {{$subject->className}} </h3>
    <h2> Age Start: </h2> <h3 style="color:blue;"> {{$subject->ageStart}} </h3>
    <h2> Age End: </h2> <h3 style="color:blue;"> {{$subject->ageEnd}} </h3>
    <h2> Time Start: </h2> <h3 style="color:blue;"> {{$subject->timeStart}} </h3>
    <h2> Time End: </h2> <h3 style="color:blue;"> {{$subject->timeEnd}} </h3>
    <h2> Capacity: </h2> <h3 style="color:blue;"> {{$subject->capacity}} </h3>
    <h2> Price: </h2> <h3 style="color:blue;"> {{$subject->price}} </h3>
    <h2> Teacher: </h2> <h3 style="color:blue;"> {{$subject->teacher->teacherName}} </h3>
    <h2> Published or Not Published: </h2> <h3 style="color:blue;"> {{ $subject->published? "Published" : "Not Published" }} </h3>
    <h2> Created at: </h2> <h3 style="color:blue;">  {{$subject->created_at}} </h3>
    <h2> Updated at: </h2> <h3 style="color:blue;"> {{$subject->updated_at}} </h3>
    <h2> Class Image: </h2>
    <img src="{{ asset('assets/img/'.$subject->image) }}" alt="class" style="width:200px;">

</body>
</html>