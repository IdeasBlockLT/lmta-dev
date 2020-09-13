
import { hello } from './endpoints.js';
// let val = hello();

// History details ajax form(the table submit action)
$(document).on('click', '#search-button', function (e) {
    e.preventDefault();
    var url = 'http://localhost:8080/wordpress/search';
    var data = $('#search').serialize();
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (response){
            var obj = JSON.parse(response);
            let html = [
                '<span id="textID" class="card-title titles">' + obj.success + '</span>',
            ].join("\n");
            $("#notify").show();
            $("#notify__message").append(html);
            $("#notify").delay(1500).fadeOut(200);
            $(".jquery-modal").delay(1500).fadeOut('slow', function() {
                $(this).removeClass("blocker");
            });
        }
    })
})