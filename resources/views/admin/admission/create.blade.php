@extends('admin.layouts.app')

@section('title')
Add Admission
@endsection


@section('content')



<section class="content p-1 pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Admission</h3>
                        @can('view student')

                        <a href="{{ route('admin.admissions.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.admissions.store')}}">
                        @csrf
                        @method('POST')

                        <div class="card-body  row">
                            <div class="form-group col-lg-6">
                                <label> Select Student <span class="text-danger">*</span></label>
                                <select  name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                                @foreach($student as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                </select>
                                @error('student_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                             <div class="form-group col-lg-6">
                                <label>Select Package <span class="text-danger">*</span></label>
                                <select  name="package_id" id="package_id" class="form-control @error('package_id') is-invalid @enderror" required>
                                @foreach($package as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                 @endforeach
                                </select>
                                @error('package_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Admission Date</label>
                                <input type="date" name="admission_date" id="admission_date" class="form-control" placeholder="DD-MM-YYYY">
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Course Fee</label>
                                <input type="number" name="course_fee" id="course_fee" class="form-control" placeholder="Enter Course Amount">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Paid </label>
                                <input type="number" name="paid" id="paid"  class="form-control" placeholder=" Enter Paid Amount">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Due </label>
                                <input type="number" name="due" id="due"  class="form-control" placeholder=" Enter Due Amount">
                            </div>


                            <div class="form-group col-lg-12">
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


@endsection