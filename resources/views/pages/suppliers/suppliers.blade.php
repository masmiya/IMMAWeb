@extends('layouts.app')
@section('title', 'Port Suppliers')
@section('header')

@endsection

@section('content')


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.sidebar')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Port Suppliers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Port Suppliers
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Company Name</th>
                                    <th>ISSA Membership Number</th>
                                    <th>Website</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($suppliers as $supplier)
                                    <tr class="odd gradeX datarow" data-id="{{$supplier->id}}">
                                        <td>{{$supplier->id}}</td>
                                        <td>{{$supplier->company_name}}</td>
                                        <td>{{$supplier->issa_membership_number}}</td>
                                        <td>{{$supplier->website}}</td>
                                        <td>{{$supplier->category}}</td>
                                        <td class="center remove-row">
                                            <a href="{{url('suppliers/')}}/{{$supplier->id}}/edit">Edit</a>
                                            <a href="{{url('suppliers/')}}/{{$supplier->id}}/delete">Delete</a>
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

                            <a class="btn btn-primary" href="{{url('suppliers/new')}}">Add</a>

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
                window.location.href = "{{url('/suppliers/')}}/" + id + "/edit"
            });
        });
    </script>
@endsection
