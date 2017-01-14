@extends('layouts.front') @section('content')
<nav class="navbar navbar-default navbar-static-top" id="client-nav">
    <p class="navbar-brand mb-0" id="title-nav">Find Your Service</p>
    <a class="navbar-brand" href="/admin" id="link-nav">Admin</a>
</nav>
<div class="container-fluid">
    <div class="jumbotron" id="div-search">
        <div class="row nested-row" id="div-title">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" id="inputTitle" placeholder="Search for service">
                </div>
            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <input type="text" class="form-control" id="inputLat" placeholder="Latitude">
                </div>

            </div>
            <div class="col-md-3">

                <div class="form-group">
                    <input type="text" class="form-control" id="inputLong" placeholder="Longitude">
                </div>

            </div>
        </div>

        <div class="row nested-row">
            <div class="col-md-3" id="searchCol">
                <div class="btn btn-default" id="search-btn">Search</div>
            </div>
            <div class="col-xs-1">

                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" id="btndistance">Distance
                        <span class="caret" /></button>
                    <ul class="dropdown-menu" id="distance">
                        <li><a href="#">1 KM</a></li>
                        <li><a href="#">2 KM</a></li>
                        <li><a href="#">5 KM</a></li>
                        <li><a href="#">10 KM</a></li>
                        <li><a href="#">25 KM</a></li>
                        <li><a href="#">50 KM</a></li>
                        <li><a href="#">100 KM</a></li>
                        <li><a href="#">Anywhere</a></li>
                    </ul>
                </div>

            </div>
        </div>


    </div>

    <div class="alert alert-danger fade in" id="error-msg">
        <strong>Error!</strong> All fields are required, latitude and longitude must have a correct format
    </div>
    <div id="div-content">
        <table class="table" id="data-table">
            <thead id="table-head">
                <tr>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Zip Code</th>
                    <th>City</th>
                    <th>Distance</th>
                </tr>
            </thead>
            <tbody id="table-body">
            </tbody>
        </table>
    </div>
</div>

@endsection
