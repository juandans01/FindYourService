(function ($) {

    $("#search-btn").click(sendRequest);

    $("#distance li a").click(function () {
        $("#btndistance:first-child").text($(this).text());
        $("#btndistance:first-child").val($(this).val());
    });

    //Sends select request with title as filter
    function sendRequest() {

        var title = $("#inputTitle").val();

        var latitude = $("#inputLat").val();

        var longitude = $("#inputLong").val();

        var maxDistance = $("#btndistance").text().trim();

        if (maxDistance == "Anywhere") {
            maxDistance=20048;
            console.log(maxDistance);
        }else if(maxDistance == "Distance"){
            maxDistance=0;
            console.log(maxDistance);
        }else{
            var numberFormat = /\d+/g;
            var numbersArray = maxDistance.match(numberFormat);
            maxDistance = numbersArray[0];
            console.log(maxDistance + "<- maxDistance");
        }



        $.ajax({
            method: 'POST',
            url: '/getSelectedServices',
            data: {
                'title': title,
                'latitude': latitude,
                'longitude': longitude,
                'max_distance': maxDistance
            },
            success: function (response) {
                console.log(response);

                if (response.length > 0) {
                    setHeader();
                    var i = 0;
                    for (i; i < response.length; i++) {
                        setRow(response[i]);
                        console.log(response[i].address);
                    }

                } else {
                    setNotFoundMsg();
                }


            },
            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });

    }



    //sets table header if query returned rows
    function setHeader() {
        $("#data-table").css({
            visibility: "visible"
        });
        $("#table-body").empty();
        if ($("#not-found").length > 0) {
            $("#not-found").remove();
        }
    }

    //set a single row of data
    function setRow(rowData) {


        var tableRow = $("<tr></tr>");

        var description = $("<td></td>").text(rowData.description);
        tableRow.append(description);

        var address = $("<td></td>").text(rowData.address);
        tableRow.append(address);

        var zip_code = $("<td></td>").text(rowData.zip_code);
        tableRow.append(zip_code);

        var city = $("<td></td>").text(rowData.city);
        tableRow.append(city);

        var distance = $("<td></td>").text(rowData.distance.toFixed(1) + " KM");
        tableRow.append(distance);

        $("#table-body").append(tableRow);
    }

    //set a message if query didn't return rows
    function setNotFoundMsg() {
        if ($("#not-found").length == 0) {
            $("#table-body").empty();
            $("#data-table").css({
                visibility: "hidden"
            });
            var message = $("<p></p>", {
                id: "not-found"
            }).text("No services available");
            $("#div-content").append(message);
        }

    }



})(jQuery);
