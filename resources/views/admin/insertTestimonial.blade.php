<!DOCTYPE html>
<html lang="en">

@extends('includes.head',["title"=>"Insert Testimonial"])

@include('admin.includes.navBarAdmin')

	<body>
		<div class="container">
			<form class="m-auto" style="max-width:600px" method="post" action="{{ route('storeTestimonial') }}" enctype="multipart/form-data">
            @csrf
				<h3 class="my-4">Insert Testimonial</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Client Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="clientName" value="{{old('clientName')}}" ></div>
                    @error('clientName')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Profession</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="profession" value="{{old('profession')}}" ></div>
                    @error('profession')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" >{{old('content')}}</textarea></div>
					@error('content')
                    {{$message}}
                    @enderror
				</div>
				<hr class="my-4" />
				<div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                    {{ $message }}
                    @enderror
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="published" @checked( old('published'))> Published </label>
                </div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Insert</button></div>
				</div>
			</form>
		</div>
	</body>

</html>