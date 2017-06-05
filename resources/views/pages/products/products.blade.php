@extends('layouts.app')
@section('title', 'Products')
@section('header')


@endsection

@section('content')


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.sidebar')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Products</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Product Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>IMMA ID Code</th>
                                    <th>Order</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($products as $product)
                                    <tr class="odd gradeX datarow" data-id="{{$product->id}}">
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->imma_id_code}}</td>
                                        <td>{{$product->order}}</td>
                                        <td>{{$product->description}}</td>
                                        <td><img src="<?= asset($product->image_url)?>" height="100"></td>
                                        <td class="center remove-row">
                                            <a href="{{url('products/')}}/{{$product->id}}/delete">Delete</a>
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

                            <a class="btn btn-primary" href="{{url('products/new')}}">Add Product</a>

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
                window.location.href = "{{url('/products/')}}/" + id + "/edit"
            });
        });
    </script>
@endsection
