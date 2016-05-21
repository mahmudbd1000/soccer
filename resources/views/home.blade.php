
<!DOCTYPE html>
<!--[if lt IE 7]>      <html lang="en" class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html lang="en" class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    @include('common.head')

    <body id="body">

        <!-- preloader -->
        <div id="preloader">
            <div class="loder-box">
                <div class="battery"></div>
            </div>
        </div>
        <!-- end preloader -->

        @include('common.header')

    <main class="site-content" role="main">

        <!--
        Home Slider
        ==================================== -->

        <section id="home-slider">
            <div id="slider" class="sl-slider-wrapper">

                <div class="sl-slider">

                    <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">

                        <div class="bg-img bg-img-1"></div>

                        <div class="slide-caption">
                            <div class="caption-content">
                                <h2 class="animated fadeInDownBig">Welcome To</h2>
                                <h1 class="animated fadeInLeftBig">West Valley</h1>
                                <h2 class="animated fadeInRightBig">Football CLub</h2>
                            </div>
                        </div>

                    </div>

                    <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">

                        <div class="bg-img bg-img-2"></div>
                        <div class="slide-caption">
                            <div class="caption-content">
                                <h1 class="animated fadeInUpBig">Fixture</h1>
                                <h1 class="animated fadeInDownBig">Results</h1>
                            </div>
                        </div>

                    </div>

                    <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">

                        <div class="bg-img bg-img-3"></div>
                        <div class="slide-caption">
                            <div class="caption-content">
                                <h1 class="animated fadeInUpBig">Some text</h1>
                                <h1 class="animated fadeInDownBig">Here</h1>
                            </div>
                            <!--                                <div class="caption-content">
                                                                <h2>BLUE Onepage HTML5 Template</h2>
                                                                <span>Clean and Professional one page Template</span>
                                                                <a href="#" class="btn btn-blue btn-effect">Join US</a>
                                                            </div>-->
                        </div>

                    </div>

                    <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="15" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="2.5">

                        <div class="bg-img bg-img-4"></div>
                        <div class="slide-caption">
                            <div class="caption-content">
                                <h1 class="animated fadeInUpBig">Slider caption</h1>
                                <h1 class="animated fadeInDownBig">Here</h1>
                            </div>
                            <!--                                <div class="caption-content">
                                                                <h2>BLUE Onepage HTML5 Template</h2>
                                                                <span>Clean and Professional one page Template</span>
                                                                <a href="#" class="btn btn-blue btn-effect">Join US</a>
                                                            </div>-->
                        </div>

                    </div>

                </div><!-- /sl-slider -->

                <!-- 
                <nav id="nav-arrows" class="nav-arrows">
                    <span class="nav-arrow-prev">Previous</span>
                    <span class="nav-arrow-next">Next</span>
                </nav>
                -->

                <nav id="nav-arrows" class="nav-arrows hidden-xs hidden-sm visible-md visible-lg">
                    <a href="javascript:;" class="sl-prev">
                        <i class="fa fa-angle-left fa-3x"></i>
                    </a>
                    <a href="javascript:;" class="sl-next">
                        <i class="fa fa-angle-right fa-3x"></i>
                    </a>
                </nav>


                <nav id="nav-dots" class="nav-dots visible-xs visible-sm hidden-md hidden-lg">
                    <span class="nav-dot-current"></span>
                    <span></span>
                    <span></span>
                </nav>

            </div><!-- /slider-wrapper -->
        </section>

        <!--
        End Home SliderEnd
        ==================================== -->

        <!-- about section -->
        <section id="about" >
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 wow animated fadeInRight">
                        <div class="welcome-block text-center">
                            <h1>
                                <span>
                                    <span><img alt="" src="img/uk.png"></span>
                                    Centroamericanos
                                </span>
                                <span>VS</span>
                                <span>
                                    Guadalajara
                                    <span><img alt="" src="img/France.png"></span>
                                </span>
                            </h1>								
                            <!--                                <div class="message-body">
                                                                <img src="img/member-1.jpg" class="pull-left" alt="member">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                                            </div>
                                                            <a href="#" class="btn btn-border btn-effect pull-right">Read More</a>-->
                        </div>
                    </div>
                    <div class="col-xs-12 wow animated fadeInLeft">
                        <div class="recent-works text-center">
                            <h3>
                                <span>
                                    <i class="fa fa-calendar"></i>06 May 2016 - 5:30 pm
                                </span>
                                <span>
                                    <i class="fa fa-location-arrow"></i>Mesquite 1
                                </span>
                            </h3>
                            <!--                                <h3>Recent Works</h3>-->
                            <!--                                <div id="works">
                                                                <div class="work-item">
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br> <br> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                                                </div>
                                                                <div class="work-item">
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                                                </div>
                                                                <div class="work-item">
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. <br><br> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                                                                </div>
                                                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end about section -->

        <!-- portfolio section -->
        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 animated fadeInLeft">
                        <div class="calendar-container">
                            <header>
                                <div class="month">Standings</div>
                            </header>

                            <table class="calendar">
                                <thead>
                                    <tr>
                                        <td>Team</td>
                                        <td>W</td>
                                        <td>L</td>
                                        <td>D</td>
                                        <td>PTS</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td><span class="team-count">1</span> Demo Mayor</td>
                                        <td>10</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <td><span class="team-count">2</span> Deomo Primera</td>
                                        <td>10</td>
                                        <td>3</td>
                                        <td>1</td>
                                        <td>33</td>
                                    </tr>
                                    <tr>
                                        <td><span class="team-count">3</span> V C. Americanos</td>
                                        <td>9</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>28</td>
                                    </tr>
                                    <tr>
                                        <td><span class="team-count">4</span> V Soledad</td>
                                        <td>7</td>
                                        <td>2</td>
                                        <td>1</td>
                                        <td>23</td>
                                    </tr>
                                    <tr>
                                        <td><span class="team-count">5</span> Crankyes</td>
                                        <td>7</td>
                                        <td>1</td>
                                        <td>0</td>
                                        <td>22</td>
                                    </tr>
                                    <tr>
                                        <td><span class="team-count">6</span> V Rivera&#8217;s Tile</td>
                                        <td>6</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>20</td>
                                    </tr>
                                    <tr>
                                        <td><span class="team-count">7</span> V Penuelas</td>
                                        <td>5</td>
                                        <td>4</td>
                                        <td>1</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td><span class="team-count">8</span> V Inter</td>
                                        <td>6</td>
                                        <td>1</td>
                                        <td>3</td>
                                        <td>19</td>
                                    </tr>
                                    <tr>
                                        <td><span class="team-count">9</span> V Quetzal FC</td>
                                        <td>5</td>
                                        <td>3</td>
                                        <td>2</td>
                                        <td>18</td>
                                    </tr>
                                    <tr>
                                        <td><span class="team-count">13</span> V La Piedad</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td>2</td>
                                        <td>16</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-6 animated fadeInRight">
                        <div class="calendar-container">
                            <header class="animated-header">
                                <div class="month">Schedules & Results</div>
                            </header>

                            <table class="calendar">
                                <thead>
                                    <tr>
                                        <td>Date</td>
                                        <td>Team A</td>
                                        <td>Vs</td>
                                        <td>Team B</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>Guadalajara</td>
                                        <td>VS</td>
                                        <td>Galaxy</td>
                                    </tr>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>Leon</td>
                                        <td>VS</td>
                                        <td>Juventus</td>
                                    </tr>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>Chelsea Fc</td>
                                        <td>VS</td>
                                        <td>Mexico</td>
                                    </tr>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>La Hacienda</td>
                                        <td>VS</td>
                                        <td>Centroamericanos</td>
                                    </tr>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>La Piedad</td>
                                        <td>VS</td>
                                        <td>Inter</td>
                                    </tr>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>Rivera's Tile</td>
                                        <td>VS</td>
                                        <td>Pumas</td>
                                    </tr>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>Crankys</td>
                                        <td>VS</td>
                                        <td>Queretaro</td>
                                    </tr>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>Dep Guerrero</td>
                                        <td>VS</td>
                                        <td>Halcones</td>
                                    </tr>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>Durango</td>
                                        <td>VS</td>
                                        <td>Atl. Penuelas</td>
                                    </tr>
                                    <tr>
                                        <td>13 May, 2016</td>
                                        <td>Quetzal FC</td>
                                        <td>VS</td>
                                        <td>Soledad</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end portfolio section -->


        <!-- Service section -->
        <section id="service">
            <div class="container">
                <div class="row news">
                    <div class="sec-title text-center">
                        <h2 class="wow animated bounceInLeft">Recent News</h2>
                    </div>
                    <div class="col-md-4 text-left">
                        <img class="img-responsive picsGall" src="img/File-Apr-22-9-49-22-AM-750x360.jpeg"/>
                        <h3><a href="#">El Campeonisimo Soledad</a></h3>
                        <ul>
                            <li><i class="fa fa-calendar"></i>03 Dec 2013</li>
                            <li><a href="#"><i class="fa fa-user"></i>Umar</a></li>
                            <li><a href="#"><i class="fa fa-comments"></i>17 comments</a></li>
                        </ul>
                        <p> Honor a quien honor merece. Si nos gusta el buen futbol, debemos aceptar que el equipo la Soledad nos ha dado mucho... <a class="readMore" href="#">Read More <i class="fa fa-angle-right"></i></a></p>
                        <hr class="hrNews">
                    </div>
                    <div class="col-md-4 text-left">
                        <img class="img-responsive picsGall" src="img/FOT6621-e1462148953425-750x360.jpg"/>
                        <h3><a href="#">Segunda Campeon Dorados</a></h3>
                        <ul>
                            <li><i class="fa fa-calendar"></i>01 May 2016</li>
                            <li><a href="#"><i class="fa fa-folder-open"></i>Juan Graciano</a></li>
                            <li><a href="#"><i class="fa fa-comments"></i>17 comments</a></li>
                        </ul>
                        <p>Dorados protagoniso magistralmente el juego de finales contra el equipo Rivera’s Tile. Al final de 90 minutos Dorados resulto Campeon. <a class="readMore" href="#">Read More <i class="fa fa-angle-right"></i></a></p>
                        <hr class="hrNews">
                    </div>
                    <div class="col-md-4 text-left">
                        <img class="img-responsive picsGall" src="img/File-May-01-2-37-23-PM-e1462140209728-750x360.jpeg"/>
                        <h3><a href="#">Cuatro Graduados de las Infantiles</a></h3>
                        <ul>
                            <li><i class="fa fa-calendar"></i>01 May 2016</li>
                            <li><a href="#"><i class="fa fa-folder-open"></i>Juan Graciano</a></li>
                            <li><a href="#"><i class="fa fa-comments"></i>1 comments</a></li>
                        </ul>
                        <p>El equipo Cathedral City FC campeon de la division Mayor de la Liga de Palm Springs cuenta en sus filas con 7 Jugadores... <a class="readMore" href="#">Read More <i class="fa fa-angle-right"></i></a></p>
                        <hr class="hrNews">
                    </div>
                    <div class="col-md-4 text-left">
                        <img class="img-responsive picsGall" src="img/Barcelona-750x360.jpeg"/>
                        <h3><a href="#">Barcelona Campeon Femenil</a></h3>
                        <ul>
                            <li><i class="fa fa-calendar"></i>01 May 2016</li>
                            <li><a href="#"><i class="fa fa-folder-open"></i>Juan Graciano</a></li>
                            <li><a href="#"><i class="fa fa-comments"></i>7 comments</a></li>
                        </ul>
                        <p>Mayo 1 de 2016, El equipo Barcelona de la division Femenil Logro el campeonato luego de un cerrado encuentro contra el anterior equipo...  <a class="readMore" href="#">Read More <i class="fa fa-angle-right"></i></a></p>
                        <hr class="hrNews">
                    </div>
                    <div class="col-md-4 text-left">
                        <img class="img-responsive picsGall" src="img/File-Apr-22-9-49-22-AM-750x360.jpeg"/>
                        <h3><a href="#">El Campeonisimo Soledad</a></h3>
                        <ul>
                            <li><i class="fa fa-calendar"></i>03 Dec 2013</li>
                            <li><a href="#"><i class="fa fa-user"></i>Umar</a></li>
                            <li><a href="#"><i class="fa fa-comments"></i>17 comments</a></li>
                        </ul>
                        <p> Honor a quien honor merece. Si nos gusta el buen futbol, debemos aceptar que el equipo la Soledad nos ha dado mucho... <a class="readMore" href="#">Read More <i class="fa fa-angle-right"></i></a></p>
                        <hr class="hrNews">
                    </div>
                    <div class="col-md-4 text-left">
                        <img class="img-responsive picsGall" src="img/FOT6621-e1462148953425-750x360.jpg"/>
                        <h3><a href="#">Segunda Campeon Dorados</a></h3>
                        <ul>
                            <li><i class="fa fa-calendar"></i>01 May 2016</li>
                            <li><a href="#"><i class="fa fa-folder-open"></i>Juan Graciano</a></li>
                            <li><a href="#"><i class="fa fa-comments"></i>17 comments</a></li>
                        </ul>
                        <p>Dorados protagoniso magistralmente el juego de finales contra el equipo Rivera’s Tile. Al final de 90 minutos Dorados resulto Campeon. <a class="readMore" href="#">Read More <i class="fa fa-angle-right"></i></a></p>
                        <hr class="hrNews">
                    </div>
                </div>
                <!--                    <div class="row">
                
                                        <div class="sec-title text-center">
                                            <h2 class="wow animated bounceInLeft">Recent News</h2>
                                            <p class="wow animated bounceInRight">The Key Features of our Job</p>
                                        </div>
                
                                        <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn">
                                            <div class="service-item">
                                                <div class="service-icon">
                                                    <i class="fa fa-home fa-3x"></i>
                                                </div>
                                                <h3>Support</h3>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                            </div>
                                        </div>
                
                                        <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.3s">
                                            <div class="service-item">
                                                <div class="service-icon">
                                                    <i class="fa fa-tasks fa-3x"></i>
                                                </div>
                                                <h3>Well Documented</h3>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                            </div>
                                        </div>
                
                                        <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.6s">
                                            <div class="service-item">
                                                <div class="service-icon">
                                                    <i class="fa fa-clock-o fa-3x"></i>
                                                </div>
                                                <h3>Design UI/UX</h3>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                                            </div>
                                        </div>
                
                                        <div class="col-md-4 col-sm-6 col-xs-12 text-center wow animated zoomIn" data-wow-delay="0.9s">
                                            <div class="service-item">
                                                <div class="service-icon">
                                                    <i class="fa fa-heart fa-3x"></i>
                                                </div>
                
                                                <h3>Web Security</h3>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>							
                                            </div>
                                        </div>
                
                                    </div>-->
            </div>
        </section>
        <!-- end Service section -->



        <!-- Testimonial section -->
        <section id="testimonials" class="parallax">
            <div class="overlay">
                <div class="container">
                    <div class="row">

                        <div class="sec-title text-center white wow animated fadeInDown">
                            <h2>Players</h2>
                        </div>

                        <div id="testimonial" class=" wow animated fadeInUp">
                            <div class="testimonial-item text-center slidep">
                                <img class="img-responsive" src="img/slide-3-400x400.jpg">
                                <div class="row">
                                    <div class="slidepleft_inn">
                                        <h1>12</h1>
                                    </div>
                                    <div class="slidepright_inn">
                                        <h3>Michael Owen</h3>
                                        <h5>Forwarder</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item text-center slidep">
                                <img class="img-responsive" src="img/4234306-cristiano-ronaldo.jpg">
                                <div class="row">
                                    <div class="slidepleft_inn">
                                        <h1>15</h1>
                                    </div>
                                    <div class="slidepright_inn">
                                        <h3>Louis Saurez</h3>
                                        <h5>Defender</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item text-center slidep">
                                <img class="img-responsive" src="img/photodune.jpg">
                                <div class="row">
                                    <div class="slidepleft_inn">
                                        <h1>05</h1>
                                    </div>
                                    <div class="slidepright_inn">
                                        <h3>Patrick Pater</h3>
                                        <h5>Defender</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item text-center slidep">
                                <img class="img-responsive" src="img/Neymar.jpg">
                                <div class="row">
                                    <div class="slidepleft_inn">
                                        <h1>08</h1>
                                    </div>
                                    <div class="slidepright_inn">
                                        <h3>David Beckham</h3>
                                        <h5>Midfielder </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item text-center slidep">
                                <img class="img-responsive" src="img/4234306-cristiano-ronaldo.jpg">
                                <div class="row">
                                    <div class="slidepleft_inn">
                                        <h1>14</h1>
                                    </div>
                                    <div class="slidepright_inn">
                                        <h3>Pete Matthern</h3>
                                        <h5>Forwarder</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-item text-center slidep">
                                <img class="img-responsive" src="img/slide-3-400x400.jpg">
                                <div class="row">
                                    <div class="slidepleft_inn">
                                        <h1>11</h1>
                                    </div>
                                    <div class="slidepright_inn">
                                        <h3>Haward Smith</h3>
                                        <h5>Striker</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- end Testimonial section -->

        <!-- Price section -->
        <section id="price">
            <div class="container">
                <div class="row">

                    <div class="sec-title text-center wow animated fadeInDown">
                        <h2>Featured Video</h2>
                    </div>

                    <div class="col-md-6 wow animated fadeInUp">
                        <iframe style="width: 100%; height: 300px;" src="//player.vimeo.com/video/81042264?title=0&amp;byline=0&amp;portrait=0" id="gdlr-video-4952"></iframe>
                    </div>

                    <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.4s">
                        <iframe style="width: 100%; height: 300px;" src="//player.vimeo.com/video/81042264?title=0&amp;byline=0&amp;portrait=0" id="gdlr-video-4952"></iframe>
                    </div>

                    <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.8s">
                        <iframe style="width: 100%; height: 300px;" src="//player.vimeo.com/video/81042264?title=0&amp;byline=0&amp;portrait=0" id="gdlr-video-4952"></iframe>
                    </div>
                    <div class="col-md-6 wow animated fadeInUp" data-wow-delay="0.8s">
                        <iframe style="width: 100%; height: 300px;" src="//player.vimeo.com/video/81042264?title=0&amp;byline=0&amp;portrait=0" id="gdlr-video-4952"></iframe>
                    </div>

                </div>
            </div>
        </section>
        <!-- end Price section -->

        <!-- Social section -->
        <section id="social" class="parallax">
            <div class="overlay">
                <div class="container">
                    <div class="row">

                        <div class="sec-title text-center white wow animated fadeInDown">
                            <h2>FOLLOW US</h2>
                        </div>

                        <ul class="social-button">
                            <li class="wow animated zoomIn"><a href="https://www.facebook.com/palmspringssoccerleague/" target="_blank"><i class="fa fa-facebook fa-2x"></i></a></li>
                            <li class="wow animated zoomIn" data-wow-delay="0.3s"><a href="https://twitter.com/grasjuan"><i class="fa fa-twitter fa-2x"></i></a></li>
                            <li class="wow animated zoomIn" data-wow-delay="0.6s"><a href="#"><i class="fa fa-vimeo-square fa-2x"></i></a></li>							
                        </ul>

                    </div>
                </div>
            </div>
        </section>
        <!-- end Social section -->

        <!-- Contact section -->
        <section id="contact" >
            <div class="container">
                <div class="row">

                    <div class="sec-title text-center wow animated fadeInDown">
                        <h2>Contact</h2>
                    </div>

                    <div class="col-xs-12 wow animated fadeInRight text-center">
                        <address class="contact-details">
                            <h3>Contact Us</h3>						
                            <p><i class="fa fa-pencil"></i>4729 E. Sunny Dunes Rd. <span>Palm Springs CA 92264 </span><span>United State</span></p><br>
                            <p>
                                <i class="fa fa-envelope"></i><a href="mailto:pgraciano@aol.com">pgraciano@aol.com</a>
                            </p>
                            <p><i class="fa fa-phone"></i>
                                Presidente Roberto mejia<br>
                                Phone: 760 250 74 25 </p>
                            <p><i class="fa fa-envelope"></i><a href="http://palmspringssoccerleague.com" target="_blank">palmspringssoccerleague.com</a></p>
                        </address>
                    </div>

                </div>
            </div>
        </section>
        <!-- end Contact section -->

        <section id="google-map">
            <div id="map-canvas" class="wow animated fadeInUp"></div>
        </section>

    </main>
      @include('common.footer')
</body>
</html>