@extends('layouts.app')
@section('title', 'Edit Product')
@section('header')

@endsection

@section('content')


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.sidebar')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Product</h1>
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

                            <form method="post" action="{{url('/products/')}}/{{$product->id}}/edit" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            @if($category->id == $product->category_id)
                                                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                            @else
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>IMMA ID Code</label>
                                    <input class="form-control" name="imma_id_code" value="{{$product->imma_id_code}}">
                                </div>

                                <div class="form-group">
                                    <label>Order</label>
                                    <input class="form-control" name="order" value="{{$product->order}}">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" value="{{$product->name}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="description" value="{{$product->description}}">
                                </div>

                                <div class="form-group">
                                    <label>Image</label>
                                    <input type="file" class="form-control" name="image">
                                </div>

                                <div class="form-group">
                                    <label>RecQuantity10</label>
                                    <input class="form-control" name="rec_quantity_10" value="{{$product->rec_quantity_10}}">
                                </div>

                                <div class="form-group">
                                    <label>RecQuantity20</label>
                                    <input class="form-control" name="rec_quantity_20" value="{{$product->rec_quantity_20}}">
                                </div>

                                <div class="form-group">
                                    <label>RecQuantity30</label>
                                    <input class="form-control" name="rec_quantity_40" value="{{$product->rec_quantity_30}}">
                                </div>

                                <div class="form-group">
                                    <label>RecQuantity40</label>
                                    <input class="form-control" name="rec_quantity_30" value="{{$product->rec_quantity_40}}">
                                </div>

                                <div class="form-group">
                                    <label>Comment</label>
                                    <input class="form-control" name="comment" value="{{$product->comment}}">
                                </div>

                                <div class="form-group">
                                    <label>More than 24</label>
                                    <input class="form-control" name="more_than_24" value="{{$product->more_than_24}}">
                                </div>

                                <div class="form-group">
                                    <label>Less than 24</label>
                                    <input class="form-control" name="less_than_24" value="{{$product->less_than_24}}">
                                </div>

                                <div class="form-group">
                                    <label>Less than 2</label>
                                    <input class="form-control" name="less_than_2" value="{{$product->less_than_2}}">
                                </div>

                                <div class="form-group">
                                    <label>Dosage</label>
                                    <input class="form-control" name="dosage" value="{{$product->dosage}}">
                                </div>

                                <div class="form-group">
                                    <label>Reference</label>
                                    <input class="form-control" name="reference" value="{{$product->reference}}">
                                </div>

                                <div class="form-group">
                                    <label>Ordering Size</label>
                                    <input class="form-control" name="ordering_size" value="{{$product->ordering_size}}">
                                </div>

                                <div class="form-group">
                                    <label>Quantity Required</label>
                                    <input class="form-control" name="quantity_required" value="{{$product->quantity_required}}">
                                </div>


                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                            </form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            SubProduct Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>IMMA ID Code</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($subproducts as $subproduct)
                                    <tr class="odd gradeX datarow" data-id="{{$product->id}}" data-subid="{{$subproduct->id}}">
                                        <td>{{$subproduct->id}}</td>
                                        <td><a href="">{{$subproduct->imma_id_code}}</a></td>
                                        <td>{{$subproduct->name}}</td>
                                        <td>{{$subproduct->description}}</td>
                                        <td><img src="<?= asset($subproduct->image_url)?>" height="100" ></td>
                                        <td class="center remove-row">
                                            <a href="{{url('products/')}}/{{$product->id}}/subproducts/{{$subproduct->id}}/edit">Edit</a>
                                            <a href="{{url('products/')}}/{{$product->id}}/subproducts/{{$subproduct->id}}/delete">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="odd gradeA">
                                        <td colspan="5">No records</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>

                            <a class="btn btn-primary" href="{{url('products/')}}/{{$product->id}}/subproducts/new">Add SubProduct</a>
                        </div>
                    </div>
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
                window.location.href = "{{url('/products/')}}/" + id + "/subproducts/" + subid + "/edit"
            });
        });
    </script>
@endsection

