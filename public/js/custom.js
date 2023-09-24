

$(document).ready(function() {
    initOwl();
});

function initOwl() {
    //owl carousel
    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
        autoplay:true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:false
            },
            600:{
                items:1,
                nav:false
            },
            1000:{
                items:1,
                nav:false,
                loop:false
            }
        }
    });

    function resizeImageOwl() {
        // resize image Owl
        var height = $(window).height() - 120;

        if($(window).width() <= 599){
            $(".slide-image").css("height", height);
            $(".slide-image img").attr("src", "/uploads/posteri.jpg");
        } else {
            $(".slide-image img").attr("src", '/img/manjakos'+includes.global.one[0]['event_info']['collections']['image_cover_event']);
            
        }
    }
    resizeImageOwl();
    

    $(window).resize(function() {
        resizeImageOwl();
    });
}

$(".nav-link").on("click", function() {
    $('#nav-check').prop('checked', false);
});

$("#apply_1").on("click", function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: $("#apply_form").offset().top - 100 }, 500);
    $("#price").val("active");
});

$("#apply_2").on("click", function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: $("#apply_form").offset().top - 100 }, 500);
    $("#price").val("passive");
});

var form = $("#form"),
fname = $("#fname"),
lname = $("#lname"),
email = $("#email"),
intLevel = $("#intLevel"),
price = $("#price"),
country = $("#country"),
city = $("#city"),
bdMonth = $("#bdMonth"),
bdDay = $("#bdDay"),
bdYear = $("#bdYear");

function validate() {
    console.log($("#fname").val());
    var valid = true;
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
   
    // if($.trim(fname.val()) === ""){
    //     toastr.error("Error", "First name is required.");
    //     return false;
    // }

    // if($.trim(lname.val()) === "") {
    //     toastr.error("Error", "Last name is required.");
    //     return false;
    // }

    // if($.trim(email.val()) === "") {
    //     toastr.error("Error", "Email is required.");
    //     return false;
    // }

    // if(!regex.test(email.val())) {
    //     toastr.error("Error", "Please type email correctly.");
    //     return false;
    // }

    // if($.trim(intLevel.val()) === "") {
    //     toastr.error("Error", "Please choose Interested Level.");
    //     return false;
    // }

    // if($.trim(price.val()) === "") {
    //     toastr.error("Error", "Please choose Price.");
    //     return false;
    // }

    // if($.trim(country.val()) === "") {
    //     toastr.error("Error", "Country is required.");
    //     return false;
    // }
    // if($.trim(city.val()) === "") {
    //     toastr.error("Error", "City is required.");
    //     return false;
    // }
    // if($.trim(bdMonth.val()) === "") {
    //     toastr.error("Error", "Birthday is required.");
    //     return false;
    // }
    // if($.trim(bdDay.val()) === "") {
    //     toastr.error("Error", "Birthday is required.");
    //     return false;
    // }
    // if($.trim(bdYear.val()) === "") {
    //     toastr.error("Error", "Birthday is required.");
    //     return false;
    // }
    
    return true;
    
  }

$(document).on('click', "#apply_submit", function(e) {
   
   
    e.preventDefault();

    if(validate()) {
        $("#apply_submit").css("display", "none");
        var frm = $('#form');
        var formData = new FormData(frm[0]);
        
        if($("#price").val() == 'active'){
        formData.append('foto', $("#foto")[0].files[0]);
        formData.append('cv', $("#cv")[0].files[0]);
        }

      $.ajax({
        type: "POST",
        url: "/send_mail",
        data: formData,
        processData: false,

        contentType: false,
        dataType: "json"
      }).done(function(data) {
        if(data == "success") {
            // toastr.success("Success", "Form submitted successfully.");
            $("#success_message_place").css("background", "#228B22");
            $("#success_message_place").html("<h3 style='margin: .1em 0 .1em'>Faleminderit!</h3>");
            $("#success_message_place_1").css("border-color", "#228B22").html("<p style='font-size: 19px'>Aplikimi i juaj u perfundua me sukses. Ne do te ju kontaktojme per ta konfirmuar regjistrimin tuaj dhe per t'iu njoftuar rreth menyres se pageses.</p>");
            $('html, body').animate({scrollTop: $("#apply_form").offset().top - 100 }, 500);
        } else {
            toastr.error("GABIM", data);
            $("#apply_submit").css("display", "block");
        }
      });
    }
  });


  $("#price").on("change", function(e) {
    if($(this).val() == 'active') {
        $(".extra_fields").html(`
        <div class="form-group">
        
            <div>                
                <label>Ditelindja <span style="color:red;">*</span></label>
                <select id="bdMonth" class="input-control" name="dob_month">
                  <option value="" hidden>Muaji</option>
                  <option value="1">January</option>
                  <option value="2">Febuary</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
            </div>

            <div>
                <label class="right-inline"><br></label>
                <select id="bdDay" class="input-control" name="dob_day">
                  <option value="" hidden>Dita</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
            </div>
            <div>
              <label class="right-inline"><br></label>
              <select  class="input-control" id="bdYear" name="dob_year">
                <option value="" hidden>Viti</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960">1960</option>
                <option value="1959">1959</option>
              </select>
          </div>
            </div>
        <div class="form-group">
        <div>
            <label>Emaili <span style="color:red;">*</span></label>
            <input id="email" name="email" value="" class="input-control" />
        </div>
        <div>
            <label>Adresa <span style="color:red;">*</span></label>
            <input id="adresa" name="adresa" value="" class="input-control" />
        </div>
        </div>

        <div class="form-group">
        <div>
            <label>Nr Telefonit <span style="color:red;">*</span></label>
            <input id="nr_tel" name="nr_tel" value="" class="input-control" />
        </div>
        <div>
            <label>Shkolla qe vijon studimet <span style="color:red;">*</span></label>
            <input id="shkolla" name="shkolla" value="" class="input-control" />
        </div>
        </div>

        <div class="form-group">
        <div>
            <label>Klasa/Niveli <span style="color:red;">*</span></label>
            <input id="klasa_niveli" name="klasa_niveli" value="" class="input-control" />
        </div>
        <div>
            <label>Pedagogu aktual <span style="color:red;">*</span></label>
            <input id="pedagogu" name="pedagogu" value="" class="input-control" />
        </div>
        </div>

        <div class="form-group">

        <div>
            <label>Repertori i plote aktual (shkruaj emrat e kompozitoreve dhe veprat qe luan kete vit shkollor) <span style="color:red;">*</span></label>
            <textarea id="reporteri_plote" name="reporteri_plote" style="height: 100px;"  value="" class="input-control"></textarea>
        </div>
        <div>
            <label>Repertori i zgjedhur per masterclass (shkruaj vetem vepren qe deshiron ta punosh gjate masterklasit) <span style="color:red;">*</span></label>
            <textarea id="reporteri_zgjedhur" name="reporteri_zgjedhur" style="height: 100px;" value="" class="input-control"></textarea>
        </div>
        
        </div>

        <div class="form-group">
        <div>
            <label>Ngarkoni nje foto <span style="color:red;">*</span></label>
            <input id="foto" name="foto" type="file" value="" class="input-control" />
        </div>
        <div>
            <label>Ngarkoni CV <span style="color:red;">*</span></label>
            <input id="cv" name="cv" value="" type="file" class="input-control" />
        </div>
        </div>
           
    
        <div class="form-group">
        <label>&nbsp;</label>
        <button id="apply_submit" class="btn">Submit</button>
    
        </div>


        
        `);
    } else {
        $(".extra_fields").html(`
        <div class="form-group">
        
            <div>                
                <label>Ditelindja <span style="color:red;">*</span></label>
                <select id="bdMonth" class="input-control" name="dob_month">
                  <option value="" hidden>Muaji</option>
                  <option value="1">January</option>
                  <option value="2">Febuary</option>
                  <option value="3">March</option>
                  <option value="4">April</option>
                  <option value="5">May</option>
                  <option value="6">June</option>
                  <option value="7">July</option>
                  <option value="8">August</option>
                  <option value="9">September</option>
                  <option value="10">October</option>
                  <option value="11">November</option>
                  <option value="12">December</option>
                </select>
            </div>

            <div>
                <label class="right-inline"><br></label>
                <select id="bdDay" class="input-control" name="dob_day">
                  <option value="" hidden>Dita</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                  <option value="16">16</option>
                  <option value="17">17</option>
                  <option value="18">18</option>
                  <option value="19">19</option>
                  <option value="20">20</option>
                  <option value="21">21</option>
                  <option value="22">22</option>
                  <option value="23">23</option>
                  <option value="24">24</option>
                  <option value="25">25</option>
                  <option value="26">26</option>
                  <option value="27">27</option>
                  <option value="28">28</option>
                  <option value="29">29</option>
                  <option value="30">30</option>
                  <option value="31">31</option>
                </select>
            </div>
            <div>
              <label class="right-inline"><br></label>
              <select  class="input-control" id="bdYear" name="dob_year">
                <option value="" hidden>Viti</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960">1960</option>
                <option value="1959">1959</option>
              </select>
          </div>
            </div>
        <div class="form-group">
        <div>
            <label>Emaili <span style="color:red;">*</span></label>
            <input id="email" name="email" value="" class="input-control" />
        </div>
        <div>
            <label>Adresa <span style="color:red;">*</span></label>
            <input id="adresa" name="adresa" value="" class="input-control" />
        </div>
        </div>

        <div class="form-group">
        <div>
            <label>Nr Telefonit <span style="color:red;">*</span></label>
            <input id="nr_tel" name="nr_tel" value="" class="input-control" />
        </div>
        <div>
            <label>Shkolla qe vijon studimet <span style="color:red;">*</span></label>
            <input id="shkolla" name="shkolla" value="" class="input-control" />
        </div>
        </div>

        <div class="form-group">
        <div>
            <label>Klasa/Niveli <span style="color:red;">*</span></label>
            <input id="klasa_niveli" name="klasa_niveli" value="" class="input-control" />
        </div>
        </div>


           
    
        <div class="form-group">
        <label>&nbsp;</label>
        <button id="apply_submit" class="btn">Submit</button>
    
        </div>


        
        `);

    }
  });


window.onload = function () { 
      setTimeout(()=>{
        $(".loader").css('display', 'none');
      },200);
      
  }
