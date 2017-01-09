

    function sendRequest() {

        var title = document.getElementById("inputTitle").value;

        $.ajax({
            method: 'POST',
            url: '/getSelectedServices',
            data: {
                'title': title
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

                }else{
                    setNotFoundMsg();
                }


            },
            error: function (jqXHR, textStatus, errorThrown) { // What to do if we fail
                console.log(JSON.stringify(jqXHR));
                console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
            }
        });

    }


    function setHeader(){
        $("#data-table").css({visibility:"visible"});
        $("#table-body").empty();
        if($("#not-found").length >0 ){
            $("#not-found").remove();
        }
    }

    function setRow(rowData) {


        var tableRow=$("<tr></tr>");

        var description=$("<td></td>").text(rowData.description);
        tableRow.append(description);

        var address=$("<td></td>").text(rowData.address);
        tableRow.append(address);

        var zip_code=$("<td></td>").text(rowData.zip_code);
        tableRow.append(zip_code);

        var city=$("<td></td>").text(rowData.city);
        tableRow.append(city);

        var distance=$("<td></td>").text("5KM");
        tableRow.append(distance);

        $("#table-body").append(tableRow);
    }

    function setNotFoundMsg(){
        if($("#not-found").length==0){
            $("#table-body").empty();
            $("#data-table").css({visibility:"hidden"});
            var message=$("<p></p>",{id:"not-found"}).text("No services available");
            $("#div-content").append(message);
        }

    }
