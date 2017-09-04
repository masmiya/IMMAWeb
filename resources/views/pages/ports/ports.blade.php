@extends('layouts.app')
@section('title', 'Ports')
@section('header')


@endsection

@section('content')


<div id="wrapper">

    <!-- Navigation -->
    @include('layouts.sidebar')


    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Ports</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ports
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Location</th>
                                <th>Country</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($ports as $port)
                                <tr class="odd gradeX datarow" data-id="{{$port->id}}">
                                    <td>{{$port->id}}</td>
                                    <td>{{$port->name}}</td>
                                    <td>({{$port->latitude}},{{$port->longitude}})</td>
                                    <td>{{$port->country}}</td>
                                    <td>{{$port->description}}</td>
                                    <td class="center remove-row">
                                        <a href="{{url('ports/')}}/{{$port->id}}/edit">Edit</a>
                                        <a href="{{url('ports/')}}/{{$port->id}}/delete">Delete</a>
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

                        <a class="btn btn-primary" href="{{url('ports/new')}}">Add Port</a>

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
                window.location.href = "{{url('/ports/')}}/" + id + "/edit"
            });
        });
    </script>
@endsection
