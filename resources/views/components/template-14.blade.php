<style>
    .BorderColorChangeElement {
        animation: BorderColorChange 1s ease-out 0s infinite alternate none running;
    }
    @keyframes BorderColorChange{
          0%  { border: 10px solid #ffc0cb;}
          100%  { border: 10px solid #ff69b4;}
    }
    @keyframes rotateAnim {
        0% { transform: rotate(deg);}
        100% { transform:rotate(360deg);}
    }
    @keyframes scaler {
      0% {
        transform: scale(1);
      }
      100% {    transform: scale(1.5);
      }
    }
    .imgAnim296 {
      animation: rotateAnim 10s linear 0s infinite forwards running;
    }
    .btnAnim296 {
      animation: scaler 1s linear 0s infinite alternate none running;
    }
    .btnAnim296:hover{
      animation-play-state: paused;
    }
</style>
<div class="container-fluid mt-3">
    <div>
        <p class="h5 fw-bold mb-4">
            <span class="red-bullet"></span>
            <span class="d-inline">रील्ज़</span>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card br-0" style="width: 100%;">
                <div class="card-body">
                    <div class="owl-carousel-6 owl-carousel owl-theme">
                        @php
                          $reels = \App\Models\Reel::orderBy('id','DESC')->take(10)->get();
                        @endphp
                        @foreach($reels as $reel)
                          <div class="item">
                            <a class="card br-0 text-decoration-none" href="{{route('reels')}}" style="width: 100%;">
                                <div class="card-body">
                                    <video style="width:100%;height:300px; object-fit:cover;" class="video__player" src="{{$reel->video}}"></video>
                                </div>
                            </a>
                          </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>