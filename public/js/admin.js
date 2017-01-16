(function ($) {


    //When app is loaded
    $(document).ready(function () {
        if ($("#services-div").text() != "NotAdmin") {

            //set the csrf token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var services = JSON.parse($("#services-div").text());
            console.log(services);

            showSelectData(services);

        } else {
            console.log(" not admin");
        }

    });

    //Delete row
    $(document).on("click", ".btn-delete", function () {
        var row = $(this).closest("tr"),
            $tds = row.find("td");

        console.log($($tds[0]).text());
        var inId = $($tds[0]).text();

        $.ajax({
            method: 'POST',
            url: '/deleteRow',
            data: {
                'id': inId
            },
            success: function (response) {
                $.ajax({
                    method: 'GET',
                    url: '/getData',
                    success: function (response) {
                        showSelectData(response);
                    },
                    error: function () {
                        console.log("get Selected data error");
                    }

                });
            },
            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });


    });



    //opens update modal
    $(document).on("click", ".btn-update", function () {

        var row = $(this).closest("tr"),
            $tds = row.find("td");

        $("#upd-id").text($($tds[0]).text());
        $("#upd-input-title").val($($tds[1]).text());
        $("#upd-input-desc").val($($tds[2]).text());
        $("#upd-input-address").val($($tds[3]).text());
        $("#upd-input-zip").val($($tds[4]).text());
        $("#upd-input-city").val($($tds[5]).text());
        $("#upd-input-lat").val($($tds[6]).text());
        $("#upd-input-long").val($($tds[7]).text());

        $("#update-service").modal("show");

    });

    //Update row
    $("#upd-submit-service").click(function () {
        console.log("on click");
        if (validateUpdateServiceEntry()) {

            console.log("pass validate");
            $("#upd-error-msg").css({
                visibility: "hidden"
            });


            var inId = $("#upd-id").text();
            var inTitle = $("#upd-input-title").val();
            var inDesc = $("#upd-input-desc").val();
            var inAddress = $("#upd-input-address").val();
            var inCity = $("#upd-input-city").val();
            var inZip = $("#upd-input-zip").val();
            var inLat = $("#upd-input-lat").val();
            var inLong = $("#upd-input-long").val();


            $.ajax({
                method: 'POST',
                url: '/updateRow',
                data: {
                    'id': inId,
                    'title': inTitle,
                    'description': inDesc,
                    'address': inAddress,
                    'city': inCity,
                    'zip_code': inZip,
                    'latitude': inLat,
                    'longitude': inLong
                },
                success: function (response) {
                    $.ajax({
                        method: 'GET',
                        url: '/getData',
                        success: function (response) {
                            showSelectData(response);
                        },
                        error: function () {
                            console.log("get Selected data error");
                        }

                    });
                },
                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });

            $('#update-service').modal('toggle');

        }else {
            $("#upd-error-msg").css({
                visibility: "visible"
            });
        }

    });

    //Insert row
    $("#submit-service").click(function () {

        if (validateNewServiceEntry()) {

            $("#new-error-msg").css({
                visibility: "hidden"
            });

            var inTitle = $("#input-title").val();
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

                    $("#modal-body").find("input:text").val("");
                    $("#input-desc").val("");
                    $.ajax({
                        method: 'GET',
                        url: '/getData',
                        success: function (response) {
                            showSelectData(response);
                        },
                        error: function () {
                            console.log("get Selected data error");
                        }

                    });
                },
                error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                    console.log(JSON.stringify(jqXHR));
                    console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
                }
            });


            $('#new-service').modal('toggle');


        } else {
            $("#new-error-msg").css({
                visibility: "visible"
            });
        }



    });

    $("#cancel-submit").click(function () {

        $("#new-error-msg").css({
            visibility: "hidden"
        });

    });

    $("#cancel-update").click(function () {

        $("#upd-error-msg").css({
            visibility: "hidden"
        });

    });

    function showSelectData(services) {
        $("#table-body").empty();
        var i = 0;
        for (i; i < services.length; i++) {

            var tableRow = $("<tr></tr>",{class:"in-data-tr"});

            var id = $("<td></td>", {
                id: "row-id"
            }).text(services[i].id)
            tableRow.append(id);

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

            var buttonsCol = $("<td></td>");

            var deleteBtn = $("<button></button>", {
                class: "btn btn-default btn-delete",
                type: "button"
            });
            var deleteImg = $("<img/>", {
                src: "icons/delete.png",
                class:"delete-img"
            });

            deleteBtn.append(deleteImg);


            var updateBtn = $("<button></button>", {
                class: "btn btn-default btn-update",
                type: "button"
            });

            var updateImg = $("<img/>", {
                src: "icons/edit.png",
                class:"update-img"
            });

            updateBtn.append(updateImg);

            buttonsCol.append(deleteBtn);
            buttonsCol.append(updateBtn);
            tableRow.append(buttonsCol);

            $("#table-body").append(tableRow);
        }
    }



    function validateNewServiceEntry() {

        if ($.trim($("#input-title").val()) == "") {
            return false;
        }
        if ($.trim($("#input-desc").val()) == "") {
            return false;
        }
        if ($.trim($("#input-address").val()) == "") {
            return false;
        }
        if ($.trim($("#input-city").val()) == "") {
            return false;
        }
        if ($.trim($("#input-zip").val()) == "") {
            return false;
        }
        if (!$.isNumeric($("#input-lat").val())) {
            return false;
        }
        if (!$.isNumeric($("#input-long").val())) {

        }

        return true;

    }

    function validateUpdateServiceEntry() {

        if ($.trim($("#upd-input-title").val()) == "") {
            return false;
        }
        if ($.trim($("#upd-input-desc").val()) == "") {
            return false;
        }
        if ($.trim($("#upd-input-address").val()) == "") {
            return false;
        }
        if ($.trim($("#upd-input-city").val()) == "") {
            return false;
        }
        if ($.trim($("#upd-input-zip").val()) == "") {
            return false;
        }
        if (!$.isNumeric($("#upd-input-lat").val())) {
            return false;
        }
        if (!$.isNumeric($("#upd-input-long").val())) {

        }

        return true;

    }


})(jQuery);
