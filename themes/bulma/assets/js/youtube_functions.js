
/**
 * Need to wait until Youtube Player is ready!
 */
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
    title.innerHTML = "Live now!"; 

  }

function error_video(event) {
    
    document.cookie = "is_live=0";
    document.getElementById('player').src ='https://resourcespace.lmta.lt/filestore/1/6/2_85e8885fe9b2ec5/162_afefd9e4c5116d0.mp4';

    var title       = document.getElementsByClassName("first-post")[0];
    var title_string = getCookie("first_title");

    // title.innerHTML = title_string;
    title.innerHTML = 'coco';
 

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