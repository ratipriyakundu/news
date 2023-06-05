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
  </style>
</head>
  <body>
    <amp-story standalone
      title="Key Highlights of AMP Conf 2018"
      publisher="The AMP team"
      publisher-logo-src="https://ampbyexample.com/img/AMP-Brand-White-Icon.svg"
      poster-portrait-src="https://ampbyexample.com/img/overview.jpg">
      
    <!-- <amp-story-auto-ads>
      <script type="application/json">
        {
          "ad-attributes": {
            "type": "doubleclick",
            "data-slot": "/30497360/a4a/amp_story_dfp_example"
          }
        }
      </script>
    </amp-story-auto-ads>
 -->
      
      <amp-story-page id="page-1">
        <amp-story-grid-layer template="fill">
          <amp-video autoplay loop
            width="400"
            height="750"
            poster="https://ampbyexample.com/img/poster0.png"
            layout="fill">
            <source src="https://ampbyexample.com/video/p1.mp4" type="video/mp4">
          </amp-video>
        </amp-story-grid-layer>
      </amp-story-page>

      <amp-story-page id="page-2">
        <amp-story-grid-layer template="fill">
          <amp-img width="400" height="750" layout="fill" src="https://ampbyexample.com/img/overview.jpg"></amp-img>
        </amp-story-grid-layer>
        <amp-story-grid-layer template="vertical" class="bottom">
          <h2 class="bold">Overview</h2>
          <p>We held the second AMP Conf to celebrate the breadth of the AMP
            community and announce the latest AMP innovations. We engaged 400+
            devs in-person over two days and thousands globally on live stream.</p>
          <p class="last">Here are the key launches by the AMP team and others this year</p>
        </amp-story-grid-layer>
      </amp-story-page>

      <amp-story-page id="page-3">
        <amp-story-grid-layer template="fill">
          <amp-video autoplay loop
            width="400"
            height="750"
            poster="https://ampbyexample.com/img/poster.jpg"
            layout="fill">
            <source src="https://ampbyexample.com/video/stamp-animation.mp4" type="video/mp4">
          </amp-video>
        </amp-story-grid-layer>
        <amp-story-grid-layer template="vertical" class="bottom">
          <div class="introducing">
            <p class="bold blue twenty-px center">Introducing</p>
            <h2 class="bold blue center last">AMP Stories</h2>
          </div>
        </amp-story-grid-layer>
      </amp-story-page>

      <amp-story-page id="page-4">
        <amp-story-grid-layer template="fill">
          <amp-img width="400" height="750" layout="fill" src="https://ampbyexample.com/img/blue-stuff.jpg"></amp-img>
        </amp-story-grid-layer>
        <amp-story-grid-layer template="vertical" class="bottom">
          <h1 class="bold">A visual storytelling format fot the open web</h1>
          <p class="last">Providing content publishers with a mobile-focused
            format for delivering news and information as visual, tap-through
            stories on the open web.</p>
        </amp-story-grid-layer>
      </amp-story-page>

      <amp-story-page id="page-5" auto-advance-after="stamp-vid">
        <amp-story-grid-layer template="fill">
          <amp-video autoplay
            id="stamp-vid"
            width="400"
            height="750"
            poster="https://ampbyexample.com/img/poster2.jpg"
            layout="fill">
            <source src="https://ampbyexample.com/video/stamp.mp4" type="video/mp4">
            <track default src="https://ampbyexample.com/video/stamp.vtt" srclang="en">
          </amp-video>
        </amp-story-grid-layer>
        <amp-story-grid-layer template="thirds">
          <div grid-area="lower-third" class="subtitle-page">
            <p class="bold twenty-px center">
              Telling stories with AMP.
            </p>
          </div>
        </amp-story-grid-layer>
      </amp-story-page>

      <amp-story-page id="page-6">
        <amp-story-grid-layer template="fill">
          <amp-video autoplay loop
            width="400"
            height="750"
            poster="https://ampbyexample.com/img/poster3.jpg"
            layout="fill">
            <source src="https://ampbyexample.com/video/gmail-animation.mp4" type="video/mp4">
          </amp-video>
        </amp-story-grid-layer>
        <amp-story-grid-layer template="vertical">
          <div class="introducing">
            <p class="bold twenty-px center first">Introducing</p>
            <h2 class="bold center">AMP For Email</h2>
          </div>
        </amp-story-grid-layer>
      </amp-story-page>

      <amp-story-page id="page-7">
        <amp-story-grid-layer template="fill">
          <amp-img width="400" height="750" layout="fill" src="https://ampbyexample.com/img/blue-gmail.jpg"></amp-img>
        </amp-story-grid-layer>
        <amp-story-grid-layer template="vertical" class="bottom">
          <h1 class="bold">Bringing the power of AMP to Gmail</h1>
          <p class="last">New spec allows developers to create more engaging,
            interactive, and actionable email experiences with AMP content.</p>
        </amp-story-grid-layer>
      </amp-story-page>
  </body>
</html>