jQuery.ajaxSetup({
    async: false
});

let futureEvents = $("#future-events");
let pastEvents = $("#past-events");
$(document).ready(function () { // on document ready
    futureEvents.click(); // click the element
})

/**
 * Get the current active events to be shown future/pasts
 * @returns {string}
 */
function getActive() {
    var active = '';
    if (!futureEvents.hasClass('text-muted')) {
        var active = '#future-events';
    } else {
        var active = '#past-events';
    }
    return active;
}

let threeColumns = $("#three-columns");
let oneColumn = $("#one-column");
$("#horizontal").attr('checked', 'checked');

$("#horizontal").click(function () {
    oneColumn.addClass("hide");
    oneColumn.next().find('>div').removeClass("one-column");

    $("#horizontal").find('i').css('cssText', 'color: black;');
    $("#horizontal").attr('checked', 'checked');

    $("#vertical").find('i').css('color', '#dee2e6');
    $("#vertical").removeAttr('checked');


    threeColumns.css("display", "flex");
    threeColumns.find('>div').css("display", "block");

    let active = getActive();
    console.log('getting');
    if (active) {
        $(active).trigger('click');
    }

});

$("#vertical").click(function () {
    threeColumns.css("display", "none");
    threeColumns.find('>div').css("display", "none");

    $("#vertical").find('i').css('cssText', 'color: black;');
    $("#vertical").attr('checked', 'checked');

    $("#horizontal").find('i').css('color', '#dee2e6');
    $("#horizontal").removeAttr('checked');

    oneColumn.removeClass("hide");
    oneColumn.next().find('>div').not('#calendar-menu').addClass("one-column");

    let active = getActive();
    if (active) {
        $(active).trigger('click');
    }

});


$('#future-events, #past-events').click(function () {

        let futureEvents = $("#future-events");
        futureEvents.css("font-weight", "bold")
        let pastEvents = $("#past-events");

        var operator = '';
        if (!typeof active) {
            var operator = $(active).attr('value');
        } else {
            var operator = $(this).attr('value');
        }

        if ($(this).attr('id') === futureEvents.attr('id')) {
            futureEvents.removeClass('text-muted');
            futureEvents.css('font-weight', 'bold');
            pastEvents.addClass('text-muted');
            pastEvents.css('font-weight', '');
        } else {
            pastEvents.removeClass('text-muted');
            pastEvents.css('font-weight', 'bold');
            futureEvents.addClass('text-muted');
            futureEvents.css('font-weight', '');
        }

        var template = '';

        var attr = $("#horizontal").attr('checked');
        // For some browsers, `attr` is undefined; for others,
        // `attr` is false.  Check for both.
        if (typeof attr !== typeof undefined && attr !== false) {
            template = 'three-columns';
        } else {
            template = 'one-column';
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
                template: template
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
    }
)

