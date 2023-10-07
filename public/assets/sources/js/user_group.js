$(document).ready(function () {
    $("#kabkot").select2();
    $(".select2-container").addClass("form-select");
    $(".select2-selection").addClass("custom-selection");
    $(".select2-search__field").addClass("select2-custom-search_field");
    $(".select2-selection__arrow").addClass("d-none");
});

$("#kabkot").change(function () {
    $.get("/wilayah?kode=" + $(this).val(), function (o) {
        // $("#nama").val("PCNU " + o.data.nama);
        kota_kode = o.data.kode;
        if (kota_kode) {
            $.ajax({
                type: "GET",
                url: "/get-kecamatan/" + kota_kode,
                success: function (data) {
                    $("#kecamatan").empty();
                    $("#kecamatan").append(
                        "<option value=''> -- Pilih Kecamatan --</option>"
                    );
                    $.each(data, function (key, value) {
                        console.log(value.kode, value.nama);
                        $("#kecamatan").append(
                            "<option value='" +
                                value.kode +
                                "'>" +
                                value.nama +
                                "</option>"
                        );
                    });
                },
            });
        } else {
            $("#kecamatanSelect").empty();
            $("#kecamatanSelect").append(
                "<option value=''>Pilih Kecamatan</option>"
            );
        }
    });
});
