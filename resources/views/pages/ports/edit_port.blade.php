@extends('layouts.app')
@section('title', 'Ports - New')
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
                    <h1 class="page-header">New Port</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Port Information
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <!-- /.table-responsive -->

                            <form method="post" action="{{url('/ports/')}}/{{$port->id}}/edit">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$port->id}}">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" name="name" value="{{$port->name}}">
                                </div>

                                <div class="form-group">
                                    <label>Location</label> <br>
                                    Longitude: <input class="form-control" id="olng" name="longitude" value="{{$port->longitude}}">

                                    Latitude: <input class="form-control" id="olat" name="latitude" value="{{$port->latitude}}">

                                    <div id="googleMap" style="height: 400px; width: 100%;"></div>
                                </div>

                                <div class="form-group">
                                    <label>Country</label>
                                    <input class="form-control" name="country" value="{{$port->country}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="description" value="{{$port->description}}">
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
        var lng = parseFloat("{!!$port->longitude!!}");
        var lat = parseFloat("{!!$port->latitude!!}");
        var marker;
        var map;

        function myMap() {

            var myCenter = new google.maps.LatLng(lng,lat);
            var mapProp= {
                center:myCenter,
                zoom:5
            };
            map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
            marker = new google.maps.Marker({position:myCenter});
            marker.setMap(map);

            google.maps.event.addListener(map, 'click', function(event) {
                marker.position = event.latLng;
                marker.setMap(map);

                var oLng = document.getElementById("olng");
                var oLat = document.getElementById("olat");
                console.log(oLng);
                console.log(oLat);

                oLng.value = event.latLng.lng();
                oLat.value = event.latLng.lat();
            });


        }


    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzjeZ1lORVesmjaaFu0EbYeTw84t1_nek&libraries=places&callback=myMap"></script>
@endsection
