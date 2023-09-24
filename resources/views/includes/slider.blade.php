<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div ng-if="includes.global">
        <!-- <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol> -->
        <div class="carousel-inner">
            <div class="carousel-item carousel_mod" data-ng-class="{active : $first}"
                ng-repeat="slider in includes.global.many[4]['slider_top']">
                <div class="overlay_slider_top"></div>
                <img ng-src="/img/manjakos/<%slider['collections']['image']%>">
                <div class="carousel-caption">
                    <h5 class="wow fadeInUp titleh1" data-wow-duration="1s" data-wow-delay=".4s">
                        <%slider['collections']['title']['en']%></h5>
                    <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".6s"
                        ng-bind-html="slider['collections']['paragraph']['en']"></p>
                    <a href="/contact">
                        <div class="btn default_button wow fadeInUp" data-wow-delay="0.6s"
                            style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">
                            <span>Contact Us</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>