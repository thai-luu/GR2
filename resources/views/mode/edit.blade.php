@extends('layouts.default')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Form Validation</h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                       
                        
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form class="" action="{{route('mode.update',['mode' => $mode->id])}}" method="post" >
                        @csrf
                        @method('PUT')
                       @include('mode.feilds')
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
 @endsection