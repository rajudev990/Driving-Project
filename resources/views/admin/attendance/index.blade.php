@extends('admin.layouts.app')

@section('title')
Update Attendance
@endsection


@section('content')



<section class="content p-1 pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Attendance</h3>
                        @can('view attendance')

                        <a href="{{ route('admin.attendance.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.attendance.update',$data->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="card-body  row">
                            <div class="form-group col-lg-12">
                                <label> Select Student <span class="text-danger">*</span></label>
                                <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required>
                                    @foreach($student as $item)
                                    <option value="{{$item->id}}" {{$data->student_id ==$item->id ? 'selected' : '' }}>{{$item->name}}</option>
                                    @endforeach
                                </select>
                                @error('student_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-lg-12">
                                <label>Select Admission <span class="text-danger">*</span></label>
                                <select name="admission_id" id="admission_id" class="form-control @error('admission_id') is-invalid @enderror" required>
                                    @foreach($admission as $item)
                                    <option value="{{$item->id}}" {{$data->admission_id ==$item->id ? 'selected' : '' }}>{{$item->id}}</option>
                                    @endforeach
                                </select>
                                @error('admission_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group col-lg-12">
                                <label>Attendance Date</label>
                                <input type="date" value="{{$data->attendance_date}}" name="attendance_date" id="attendance_date" class="form-control" placeholder="DD-MM-YYYY">
                            </div>


                            <div class="form-group col-lg-12">
                                <label>Attendance</label>
                                <input type="text" value="{{$data->attendance}}" name="attendance" id="attendance" class="form-control" placeholder="Enter attendance">
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