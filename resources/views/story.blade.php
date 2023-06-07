<!doctype html>
<html ⚡ lang="en">
<head>
  <meta charset="utf-8">
  <link rel="canonical" href="https://ampbyexample.com/stories/monetization/doubleclick/">
  <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
  <script async src="https://cdn.ampproject.org/v0.js"></script>
  <title>AMP Stories</title>

  <script async custom-element="amp-story" src="https://cdn.ampproject.org/v0/amp-story-1.0.js"></script>
  <script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script>

  <script async custom-element="amp-story-auto-ads" src="https://cdn.ampproject.org/v0/amp-story-auto-ads-0.1.js"></script>

  <style amp-custom>
    * {
      box-sizing: border-box;
    }
    amp-story * {
      font-family: 'Helvitica Nueve', sans-serif;
      color: white;
    }
    amp-story-page {
      background: white;
    }
    amp-story h1 {
      font-size: 46px;
    }
    amp-story h2 {
      font-size: 36px;
    }
    amp-story p {
      font-size: 16px;
      line-height: 24px;
    }
    .bold {
      font-weight: bold;
    }
    .bottom {
      align-content: end;
    }
    .medium {
      font-weight: 600;
    }
    .first {
      padding-top: 65px;
    }
    .last {
      padding-bottom: 65px;
    }
    .blue {
      color: #4285F4;
    }
    .twenty-px {
      font-size: 20px;
    }
    .center {
      text-align: center;
    }
    .lh30 {
      line-height: 30px;
    }
    .icon {
      background-image: url(https://ampbyexample.com/img/AMP-Brand-White-Icon.svg);
      background-repeat: no-repeat;
      background-size: 50px 50px;
      height: 50px;
      object-fit: contain;
      width: 50px;
    }
    .byline {
      letter-spacing: 1.28px;
      padding-bottom: 58px;
    }
    .introducing * {
      line-height: 42px;
    }
    .subtitle-page {
      padding-top: 80px;
    }
    .button {
      align-items: center;
      border: 4px solid #FFFFFF;
      color: #FFFFFF;
      display: flex;
      height: 60px;
      margin: 0 auto;
      max-width: 240px;
      text-decoration:none;
    }
    .button p {
      font-size: 20px;
      width: 100%;
    }
    amp-ad[template="image-template"] img,
		
    amp-ad[template="video-template"] {
      object-fit: cover;
    }
    ::cue {
      background-color: rgba(0, 0, 0, 0.75);
      font-size: 24px;
      line-height: 1.5;
    }
    .bottom {
      position: relative;
    }
    .slide-title {
      position: absolute;
      bottom: 0px;
      padding: 10px;
      color: white;
      font-weight: 700;
      background-color: #222222;
      opacity: 0.8;
    }
    .i-amphtml-story-share-control {
      display: none !important;
    }
  </style>
</head>
  <body>
    <amp-story standalone
      title="Key Highlights of AMP Conf 2018"
      publisher="The AMP team"
      publisher-logo-src="https://ampbyexample.com/img/AMP-Brand-White-Icon.svg"
      poster-portrait-src="https://ampbyexample.com/img/overview.jpg">
      
     <amp-story-auto-ads>
      <script type="application/json">
        {
          "ad-attributes": {
            "type": "doubleclick",
            "data-slot": "/30497360/a4a/amp_story_dfp_example"
          }
        }
      </script>
    </amp-story-auto-ads>
    
      
     
      @php
          
      @endphp
      @php
        $id = 0;
      @endphp
      @foreach($slides as $slide)
        @php
            $id = $id + 1;
        @endphp
        <amp-story-page id="page-{{$id}}">
          <amp-story-grid-layer template="fill">
            <amp-img width="400" height="750" layout="fill" src="{{$slide->image}}"></amp-img>
          </amp-story-grid-layer>
          <amp-story-grid-layer template="vertical" class="bottom">
            <p class="slide-title">
              {{$slide->title}}
            </p>
          </amp-story-grid-layer>
        </amp-story-page>
      @endforeach

  </body>
</html>