@extends('admin.layouts.app')

@section('title')
Add Student
@endsection


@section('content')



<section class="content p-1 pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Student</h3>
                        @can('view student')

                        <a href="{{ route('admin.students.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.students.store')}}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="card-body  row">
                            <div class="form-group col-lg-6">
                                <label>Name <span class="text-secondary text-sm">(Optional)</span></label>
                                <input type="text" name="name" id="name" class="form-control " placeholder="Enter Name" required>

                            </div>


                            <div class="form-group col-lg-6">
                                <label>Email <span class="text-secondary text-sm">(Optional)</span></label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="info@example.com">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Phone <span class="text-danger">*</span></label>
                                <input type="number" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="+8801XXXXXXXXX">
                                @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Date Of Birth<span class="text-secondary text-sm">(Optional)</span></label>
                                <input type="date" name="dob" id="dob" class="form-control" placeholder="DD-MM-YYYY">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Address <span class="text-secondary text-sm">(Optional)</span></label>
                                <input type="text" name="address" id="address" class="form-control" placeholder="House #, Street, Area, City">
                            </div>


                            <div class="form-group col-lg-6 ">
                                <label>Image <span class="text-secondary text-sm">(Optional)</span></label>
                                <input type="file" name="image" id="image" value=" " class="form-control  p-1">
                                <img id="preview-image" src="" alt="Preview Image" width="80px" class="mt-2" style="display:none; border:1px solid #ccc; padding:5px; border-radius:5px;">
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end">
                            <button type="submit" class="btn btn-info"><i class="fa fa-save"></i> Save</button>
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