(function ($) {

    $("#submit-service").click(function () {

        var inTitle = $("#input-title").val();
        console.log("Title->" + inTitle);
        var inDesc = $("#input-desc").val();
        var inAddress = $("#input-address").val();
        var inCity = $("#input-city").val();
        var inZip = $("#input-zip").val();
        var inLat = $("#input-lat").val();
        var inLong = $("#input-long").val();

        $.ajax({
            method: 'POST',
            url: '/insertData',
            data: {
                'title': inTitle,
                'description': inDesc,
                'address': inAddress,
                'city': inCity,
                'zip_code': inZip,
                'latitude': inLat,
                'longitude': inLong
            },
            success: function (response) {
                console.log(response);
            },
            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });

    });


    function getAllRows() {
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

            var btns = $("<td></td>").text("btn btn");
            tableRow.append(btns);

            $("#table-body").append(tableRow);
        }

    }


})(jQuery);
