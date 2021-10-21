$('#profile-regionid').change(function(){
    let id = $(this).val();

    $.ajax({
        method: "get",
        url: "/ajax/cities",
        data: { id: id},
        success: function(data) {
            $('#profile-cityid').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
});

$('#company-regionid').change(function(){
    let id = $(this).val();

    $.ajax({
        method: "get",
        url: "/ajax/cities",
        data: { id: id},
        success: function(data) {
            $('#company-cityid').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
});

$('#worker-regionid').change(function(){
    let id = $(this).val();

    $.ajax({
        method: "get",
        url: "/ajax/cities",
        data: { id: id},
        success: function(data) {
            $('#worker-cityid').html(data);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
});