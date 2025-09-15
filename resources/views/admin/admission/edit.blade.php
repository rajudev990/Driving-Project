@extends('admin.layouts.app')

@section('title')
Update Admission
@endsection


@section('content')



<section class="content p-1 pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Admission</h3>
                        @can('view student')

                        <a href="{{ route('admin.admissions.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.admissions.update',$data->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="card-body  row">
                            <div class="form-group col-lg-6">
                                <label>Student Name <span class="text-danger">*</span></label>
                                <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                                    @foreach($student as $item)
                                    <option value="{{$item->id}}" {{$data->student_id ==$item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Package <span class="text-danger">*</span></label>
                                <select name="package_id" id="package_id" class="form-control @error('package_id') is-invalid @enderror" required>
                                    @foreach($package as $item)
                                    <option value="{{$item->id}}" {{$data->package_id ==$item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('package_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Admission Date</label>
                                <input type="date" name="admission_date" value="{{$data->admission_date}}" id="admission_date" class="form-control" placeholder="DD-MM-YYYY">
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Course Fee</label>
                                <input type="number" value="{{$data->course_fee}}" name="course_fee" id="course_fee" class="form-control" placeholder="Enter Course Amount">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Paid </label>
                                <input type="number" value="{{$data->paid}}" name="paid" id="paid" class="form-control" placeholder=" Enter Paid Amount">
                            </div>



                            <div class="form-group col-lg-6">
                                <label>Status <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{$data->status ==1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{$data->status ==0 ? 'selected' : '' }}>Deactive</option>
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


@endsection