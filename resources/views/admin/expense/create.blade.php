@extends('admin.layouts.app')

@section('title')
Add Expense
@endsection


@section('content')



<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">Add Expense</h3>
                        @can('view expense')

                        <a href="{{ route('admin.expense.index') }}" class="btn btn-success float-right"><i class="fa fa-angle-left"> Back</i></a>

                        @endcan
                    </div>
                    <!-- /.card-header -->
                    <form id="quickForm" method="POST" action="{{ route('admin.expense.store')}}">
                        @csrf
                        @method('POST')

                        <div class="card-body row">
                            <div class="form-group col-lg-12">
                                <label>Item</label>
                                <input type="text" name="item" value=" " class="form-control @error('item') is-invalid @enderror" placeholder="Enter item">
                            </div>

                            <div class="form-group col-lg-12">
                                <label> Date</label>
                                <input type="date" name="date" value=" " class="form-control  @error('date') is-invalid @enderror">
                            </div>

                            <div class="form-group col-lg-12">
                                <label> Amount</label>
                                <input type="number" name="amount" value=" " class="form-control  @error('amount') is-invalid @enderror">
                            </div>

                            <div class="form-group col-lg-12">
                                <label>Status</label>
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