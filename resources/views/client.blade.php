<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<style>
    /*By Class*/

    .nested-row {
        margin: 20px;
    }

    .btn-beauty {
        color: #fff;
        background-color: #008080;
        border-color: black;
        width: 90%;
        height: 34px;
        text-align: center;
        align-items: center;
        font-size: 15px;
        float: right;
    }
    /*By id*/

    #div-search {
        margin-top: 70px;
        background-color: mediumpurple;
    }

    #div-title {
        margin-top: 20px;
    }

    #searchCol {
        float: right;
    }
</style>

<body>

    <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
        <a class="navbar-brand" href="#">Find your Service!</a>
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
                    <div class="btn btn-beauty" onclick="sendRequest()">Search</div>
                </div>
                <div class="col-xs-1">

                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" id="btndistance">Distance
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

        <div id="div-content">

        </div>
    </div>
</body>

<script type=text/javascript>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("#distance li a").click(function () {
        $("#btndistance:first-child").text($(this).text());
        $("#btndistance:first-child").val($(this).val());
    });


    function sendRequest() {
        var title = document.getElementById("inputTitle").value;
        console.log(title);

        $.ajax({
            method: 'POST',
            url: '/getSelectedServices',
            data: {
                'title': title
            },
            success: function (response) {
                console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });

    }
</script>




</html>
