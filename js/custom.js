$(document).ready(function() {

  /* Home Slideshow Vegas
  -----------------------------------------------*/
  $(function() {
    $('body').vegas({
        slides: [
            { src: 'Image/slide3.jpg' },
            { src: 'Image/slide7.jpg' }
        ],
        timer: false,
        transition: [ 'zoomOut', ]
    });
  });


   /* Back top
  -----------------------------------------------*/
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
        $('.go-top').fadeIn(200);
        } else {
          $('.go-top').fadeOut(200);
        }
        });   
        // Animate the scroll to top
      $('.go-top').click(function(event) {
        event.preventDefault();
      $('html, body').animate({scrollTop: 0}, 300);
      })
      $('#goabout').click(function(event) {
        event.preventDefault();
      $('html, body').animate({scrollTop: 650},800);
      })
      

  /* wow
  -------------------------------*/
  new WOW({ mobile: false }).init();

  });

function sign() {
  $('#close1').click();
  $('#modal1').hide();
  event.preventDefault();
  $('html, body').animate({scrollTop: 1900},800);
}

function openreset() {
  if ($('#email1').val() == '') alert ("Please input email to reset password!")
}

window.onload = function () {
    $.ajax({
        url: 'getlevel.php',
        dataType: "json",
        data: {"action": "getlevel"},
        type: 'post',
        success: function (output) {
            $('#speaklevels').text(output.speak);
            $('#listenlevels').text(output.listen);
        }
    });
}

function regis() {
    var name = $('#name').val();
    var email = $('#email').val();
    var password = CryptoJS.MD5($('#password').val()).toString();
    if (name == '' || email == '' || password == '') alert("Please don\'t let inputs empty.");
    else {
        if (ValidateEmail(email) == true) {
            $.ajax({
                url: 'register.php',
                dataType: "json",
                data: {"name": name, "email": email, "password": password},
                type: 'post',
                success: function (output) {
                    console.log(output);
                    if (output == "success") {
                        alert("Successfully!\nWe will send to you a email. Please confirm to finish registration. Thank you!");
                        $('#email').val('');
                        $('#name').val('');
                        $('#password').val('');
                    }
                    else {
                        alert(output);
                    }
                }
            });
        }
    }
}

function ValidateEmail(mail)
{
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
    {
        return (true)
    }
    alert("You have entered an invalid email address!")
    return (false)
}