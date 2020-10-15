
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
    title.innerHTML = "NOT Live now!"; 
 

}