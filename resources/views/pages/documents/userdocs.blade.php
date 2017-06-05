@extends('layouts.app')
@section('title', 'User Documents')
@section('header')


@endsection

@section('content')


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.sidebar')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Documens</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            User Documents
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Attachment</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($docs as $doc)
                                    <tr class="odd gradeX datarow" data-id="{{$doc->id}}">
                                        <td>{{$doc->id}}</td>
                                        <td>{{$doc->document_name}}</td>
                                        <td>
                                            @if(isset($doc->url))
                                                <a href="{{url($doc->url)}}">{{$doc->document_name}}</a></td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr class="odd gradeA">
                                        <td colspan="5">No records</td>
                                    </tr>
                                @endforelse

                                </tbody>
                            </table>
                            <!-- /.table-responsive -->


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
                //window.location.href = "{{url('/userdocs/')}}/" + id + "/edit"
            });
        });
    </script>
@endsection
