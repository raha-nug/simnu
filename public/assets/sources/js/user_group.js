$(document).ready(function () {
    $("#kabkot").select2();
    $(".select2-container").addClass("form-select");
    $(".select2-selection").addClass("custom-selection");
    $(".select2-search__field").addClass("select2-custom-search_field");
    $(".select2-selection__arrow").addClass("d-none");
});

$("#kabkot").change(function () {
    var kota = $.get("/wilayah?kode=" + $(this).val());
    $.each(kota, function (key, value) {
        console.log(value.kode);
    });
});
