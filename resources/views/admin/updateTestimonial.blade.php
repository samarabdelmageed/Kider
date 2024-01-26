<!DOCTYPE html>
<html lang="en">
@extends('includes.head',["title"=>"Edit / Update Testimonial"])

@include('admin.includes.navBarAdmin')

	<body>
		<div class="container">
        <form action="{{route('updateTesti',$testimonial->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
				<h3 class="my-4">Edit / Update Testimonial</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Client Name</label>
					<div class="col-md-7">
					<input type="text" class="form-control form-control-lg" id="title2" name="clientName" value="{{$testimonial->clientName}}">
				</div>
                    @error('clientName')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Profession</label>
					<div class="col-md-7">
						<input type="text" class="form-control form-control-lg" id="price6" name="profession" value="{{$testimonial->profession}}">
					</div>
                    @error('profession')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7">
						<textarea class="form-control form-control-lg" id="content4" name="content" >{{$testimonial->content}}</textarea>
				</div>
					@error('content')
                    {{$message}}
                    @enderror
				</div>
				<hr class="my-4" />
				<div class="form-group">
					<label for="image">Image:</label>
					<input type="file" class="form-control" id="image" name="image">
					<input type="hidden" name="oldImage" value="{{$testimonial->image}}">
					<br>
					<img src="{{ asset('assets/img/'.$testimonial->image) }}" alt="testimonial" style="width:200px;">
					@error('image')
					{{ $message }}
					@enderror
				</div>
                <div class="checkbox">
                    <label><input type="checkbox" name="published" @checked($testimonial->published)> Published </label>
                </div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Update</button></div>
				</div>
			</form>
		</div>
	</body>
	
</html>

