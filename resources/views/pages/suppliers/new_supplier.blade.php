@extends('layouts.app')
@section('title', 'Port Supplier - New')
@section('header')

    <![endif]-->

@endsection

@section('content')


    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.sidebar')


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">New Port Supplier</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Port Supplier Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <!-- /.table-responsive -->

                            <form method="post" action="{{url('/suppliers/')}}/new">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input class="form-control" name="company_name">
                                </div>

                                <div class="form-group">
                                    <label>Port</label>
                                    <select class="form-control" name="port_id">
                                        @foreach($ports as $port)
                                        <option value="{{$port->id}}">{{$port->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>ISSA Membership Number</label>
                                    <input class="form-control" name="issa_membership_number">
                                </div>

                                <div class="form-group">
                                    <label>Website</label>
                                    <input class="form-control" name="website">
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <input class="form-control" name="category">
                                </div>

                                <div class="form-group">
                                    <label>Specialised In</label>
                                    <input class="form-control" name="specialised_in">
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="address">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" name="phone">
                                </div>

                                <div class="form-group">
                                    <label>Fax</label>
                                    <input class="form-control" name="fax">
                                </div>

                                <div class="form-group">
                                    <label>Hours</label>
                                    <input class="form-control" name="hours">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" name="email">
                                </div>

                                <div class="form-group">
                                    <label>Contact1 Name</label>
                                    <input class="form-control" name="contact1_name">
                                </div>

                                <div class="form-group">
                                    <label>Contact1 Mobile</label>
                                    <input class="form-control" name="contact1_mobile">
                                </div>

                                <div class="form-group">
                                    <label>Contact2 Name</label>
                                    <input class="form-control" name="contact2_name">
                                </div>

                                <div class="form-group">
                                    <label>Contact2 Mobile</label>
                                    <input class="form-control" name="contact2_mobile">
                                </div>

                                <div class="form-group">
                                    <label>Also Services</label>
                                    <input class="form-control" name="also_services">
                                </div>

                                <div class="form-group">
                                    <label>ISO</label>
                                    <input class="form-control" name="iso">
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
