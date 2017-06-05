@extends('layouts.app')
@section('title', 'Global Documents')
@section('header')


@endsection

@section('content')


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.sidebar')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Global Documens</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Global Documents
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Version</th>
                                    <th>Attachment</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($docs as $doc)
                                    <tr class="odd gradeX datarow" data-id="{{$doc->id}}">
                                        <td>{{$doc->id}}</td>
                                        <td>{{$doc->document_name}}</td>
                                        <td>{{$doc->version}}</td>
                                        <td>
                                            @if(isset($doc->url))
                                            <a href="{{url($doc->url)}}">{{$doc->document_name}}</a></td>
                                            @endif
                                        <td class="center remove-row">
                                            <a href="{{url('globaldocs/')}}/{{$doc->id}}/delete">Delete</a>
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

                            <a class="btn btn-primary" href="{{url('globaldocs/new')}}">Add Document</a>

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
                window.location.href = "{{url('/globaldocs/')}}/" + id + "/edit"
            });
        });
    </script>
@endsection
