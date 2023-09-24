<div class="blogBox moreBox" ng-repeat="enets_saml in includes.global.many[0]['news']">
    <div class="item">
        <img ng-src="/img/manjakos/<%enets_saml['collections']['image']%>" class="wow fadeInUp" data-wow-delay="0.6s">
        <div class="blogTxt">
            <h6 class="wow fadeInUp" data-wow-delay="0.2s"><%enets_saml['collections']['title']['en']%></h6>
            <p ng-bind-html="enets_saml['collections']['description']['en']" class="wow fadeInUp" data-wow-delay="0.4s"></p>  
            <a href="/news/<%enets_saml.id%>/<%enets_saml.slugable.en%>">
                <div class="btn default_button default_button_white">
                    <span>Read More</span>
                </div>
            </a>
        </div>
    </div>
</div>