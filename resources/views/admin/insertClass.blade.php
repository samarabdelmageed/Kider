<!DOCTYPE html>
<html lang="en">

@extends('includes.head',["title"=>"Insert Class"])

@include('admin.includes.navBarAdmin')

	<body>
		<div class="container">
			<form class="m-auto" style="max-width:600px" method="post" action="{{ route('storeClass') }}" enctype="multipart/form-data">
            @csrf
				<h3 class="my-4">Insert Class</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Class Title</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="className" value="{{old('className')}}" ></div>
                    @error('className')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Age Start</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="ageStart" value="{{old('ageStart')}}" ></div>
                    @error('ageStart')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Age End</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="ageEnd" value="{{old('ageEnd')}}" ></div>
                    @error('ageEnd')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Time Start</label>
					<div class="col-md-7"><input type="time" class="form-control form-control-lg" id="price6" name="timeStart" value="{{old('timeStart')}}" ></div>
                    @error('timeStart')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Time End</label>
					<div class="col-md-7"><input type="time" class="form-control form-control-lg" id="price6" name="timeEnd" value="{{old('timeEnd')}}" ></div>
                    @error('timeEnd')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Capacity</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="capacity" value="{{old('capacity')}}" ></div>
                    @error('capacity')
                    {{$message}}
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Price</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6" name="price" value="{{old('price')}}" ></div>
                    @error('price')
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
				<div class="form-group">
					<label for="teacher">Teacher:</label>
					<select name="teacherId" id="">
						<option value="">Select Teacher</option>
						@foreach($teachers as $teacher)
						<option value="{{$teacher->id}}">{{$teacher->teacherName}}</option>
						@endforeach
					</select>
					@error('teacherId')
						{{ $message }}
					@enderror
				</div>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Insert</button></div>
				</div>
			</form>
		</div>
	</body>

</html>