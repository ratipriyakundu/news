<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Instagram Reels Clone</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <style>
        * {
        margin: 0;
        box-sizing: border-box;
        }

        html {
        scroll-snap-type: y mandatory;
        }

        body {
        color: white;
        background-color: black;
        height: 100vh;
        display: grid;
        place-items: center;
        }

        .app__videos {
        position: relative;
        height: 750px;
        background-color: white;
        overflow: scroll;
        width: 100%;
        max-width: 400px;
        scroll-snap-type: y mandatory;
        border-radius: 20px;
        }

        .app__videos::-webkit-scrollbar {
        display: none;
        }

        .app__videos {
        -ms-overflow-style: none;
        scrollbar-width: none;
        }

        .video {
        position: relative;
        height: 100%;
        width: 100%;
        background-color: white;
        scroll-snap-align: start;
        }

        .video__player {
        object-fit: cover;
        max-width: 700px;
        height: 100vh;
        }

        @media (max-width: 425px) {
        .app__videos {
            width: 100%;
            height: 100%;
            max-width: 100%;
            border-radius: 0;
        }
        }

        /* video header */

        .videoHeader {
        position: absolute;
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        }

        .videoHeader * {
        padding: 20px;
        }

        /* video footer */

        .videoFooter {
        position: relative;
        bottom: 100px;
        margin-left: 20px;
        }

        .videoFooter__text {
        position: absolute;
        bottom: 0;
        color: white;
        display: flex;
        align-items: center;
        margin-bottom: 45px;
        }

        .user__avatar {
        border-radius: 50%;
        width: 50px;
        height: 50px;
        }

        .videoFooter__text h3 {
        margin-left: 10px;
        }

        .videoFooter__text h3 button {
        color: white;
        font-weight: 900;
        text-transform: inherit;
        background: rgba(0, 0, 0, 0.5);
        border: none;
        padding: 5px;
        }

        .videoFooter__ticker {
        width: 60%;
        margin-left: 30px;
        margin-bottom: 20px;
        height: fit-content;
        }

        .videoFooter__ticker marquee {
        font-size: 12px;
        padding-top: 7px;
        color: white;
        }

        .videoFooter__ticker .material-icons {
        position: absolute;
        left: 5px;
        color: white;
        }

        .videoFooter__actions {
        display: flex;
        position: absolute;
        width: 95%;
        justify-content: space-between;
        color: white;
        }

        .videoFooter__actionsLeft .material-icons {
        padding: 0 7px;
        font-size: 1.6em;
        }

        .videoFooter__actionsRight .material-icons {
        font-size: 25px;
        }

        .videoFooter__actionsRight {
        display: flex;
        }

        .videoFooter__stat {
        display: flex;
        align-items: center;
        margin-right: 10px;
        }

        .videoFooter__stat p {
        margin-left: 3px;
        }
    </style>
  </head>
  <body>
    <div class="app__videos">
      @foreach($reels as $reel)
        <div class="video">
          <video autoplay class="video__player" src="{{$reel->video}}" loop></video>

          <!-- footer starts -->
          <div class="videoFooter">
              <div class="videoFooter__text">
                <h3><button>Follow</button></h3>
              </div>
            </div>
            <!-- footer ends -->
        </div>
      @endforeach
    </div>

    <script>
      function playPauseVideo() {
        let videos = document.querySelectorAll("video");
        videos.forEach((video) => {
          video.muted = true;
          let playPromise = video.play();
          if (playPromise !== undefined) {
              playPromise.then((_) => {
                  let observer = new IntersectionObserver(
                      (entries) => {
                          entries.forEach((entry) => {
                              if (
                                  entry.intersectionRatio !== 1 &&
                                  !video.paused
                              ) {
                                  video.pause();
                                  //video.muted = true;
                              } else if (video.paused) {
                                  video.play();
                                  video.muted = false;
                              }
                          });
                      },
                      { threshold: 0.2 }
                  );
                  observer.observe(video);
              });
          }
    });
}

// And you would kick this off where appropriate with:
playPauseVideo();
    </script>
  </body>
</html>