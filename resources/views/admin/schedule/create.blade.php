@extends('admin.layouts.app')

@section('title')
Add Schedule
@endsection


@section('content')



<section class="content p-1 pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Schedule</h3>
                        @can('view student')

                        <a href="{{ route('admin.schedule.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.schedule.store')}}">
                        @csrf
                        @method('POST')

                        <div class="card-body  row">
                            <div class="form-group col-lg-6">
                                <label> Select Student <span class="text-danger">*</span></label>
                                <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                                    @foreach($student as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Select Teacher <span class="text-danger">*</span></label>
                                <select name="teacher_id" id="teacher_id" class="form-control @error('teacher_id') is-invalid @enderror" required>
                                    @foreach($teacher as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('teacher_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Class Date</label>
                                <input type="date" name="class_date" id="class_date" class="form-control" placeholder="DD-MM-YYYY">
                            </div>


                            <div class="form-group col-lg-6">
                                <label>Class Time</label>
                                <input type="text" name="class_time" id="class_time" class="form-control" placeholder="Enter Class Time">
                            </div>

                            <div class="form-group col-lg-6">
                                <label>Road Test Time </label>
                                <input type="text" name="road_test_time" id="road_test_time" class="form-control" placeholder=" Enter Road test time">
                            </div>

                            <div class="form-group col-lg-6">
                                <label> Road Test location </label>
                                <input type="text" name="road_test_location" id="road_test_location" class="form-control" placeholder=" Enter Road test location">
                            </div>

                            <div class="form-group col-lg-6">
                                <label> Remarks</label>
                                <input type="text" name="remarks" id="remarks" class="form-control" placeholder=" Enter Remarks ">
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


@endsection