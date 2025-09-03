@extends('admin.layouts.app')

@section('title')
Dashboard
@endsection


@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>



<section class="content">
    <div class="container-fluid">

        <div class="row">

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-dark">
                    <div class="inner">
                        <h3>{{ \App\Models\GameClick::count('ip_address') }}</h3>
                        <p>Total User</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ \App\Models\GameClick::count()  }}</h3>
                        <p>Total Click</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ \App\Models\Admin\Slider::count()  }}</h3>
                        <p>Total Slider</p>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ \App\Models\Admin\Gift::count()  }}</h3>
                        <p>Total Gift</p>
                    </div>
                </div>
            </div>

           
        </div>

        @php 
        $games = \App\Models\Admin\Game::all();
        @endphp


        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card card-cyan">
                     <div class="card-header">
                        <h3 class="card-title">Game Click List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Link</th>
                                    <th>Click</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($games as $item)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $item->game_name}}</td>
                                    <td class="text-center">
                                        <img src="{{ Storage::url($item->game_image) }}" width="80" height="60" alt="Image">
                                    </td>

                                     <td>
                                       {{ $item->button_link }}
                                    </td>

                                    <td class="text-center">
                                        {{ $item->gameclick->count()}}
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>



        </div>








        
    </div>
</section>

@section('script')
@endsection


@endsection