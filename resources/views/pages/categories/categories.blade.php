@extends('layouts.app')
@section('title', 'Categories')
@section('header')


@endsection

@section('content')


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.sidebar')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Categories</h1>
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
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category Name</th>
                                    <th>Order</th>
                                    <th>Inormation</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categories as $category)
                                    <tr class="odd gradeX datarow" data-id="{{$category->id}}">
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->order}}</td>
                                        <td>{{$category->info}}</td>
                                        <td class="center remove-row">
                                            <a href="{{url('categories/')}}/{{$category->id}}/edit">Edit</a>
                                            <a href="{{url('categories/')}}/{{$category->id}}/delete">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="odd gradeA">
                                        <td colspan="5">No records</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->

                            <a class="btn btn-primary" href="{{url('categories/new')}}">Add Category</a>

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
                window.location.href = "{{url('/categories/')}}/" + id + "/edit"
            });
        });
    </script>
@endsection
