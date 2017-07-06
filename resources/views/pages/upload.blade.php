@extends('layouts.app')
@section('title', 'Upload Document')


@section('content')

        <div class="col-lg-10 col-lg-offset-1">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Upload Document</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Upload Document
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form method="post" action="{{url('/uploaduserdoc')}}" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="user_id" value="{{$user_id}}">
                                <input type="hidden" name="slot" value="{{$slot}}">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name">
                                </div>

                                <div class="form-group">
                                    <label>File</label>
                                    <input type="file" class="form-control" name="docfile">
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->


@endsection
