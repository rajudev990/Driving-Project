@extends('admin.layouts.app')

@section('title')
Update Student
@endsection


@section('content')



<section class="content p-1 pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Student</h3>
                        @can('view teacher')

                        <a href="{{ route('admin.students.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.students.update',$data->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">
                            <div class="form-group col-lg-12">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" value="{{$data->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" required>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-lg-12">
                                <label>Email</label>
                                <input type="text" value="{{$data->email}}" name="email" id="email" class="form-control" placeholder="info@example.com">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Phone</label>
                                <input type="number" value="{{$data->phone}}" name="phone" id="phone" value=" " class="form-control" placeholder="+8801XXXXXXXXX">
                            </div>

                             <div class="form-group col-lg-6">
                                <label>Date Of Birth</label>
                                <input type="date" name="dob" value="{{$data->dob}}" id="dob" class="form-control" placeholder="DD-MM-YYYY">
                            </div>

                             <div class="form-group col-lg-6">
                                <label>Address</label>
                                <input type="text" name="address" value="{{$data->address}}" id="address" value=" " class="form-control" placeholder="House #, Street, Area, City">
                            </div>

                            <div class="form-group col-lg-6 ">
                                <label>Image</label>
                                <input type="file" name="image" id="image"  class="form-control  p-1">
                                @if($data->image)
                                <img id="preview-image" src="{{Storage::url($data->image)}}" width="80px" class="mt-2" height="65px" alt="empty image">
                                @else
                                <img id="preview-image" src="" alt="Preview Image" width="80px" height="80px"  class="mt-2" style="display:none; border:1px solid #ccc; padding:5px; border-radius:5px;">
                                @endif
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{$data->status ==1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$data->status ==0 ? 'selected' : ''}}>Deactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-edit"></i> Update</button>
                        </div>
                    </form>

                </div>


            </div>



        </div>

    </div>
</section>


@section('script')
<script>
    document.getElementById('image').addEventListener('change', function(event) {
        const preview = document.getElementById('preview-image');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    });
</script>
@endsection

@endsection