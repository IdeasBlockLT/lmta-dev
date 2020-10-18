
let threeColumns = $("#three-columns");
let oneColumn = $("#one-column");
$("#horizontal").click(function () {
    oneColumn.addClass("hide");
    oneColumn.next().find('>div').removeClass("one-column");

    threeColumns.css("display", "flex");
    threeColumns.find('>div').css("display", "block");
});

$("#vertical").click(function () {
    threeColumns.css("display", "none");
    threeColumns.find('>div').css("display", "none");

    oneColumn.removeClass("hide");
    oneColumn.next().find('>div').not('#calendar-menu').addClass("one-column");
});
