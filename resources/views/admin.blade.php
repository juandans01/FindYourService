<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Cabin+Condensed|Gudea" rel="stylesheet">

</head>

<style type="text/css">
    #options {
        min-width: 20px;
    }
</style>

<body>
    <div class="container-fluid">
        <div id="menu-div">

        </div>
        <div id="data-div">
            <table class="table" id="data-table">
                <thead id="table-head">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Address</th>
                        <th>Zip Code</th>
                        <th>City</th>
                        <th>Lat</th>
                        <th>Long</th>
                        <th id=options></th>
                    </tr>
                </thead>
                <tbody id="table-body">
                </tbody>
            </table>
        </div>
    </div>

</body>

<script type="text/javascript">
    var services = <?php echo json_encode($services); ?>;
    var i = 0;
    for (i; i < services.length; i++) {

        var tableRow = $("<tr></tr>");

        var title = $("<td></td>").text(services[i].title);
        tableRow.append(title);

        var description = $("<td></td>").text(services[i].description);
        tableRow.append(description);

        var address = $("<td></td>").text(services[i].address);
        tableRow.append(address);

        var zip_code = $("<td></td>").text(services[i].zip_code);
        tableRow.append(zip_code);

        var city = $("<td></td>").text(services[i].city);
        tableRow.append(city);

        var geo_lat = $("<td></td>").text(services[i].geo_lat);
        tableRow.append(geo_lat);

        var geo_long = $("<td></td>").text(services[i].geo_long);
        tableRow.append(geo_long);

        var btns= $("<td></td>").text("btn btn");
        tableRow.append(btns);

        $("#table-body").append(tableRow);
    }
</script>

</html>
