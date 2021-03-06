let futureEvents = $("#future-events");
let pastEvents = $("#past-events");

function getActive() {
    var active = '';
    if (!futureEvents.hasClass('text-muted')) {
        var active = '#future-events';
    } else {
        var active = '#past-events';
    }
    return active;
}

function getTemplate()
{
    let template = '';
    if ($("#horizontal").attr('data-checked')){
        template = 'three-columns';
    }else{
        template = 'one-column';
    }
    return template;
}

let threeColumns = $("#three-columns");
let oneColumn = $("#one-column");

$("#horizontal").click(function () {
    horizontal();
});

$("#vertical").click(function () {
    vertical();
});

function horizontal()
{
    oneColumn.css("display", "none");
    oneColumn.find('>div').css("display", "none");

    $("#horizontal").find('i').css('cssText', 'color: black;');
    $("#horizontal").attr('data-checked', true);

    $("#vertical").find('i').css('color', '#dee2e6');
    $("#vertical").removeAttr('data-checked');


    threeColumns.css("display", "flex");
    threeColumns.find('>div').css("display", "block");

    let active = getActive();
    if (active) {
        $(active).trigger('click');
    }
}

function vertical()
{
    threeColumns.css("display", "none");
    threeColumns.find('>div').css("display", "none");

    oneColumn.css("display", "flex");
    oneColumn.find('>div').css("display", "flex");

    $("#vertical").find('i').css('cssText', 'color: black;');
    $("#vertical").attr('data-checked', true);

    $("#horizontal").find('i').css('color', '#dee2e6');
    $("#horizontal").removeAttr('data-checked');

    oneColumn.removeClass("hide");
    oneColumn.next().find('>div').not('#calendar-menu').addClass("one-column");

    let active = getActive();
    if (active) {
        $(active).trigger('click');
    }
}

jQuery(document).on('click', '.page-numbers', function (e) {
    e.preventDefault();

    var page = $(this).html();

    let slug = $("#slug").attr('data-slug');
    var template = getTemplate();
    var order = 'DESC';

    let operator = '';

    if ($('#future-events').hasClass('text-muted')) {
        operator = $('#past-events').attr('value');
    } else {
        operator = $('#future-events').attr('value');
    }

    $.ajax({
        beforeSend: function () {
            $("#loader1").show();
            $("#inside-loader").show();
        },
        async: true,
        type: "POST",
        url: '/wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
            action: 'filter_projects',
            events: operator,
            template: template,
            slug: slug,
            page: page,
            order: order,
        },
        success: function (response) {
            if (template === 'one-column') {
                $('#one-column').html(response);
            } else {
                $('#three-columns').html(response);
            }
        },
        complete: function (data) {
            // Hide image container
            $("#loader1").hide();
            $("#inside-loader").hide();
        }
    })

});




