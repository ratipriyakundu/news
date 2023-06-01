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
<div class="container mt-3">
    <div class="BorderColorChangeElement" style="margin: 0 auto;text-align:center;overflow:hidden;border-radius:0px;-webkit-box-shadow: 16px 17px 18px -7px rgba(18,1,18,0.61);-moz-box-shadow: 16px 17px 18px -7px rgba(18,1,18,0.61);box-shadow: 16px 17px 18px -7px rgba(18,1,18,0.61);background:#009688;border:10px solid #000000;padding:8px;width:100%">
        <div class="imgAnim296"  style="display: inline-block;position:relative;vertical-align: middle;padding:8px">
            <img src="https://1.bp.blogspot.com/-zXwrowTem0M/Xj3xuRee9SI/AAAAAAAABqQ/JKCg_K_ObTY26HhXI1JGcPtR5NLErWE8wCLcBGAsYHQ/s1600/sea-4810958_1280.jpg" style="max-width:100%;width:60px"/>
        </div>
        <div  style="display:inline-block;text-shadow:#030303 4px 4px 4px;position:relative;vertical-align: middle;padding:8px;font-size:45px;color:#ffffff;font-weight:normal">Title Here</div>
        <div  style="display:inline-block;text-shadow:#030303 4px 4px 4px;position:relative;vertical-align: middle;padding:8px;font-size:14px;color:#ffffff;font-weight:normal">Display Description of your ad here</div>
        <div class="btnAnim296"  style="display:inline-block;position:relative;vertical-align: middle;padding:8px" >
            <a target="_blank" href=""><input type="button" value="Visit Now" style="margin:0px;background:#000000;padding:8px;border:3px solid red;color:#ffffff;border-radius:0px;cursor:pointer" /></a>
        </div>
    </div>
</div>
{{-- Edit Modal --}}
<div class="modal fade" id="editModal{{$id}}" tabindex="-1" aria-labelledby="editModal{{$id}}Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body text-center p-5">
        <form action=""></form>
      </div>
    </div>
  </div>
</div>
{{-- End Edit Modal --}}