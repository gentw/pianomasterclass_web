@extends('index')
@section('title_and_meta')

@endsection
@section('content')
<div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
        <div class="nav-title">
          <img style="margin-left:-28px" class="logo" src="/img/manjakos/<%includes.global.one[0]['header_info']['collections']['logo_header']%>" />
        </div>
    </div>
    <div class="lang_apply" style="width: 400px;
position: absolute;
top: 50%;
right: 236px;
transform: translateY(-50%);
display: flex;
justify-content: space-around;
align-items: center;">
<div>
<a href="/event/{{$lang}}" style="padding: 15px 20px; width:auto !important" class="btn">@if($lang == 'en') Apply Now @else Apliko Tani @endif</a>
</div>

<div>
	@if($lang == 'en')
        <a href="/{{$slug}}/al" style="font-weight:bold;">SQ</a>
	@else
	<a href="/{{$slug}}/en" style="font-weight:bold;">ENG</a>
        @endif
</div>
    </div>
    <div class="nav-btn">
        <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
        </label>
    </div>
    
    <div class="nav-links">
        <a class="nav-link" href="#home">@if($lang == 'en') Home @else Kreu @endif</a>
        <a class="nav-link" href="#about">@if($lang == 'en') About @else Rreth Ngjarjes @endif</a>
        <a class="nav-link" href="#artists">@if($lang == 'en') Artists @else Artistat @endif</a>
        <a style="color: red;" class="nav-link" href="/event/{{$lang}}">@if($lang == 'en') Apply Now @else Apliko Tani  @endif</a>
    </div>
    </div>

    <section class="slash" style="padding-left:0; padding-right:0; padding-top:141px; padding-bottom: 0;">
      
      
         
            <div class="owl-carousel owl-theme">           
                <div class="navigation">
                    <a data-target="/event/{{$lang}}" href="/event/{{$lang}}">
                        <div class="slide-image">
                          <img src="/img/manjakos/<%includes.global.one[0]['event_info']['collections']['image_cover_event']%>" />
                        </div></a>
                    <!--<h4 class="heading-fustani">
                        <a href="/event"><%includes.global.one[0]['event_info']['collections']['title_event']['{{$lang}}']%></a> / 
                        <a href="/event" style="font-size:15px; color:#000;">Apply Now</a>
                    </h4>-->
                </div>
        
            
            </div>
    </section>
<div id="wrapper">

    

<main class="container homepage page-slash template-slash">

<section id="about" class="slash slash--about">
  <h2>
  <%includes.global.one[0]['about']['collections']['title_about']['{{$lang}}']%>
  </h2>
  <div class="o-grid">
    <div class="rtf">
    {!!$one['about']['collections']['content_about'][$lang]!!}
    </div>
  </div>
</section>





<section id="artists" style="padding-bottom: 150px;" class="slash slash--people slash--people--artists">
  <h2>
    Artists
  </h2>
  <ul class="slash--people__list">
    @foreach ($many[0]["artists"] as $box) 
        <li class="slash--people__speaker">
      <div class="inner">
        <a href="/artists/{!!$box['id']!!}/{!!$box['slugable'][$lang]!!}/{{$lang}}" title="{!!$box['collections']['name'][$lang]!!}">
          <figure>
            <img width="700" height="1050" src="/img/manjakos/{!!$box['collections']['image']!!}" alt="" loading="lazy" srcset="/img/manjakos/{!!$box['collections']['image']!!}" sizes="(max-width: 700px) 100vw, 700px" />          </figure>
          
        </div>
       <div class="infos">
          {!!$box['collections']['name'][$lang]!!}
          {!!$box['collections']['position'][$lang]!!}
          </a>
      </div>
    </li>
    @endforeach
    
      </ul>
</section>

  <section class="news slash--news">
    <div class="grid">
      <div class="col-1">
        <div class="col-1-inner">
          <h2><%includes.global.one[0]['apply_now']['collections']['before_btn_text']['{{$lang}}']%></h2>
          <p class="button rose">
            <a href="<%includes.global.one[0]['apply_now']['collections']['btn_link']['{{$lang}}']%>"><%includes.global.one[0]['apply_now']['collections']['btn_text']['{{$lang}}']%> →</a>
          </p>
        </div>
      </div>
      <div class="col-2">
                <article>
          <a href="/event" title="Piano MASTERCLASS with The MASTERS by Deniza Derdovski">
            <figure class="milieu">
              <img width="1400" height="1867" src="/img/manjakos/" alt="" loading="lazy" srcset="/uploads/posteri.jpg" sizes="(max-width: 1400px) 100vw, 1400px" />            </figure>
            <div class="inner">
              <time datetime="2022-02-15T09:56:40+01:00">MAY 8-15, 2022</time>
              <h3 class="stagger">
              <%includes.global.one[0]['event_info']['collections']['title_event']['{{$lang}}']%>              </h3>
            </div>
          </a>
        </article>
              </div>
    </div>
  </section>


<!-- <section class="slash slash--program">

  

      <h2>
      Program
    </h2>
    <ul class="slash--program__days">
          <li class="slash--program__day">
        <h3>
          March 2021 - June 2022          <span class="is-fr" lang="fr"></span>
        </h3>
                  <ul>
                      <li class="slash--program__conference">
              <span class="hours">→ Online</span>
              <h4>
                Coaching program                <span class="is-fr" lang="fr"></span>
              </h4>
                              <div class="rtf">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<i><span style="font-weight: 400;"><br>
</span></i></p>
<p></p>
                </div>
                                        </li>
                    </ul>
              </li>
          <li class="slash--program__day">
        <h3>
          January 2022 - June 2022          <span class="is-fr" lang="fr"></span>
        </h3>
                  <ul>
                      <li class="slash--program__conference">
              <span class="hours">→ Online</span>
              <h4>
                Inspiring meetings                 <span class="is-fr" lang="fr"></span>
              </h4>
                              <div class="rtf">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
                                        </li>
                    </ul>
              </li>
          <li class="slash--program__day">
        <h3>
          September 2021          <span class="is-fr" lang="fr"></span>
        </h3>
                  <ul>
                      <li class="slash--program__conference">
              <span class="hours">→ Lisbon, Portugal</span>
              <h4>
                Author’s right and copyright workshop                <span class="is-fr" lang="fr"></span>
              </h4>
                              <div class="rtf">
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
<ul>
<li>Under­stand­ing the entire author’s right and copy­right value&nbsp;chain</li>
<li>Work­ing with an Author Soci­ety: regis­tra­tion, declar­a­tion, author’s right/copyright man­age­ment, metadata, and roy­al­ties track­ing&nbsp;tools</li>
<li>Work­ing with a&nbsp;pub­lish­er: interests and relationships</li>
<li>Devel­op­ing its back cata­logue thanks to the stream­ing platform</li>
<li>Build­ing new strategies with music lib­rary company</li>
<li>The future of author’s right / copy­right: block­chain and footprinting</li>
</ul>
<p><i><span style="font-weight: 400;">Giv­en the inter­na­tion­al health situ­ation, the pro­gram might be sub­ject to change depend­ing on san­it­ary restric­tions and travel conditions.</span></i></p>
                </div>
                                        </li>
                    </ul>
              </li>
         
        
        </ul>
  </section> -->

<section id="informations" style="background:#fff;" class="slash slash--infos">
  <h2>
  <%includes.global.one[0]['informations']['collections']['title_information']['{{$lang}}']%>
  </h2>
  <div class="rtf rtf_custom" style="display: flex;
justify-content: space-evenly;
align-items: center;
">
 @foreach ($many[1]["partners_home"] as $box)
<div>
	<a href="{!!$box['collections']['partner_link'][$lang]!!}">
		<img style="height: 200px;" src="/img/manjakos/{!!$box['collections']['partner_logo']!!}">
	</a>
</div>
@endforeach
     
  </div>
</section>
@endsection
