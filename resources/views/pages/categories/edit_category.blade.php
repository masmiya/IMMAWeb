@extends('layouts.app')
@section('title', 'Edit Category')
@section('header')

@endsection

@section('content')


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.sidebar')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Category</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Category Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <!-- /.table-responsive -->

                            <form method="post" action="{{url('/categories/')}}/{{$category->id}}/edit" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control" name="name" value="{{$category->name}}">
                                </div>

                                <div class="form-group">
                                    <label>Order</label>
                                    <input class="form-control" name="order" value="{{$category->order}}">
                                </div>

                                <div class="form-group">
                                    <label>Information</label>
                                    <input class="form-control" name="info" value="{{$category->info}}">
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

    </div>
    <!-- /#wrapper -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });

            $('.datarow').click(function (e){
                var id = $(this).data('id')
                var subid = $(this).data('subid')
                window.location.href = "{{url('/categories/')}}/" + id + "/subcategories/" + subid + "/edit"
            });
        });
    </script>
@endsection

