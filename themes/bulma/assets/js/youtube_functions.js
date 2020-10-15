
/**
 * Need to wait until Youtube Player is ready!
 */
var player = null;
window.YT.ready(function() {
    console.log("API");
    player = new window.YT.Player("player", {
    height: "390",
    width: "640",
    events: {
      onReady: onPlayerReady,
      onError: error_video
    }
  });
});
  
  function onPlayerReady(event) {
    event.target.playVideo();

    var title       = document.getElementsByClassName("first-post")[0];

    // TODO: here we need to catch the title from the youtube link
    title.innerHTML = "Live now!"; 

    console.log("code");
    console.log(player.getVideoUrl());

    var query = player.getVideoUrl().split("?")[1];
    console.log("query: " + query);

    var video_query = query.split("&")[0];
    console.log("video_query: " +  video_query);

    var video_id =  video_query.split("=")[1];
    console.log("video_id" + video_id);

    var video_info_url = "http://youtube.com/get_video_info?video_id=" + video_id;
    

    console.log(player.getVideoData());

  }

function error_video(event) {
    
    document.cookie = "is_live=0";
    document.getElementById('player').src ='https://resourcespace.lmta.lt/filestore/1/6/2_85e8885fe9b2ec5/162_afefd9e4c5116d0.mp4';

    var title       = document.getElementsByClassName("first-post")[0];
    var title_string = getCookie("first_title");

    title.innerHTML = title_string;
 

}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}