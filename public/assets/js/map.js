$(".view").on("click", function () {
    var id = $(this).val();
    var title = $(this).parent().find(".card-title").text();
    // get data-lat and data-lng from button

    var myLatLng = {
        lat: $(this).data("lat"),
        lng: $(this).data("lng"),
    };

    $("#mapModal").modal("show");
    $("#mapModal")
        .find(".modal-title")
        .text(title + " Location");

    // create map
    var map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        center: myLatLng,
    });

    new google.maps.Marker({
        position: new google.maps.LatLng(myLatLng.lat, myLatLng.lng),
        map: map,
    });
});
