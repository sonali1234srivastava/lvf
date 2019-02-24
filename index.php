<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LVF Digitalisation</title>

    <link rel="shortcut icon" type="image/png" href="additional/favicon.png">
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/one-page-wonder.min.css" rel="stylesheet">

     
     
    <style type="text/css">
        
          body {
       height : 100vh;
       margin:0;
  padding:0;
    background-image: url("./img/back.jpeg");
    background-repeat: no-repeat;
  background-attachment: fixed;
   background-size: cover;
      }

        .topslider{
     margin-top: 10vh;
     }

         .serif {
  font-family: Times, Times New Roman, Georgia, serif;
               }
    </style>

  </head>

  <body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">

   <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand serif" href="#">LVF Digitalisation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="./about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="registration/index.php">Sign Up</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login/index.php">Log In</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <script src="js/jssor.slider-27.5.0.min.js" type="text/javascript"></script>
     <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideoTransitions = [
              [{b:0,d:600,y:-290,e:{y:27}}],
              [{b:0,d:1000,y:185},{b:1000,d:500,o:-1},{b:1500,d:500,o:1},{b:2000,d:1500,r:360},{b:3500,d:1000,rX:30},{b:4500,d:500,rX:-30},{b:5000,d:1000,rY:30},{b:6000,d:500,rY:-30},{b:6500,d:500,sX:1},{b:7000,d:500,sX:-1},{b:7500,d:500,sY:1},{b:8000,d:500,sY:-1},{b:8500,d:500,kX:30},{b:9000,d:500,kX:-30},{b:9500,d:500,kY:30},{b:10000,d:500,kY:-30},{b:10500,d:500,c:{x:125.00,t:-125.00}},{b:11000,d:500,c:{x:-125.00,t:125.00}}],
              [{b:0,d:600,x:535,e:{x:27}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,o:1,e:{o:5}}],
              [{b:-1,d:1,c:{x:250.0,t:-250.0}},{b:0,d:800,c:{x:-250.0,t:250.0},e:{c:{x:7,t:7}}}],
              [{b:-1,d:1,o:-1},{b:0,d:600,x:-570,o:1,e:{x:6}}],
              [{b:-1,d:1,o:-1,r:-180},{b:0,d:800,o:1,r:180,e:{r:7}}],
              [{b:0,d:1000,y:80,e:{y:24}},{b:1000,d:1100,x:570,y:170,o:-1,r:30,sX:9,sY:9,e:{x:2,y:6,r:1,sX:5,sY:5}}],
              [{b:2000,d:600,rY:30}],
              [{b:0,d:500,x:-105},{b:500,d:500,x:230},{b:1000,d:500,y:-120},{b:1500,d:500,x:-70,y:120},{b:2600,d:500,y:-80},{b:3100,d:900,y:160,e:{y:24}}],
              [{b:0,d:1000,o:-0.4,rX:2,rY:1},{b:1000,d:1000,rY:1},{b:2000,d:1000,rX:-1},{b:3000,d:1000,rY:-1},{b:4000,d:1000,o:0.4,rX:-1,rY:-1}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $Idle: 2000,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions,
                $Breaks: [
                  [{d:2000,b:1000}]
                ]
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>
    <link href="//fonts.googleapis.com/css?family=Oswald:200,300,regular,500,600,700&subset=latin-ext,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
    <style>
        /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 052 css*/
        .jssorb052 .i {position:absolute;cursor:pointer;}
        .jssorb052 .i .b {fill:#000;fill-opacity:0.3;}
        .jssorb052 .i:hover .b {fill-opacity:.7;}
        .jssorb052 .iav .b {fill-opacity: 1;}
        .jssorb052 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 053 css*/
        .jssora053 {display:block;position:absolute;cursor:pointer;}
        .jssora053 .a {fill:none;stroke:#fff;stroke-width:640;stroke-miterlimit:10;}
        .jssora053:hover {opacity:.8;}
        .jssora053.jssora053dn {opacity:.5;}
        .jssora053.jssora053ds {opacity:.3;pointer-events:none;}
    </style>

    <header class="topslider">
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
           <!-- <div>
                <img data-u="image" src="img/001.jpg" />
                <div data-t="0" style="position:absolute;top:320px;left:30px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">Mobile ready, touch swipe</div>
            </div>-->
            <div>
                <img data-u="image" src="img/1.jpg" />
                <div data-ts="flat" data-p="1360" style="position:absolute;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                    <div data-t="1" style="position:absolute;top:-50px;left:125px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">AKGEC Admin Block</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/2.jpg" />
                <div data-ts="flat" data-p="1360" style="position:absolute;top:0px;left:0px;width:980px;height:380px;">
                    <div data-t="2" style="position:absolute;top:30px;left:-505px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">AKGEC MCA Block</div>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/5.jpg" />
                <div data-t="3" style="position:absolute;top:30px;left:30px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">AKGEC LT Section</div>
            </div>
            <div>
                <img data-u="image" src="img/3.jpg" />
                <div data-t="4" style="position:absolute;top:30px;left:30px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">AKGEC MBA Block</div>
            </div>
            <div>
                <img data-u="image" src="img/7.jpg" />
                <div data-t="5" style="position:absolute;top:30px;left:600px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">AKGEC CS-IT Block</div>
            </div>
            <!--<div>
                <img data-u="image" src="img/007.jpg" />
                <div data-t="6" style="position:absolute;top:30px;left:30px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">visual slider maker</div>
            </div>-->
            <div data-b="0">
                <img data-u="image" src="img/4.jpg" />
                <div data-t="7" style="position:absolute;top:-50px;left:30px;width:500px;height:40px;font-family:Oswald,sans-serif;font-size:32px;font-weight:200;line-height:1.2;text-align:center;background-color:rgba(255,188,5,0.8);">AKGEC FAITH CENTER</div>
            </div>
            <!--<div>
                <img data-u="image" src="img/009.jpg" />
                <div data-ts="flat" data-p="1360" style="position:absolute;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                    <div data-t="8" data-ts="preserve-3d" style="position:absolute;top:25px;left:150px;width:250px;height:250px;overflow:hidden;background-color:rgba(40,177,255,0.6);">
                        <div data-t="9" style="position:absolute;top:100px;left:25px;width:200px;height:50px;font-family:Oswald,sans-serif;font-size:24px;font-weight:200;line-height:2.08;">A Child Layer</div>
                    </div>
                </div>
            </div>
            <div>
                <img data-u="image" src="img/010.jpg" />
                <div data-ts="flat" data-p="1360" style="position:absolute;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
                    <div data-t="10" style="position:absolute;top:25px;left:100px;width:300px;height:260px;font-family:Oswald,sans-serif;font-size:24px;font-weight:200;line-height:1.25;padding:15px 15px 15px 15px;box-sizing:border-box;background-color:rgba(40,177,255,0.6);background-clip:padding-box">This is full customized content layer.<br />​<br />

                        Everything is allowed.<br />​<br />You can insert

                        <a href="http://wwww.jssor.com">
                            a link
                        </a> or an image

                        <img src="img/icon_chrome.png" /> here.
                    </div>
                </div>
            </div>-->
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb052" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora053" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora053" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
  </header>

    <script type="text/javascript">jssor_1_slider_init();</script>
    <!-- #endregion Jssor Slider End -->



    <!--<header class="masthead text-center text-white">

    <div class="masthead-content wow zoomIn delay1">
        <div class="container">
          <h3 class="masthead-heading mb-0 serif">Welcome To</h3>
          <h2 class="masthead-subheading mb-0 serif">LVF  DIGITALISATION</h2>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>
      <div class="bg-circle-4 bg-circle"></div>
    </header>-->
      
    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle wow slideInRight delay1 " src="gh1.jpg" alt="GH1">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1 wow fadeInUp delay1 ">
            <div class="p-5">
              <h2 class="display-4" style="font-family: Times, Times New Roman, Georgia, serif;">Girls' Hostel 1 (GH1)...</h2>
              <p class = "wow fadeInLeft delay1" style="font-size: 17px; font-family: cursive;">GH1 is a secluded hostel exclusively for First Year Students. The hostel has a separate mess and playground courts. It also facilitates a library and a gym and TV room for recreation purposes. Hostel has a pleasant ambience with three seater rooms, clean and hygienic washrooms and a separate washing room at each floor.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6">
            <div class="p-5">
              <img class="img-fluid rounded-circle wow slideInLeft delay1 " src="gh2.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 wow fadeInUp delay1 ">
            <div class="p-5">
              <h2 class="display-4" style="font-family: Times, Times New Roman, Georgia, serif;">Girls' Hostel 2 (GH2)...</h2>
              <p class = "wow fadeInRight delay1" style="font-size: 17px; font-family: cursive;">GH2 is a hostel accomodating mixed year students in triple seater rooms. It provides TV and indoor game facilities in the common room. Apart from clean washrooms and separate washing areas, GH2 is renowned for its excellent Wifi-Connections among students.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-lg-2">
            <div class="p-5">
              <img class="img-fluid rounded-circle wow slideInRight delay1 " src="gh3.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 order-lg-1 wow fadeInUp delay1 ">
            <div class="p-5">
              <h2 class="display-4" style="font-family: Times, Times New Roman, Georgia, serif;">Girls' Hostel 3 (GH3)...</h2>
              <p class = "wow fadeInLeft delay1" style="font-size: 17px; font-family: cursive;">GH3, the hostel is marked by its large mess feeding so many individuals. It facilitates a vast playground, big enough to organise an annual event, "Garba Night" ,in the Girls' Hostel. Apart from the basic neccessities, the hostel provides a well furnished library and NetLabs to encourage students for studying diligently.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-black">
      <div class="container">
        <p class="m-0 text-center text-white small wow rotateIn delay1">Powered  By <span style = "font-size : 1.5vw;">Team CSI</span></p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <script type="text/javascript" src="animation/wow.min.js"></script>
    <link rel="stylesheet" type="text/css" href="animation/animate.css">
    
    <script type="text/javascript"> new WOW().init(); </script>

  </body>

</html>
