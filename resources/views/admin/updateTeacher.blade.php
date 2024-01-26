<!DOCTYPE html>
<html lang="en">
@extends('includes.head',["title"=>"Edit / Update Teacher"])

@include('admin.includes.navBarAdmin')

	<body>
		<div class="container">
        <form action="{{route('updateTeach',$teacher->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
				<h3 class="my-4">Edit / Update Teacher</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Teacher Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="teacherName" value="{{$teacher->teacherName}}" ></div>
                    @error('teacherName')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Designation</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="designation" value="{{$teacher->designation}}" ></div>
                    @error('designation')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Facebook Page</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="facebook" value="{{$teacher->facebook}}" ></div>
                    @error('facebook')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Twitter Page</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="twitter" value="{{$teacher->twitter}}" ></div>
                    @error('twitter')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Instagram Page</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="instagram" value="{{$teacher->instagram}}" ></div>
                    @error('instagram')
                    {{$message}}
                    @enderror
				</div>
				<hr class="my-4" />
				<div class="form-group">
					<label for="image">Image:</label>
					<input type="file" class="form-control" id="image" name="image">
					<input type="hidden" name="oldImage" value="{{$teacher->image}}">
					<br>
					<img src="{{ asset('assets/img/'.$teacher->image) }}" alt="teacher" style="width:200px;">
					@error('image')
					{{ $message }}
					@enderror
				</div>
                <div class="checkbox">
                    <label><input type="checkbox" name="published" @checked($teacher->published)> Published </label>
                </div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Update</button></div>
				</div>
			</form>
		</div>
	</body>
	
</html>

