<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Testimonial</title>
</head>
<body>
    <h1> Testimonial Data </h1>
    <h2> Client Name: </h2> <h3 style="color:blue;"> {{$testimonial->clientName}} </h3>
    <h2> Profession: </h2> <h3 style="color:blue;"> {{$testimonial->profession}} </h3>
    <h2> Content: </h2> <h3 style="color:blue;"> {{$testimonial->content}} </h3>
    <h2> Published or Not Published: </h2> <h3 style="color:blue;"> {{ $testimonial->published? "Published" : "Not Published" }} </h3>
    <h2> Created at: </h2> <h3 style="color:blue;">  {{$testimonial->created_at}} </h3>
    <h2> Updated at: </h2> <h3 style="color:blue;"> {{$testimonial->updated_at}} </h3>
    <h2> Client Image: </h2>
    <img src="{{ asset('assets/img/'.$testimonial->image) }}" alt="testimonial" style="width:200px;">

</body>
</html>