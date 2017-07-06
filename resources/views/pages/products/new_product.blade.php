@extends('layouts.app')
@section('title', 'New Product')
@section('header')

@endsection

@section('content')


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.sidebar')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Product</h1>
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

                            <!-- /.table-responsive -->

                            <form method="post" action="{{url('/products/')}}/new" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        @foreach($categories as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>IMMA ID Code</label>
                                    <input class="form-control" name="imma_id_code">
                                </div>

                                <div class="form-group">
                                    <label>Order</label>
                                    <input class="form-control" name="order">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="description">
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    <label>RecQuantity10</label>
                                    <input class="form-control" name="rec_quantity_10">
                                </div>

                                <div class="form-group">
                                    <label>RecQuantity20</label>
                                    <input class="form-control" name="rec_quantity_20">
                                </div>

                                <div class="form-group">
                                    <label>RecQuantity30</label>
                                    <input class="form-control" name="rec_quantity_30">
                                </div>

                                <div class="form-group">
                                    <label>RecQuantity40</label>
                                    <input class="form-control" name="rec_quantity_40">
                                </div>

                                <div class="form-group">
                                    <label>Comment</label>
                                    <input class="form-control" name="comment">
                                </div>

                                <div class="form-group">
                                    <label>More than 24</label>
                                    <input class="form-control" name="more_than_24">
                                </div>

                                <div class="form-group">
                                    <label>Less than 24</label>
                                    <input class="form-control" name="less_than_24">
                                </div>

                                <div class="form-group">
                                    <label>Less than 2</label>
                                    <input class="form-control" name="less_than_2">
                                </div>

                                <div class="form-group">
                                    <label>Dosage</label>
                                    <input class="form-control" name="dosage">
                                </div>

                                <div class="form-group">
                                    <label>Reference</label>
                                    <input class="form-control" name="reference">
                                </div>

                                <div class="form-group">
                                    <label>Ordering Size</label>
                                    <input class="form-control" name="ordering_size">
                                </div>

                                <div class="form-group">
                                    <label>Quantity Required</label>
                                    <input class="form-control" name="quantity_required">
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
       
    </script>
@endsection