<!DOCTYPE html>
<html lang="en">

@extends('includes.head',["title"=>"Insert Teacher"])

@include('admin.includes.navBarAdmin')

	<body>
		<div class="container">
			<form class="m-auto" style="max-width:600px" method="post" action="{{ route('storeTeacher') }}" enctype="multipart/form-data">
            @csrf
				<h3 class="my-4">Insert Teacher</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Teacher Name</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="teacherName" value="{{old('teacherName')}}" ></div>
                    @error('teacherName')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Designation</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="designation" value="{{old('designation')}}" ></div>
                    @error('designation')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Facebook Page</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="facebook" value="{{old('facebook')}}" ></div>
                    @error('facebook')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Twitter Page</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="twitter" value="{{old('twitter')}}" ></div>
                    @error('twitter')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Instagram Page</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="instagram" value="{{old('instagram')}}" ></div>
                    @error('instagram')
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