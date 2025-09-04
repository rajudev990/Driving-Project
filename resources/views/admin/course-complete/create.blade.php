@extends('admin.layouts.app')

@section('title')
Add CourseComplete
@endsection


@section('content')



<section class="content p-1 pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add CourseComplete</h3>
                        @can('view course')

                        <a href="{{ route('admin.course-complete.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.course-complete.store')}}">
                        @csrf
                        @method('POST')

                        <div class="card-body  row">
                            <div class="form-group col-lg-12">
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


                            <div class="form-group col-lg-12">
                                <label>Select Admission <span class="text-danger">*</span></label>
                                <select name="admission_id" id="admission_id" class="form-control @error('admission_id') is-invalid @enderror" required>
                                    @foreach($admission as $item)
                                    <option value="{{$item->id}}">{{$item->id}}</option>
                                    @endforeach
                                </select>
                                @error('admission_id')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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