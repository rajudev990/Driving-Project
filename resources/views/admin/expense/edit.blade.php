@extends('admin.layouts.app')

@section('title')
Update Expense
@endsection


@section('content')



<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Update Expense</h3>
                        @can('view expense')

                        <a href="{{ route('admin.expense.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.expense.update',$data->id)}}">
                        @csrf
                        @method('PUT')

                        <div class="card-body row">
                            <div class="form-group col-lg-12">
                                <label>Item</label>
                                <input type="text" name="item" value="{{$data->item}}" class="form-control @error('item') is-invalid @enderror" placeholder="Enter item">
                            </div>

                            <div class="form-group col-lg-12">
                                <label> Date</label>
                                <input type="date" name="date" value="{{$data->date}}" class="form-control  @error('date') is-invalid @enderror">
                            </div>

                            <div class="form-group col-lg-12">
                                <label> Amount</label>
                                <input type="number" name="amount" value="{{$data->amount}}" class="form-control  @error('amount') is-invalid @enderror">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="1" {{$data->status == 1 ? 'selected' : ''}}>Active</option>
                                    <option value="0" {{$data->status == 0 ? 'selected' : ''}}>Deactive</option>
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