$(".edit").click(function (e) {
    e.preventDefault();
    // get the value of this button
    var name_id = $(this).val();
    $("#editModal").modal("show");

    // ajax request to get the data
    $.ajax({
        type: "GET",
        url: "edit-name/" + name_id,
        success: function (response) {
            $("#editModal").find("#name_id").val(name_id);
            $("#editModal").find("#name").val(response.famousName.name);
            $("#editModal").find("#latitude").val(response.famousName.lat);
            $("#editModal").find("#longitude").val(response.famousName.lng);
        },
    });
});

$(".delete").click(function (e) {
    e.preventDefault();
    // get the value of this button
    var name_id = $(this).val();
    $("#deleteModal").modal("show");
    $("#del_name_id").val(name_id);
});
