
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

    var title          = document.getElementsByClassName("first-post")[0];
    var link           = document.getElementsByClassName("first-post-link")[0];
    var first_post_div = document.getElementsByClassName("first-post-div")[0];
    var excerpt        = first_post_div.getElementsByTagName("p")[1];
    var button         = first_post_div.getElementsByClassName("btn")[0];
    
    var videoData = player.getVideoData();
    console.log(videoData);
    // TODO: here we need to catch the title from the youtube link with API
    var videoTitle = videoData['title'];
    title.innerHTML = "Live now!- "+ videoTitle;
    link.href = "https://www.youtube.com/watch?v="+videoData['video_id'];
    button.href = "https://www.youtube.com/watch?v="+videoData['video_id'];
    excerpt.innerHTML = ""; 

  }

function error_video(event) {
    
    document.cookie = "is_live=0";
    document.getElementById('player').src ='https://resourcespace.lmta.lt/filestore/1/6/2_85e8885fe9b2ec5/162_afefd9e4c5116d0.mp4';

    var title       = document.getElementsByClassName("first-post")[0];
    var link        = document.getElementsByClassName("first-post-link")[0];
    var excerpt     = document.getElementsByClassName("first-post-excerpt")[0];
    
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