jQuery.ajaxSetup({
    async: false
});

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
});
