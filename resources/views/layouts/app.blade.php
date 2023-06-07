<!DOCTYPE html>
<html lang="en">
<head>
   <!-- basic -->
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- mobile metas -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="viewport" content="initial-scale=1, maximum-scale=1">
   <!-- site metas -->
   <title>Selamat Datang di baliho</title>
   <meta name="keywords" content="">
   <meta name="description" content="">
   <meta name="author" content="">
   <!-- bootstrap css -->
   <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
   <!-- style css -->
   <link rel="stylesheet" type="text/css" href="dist/css/style.css">
   <!-- Responsive-->
   <link rel="stylesheet" href="dist/css/responsive.css">
   <!-- fevicon -->
   <link rel="icon" href="dist/images/fevicon.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="css/owl.carousel.min.css">
   <link rel="stylesheet" href="css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
      media="screen">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

  <!-- Navbar -->
  @include('layouts.header')

    @yield('content')
  <!-- Main Footer -->
  @include('layouts.footer')
</div>


<!-- Script For Back to top Button-->

<script>
    $(document).ready(function() {
      // Show or hide the button based on the user's scroll position
      $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
          $('#scroll-to-top').fadeIn();
        } else {
          $('#scroll-to-top').fadeOut();
        }
      });

      // Scroll to the top of the page when the button is clicked
      $('#scroll-to-top').click(function() {
        $('html, body').animate({scrollTop : 0},800);
        return false;
      });
    });

  </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="dist/js/all.js"></script>
    <script>
    const msgerForm = get(".msger-inputarea");
    const msgerInput = get(".msger-input");
    const msgerChat = get(".msger-chat");

    // Icons made by Freepik from www.flaticon.com
    const BOT_IMG = "/dist/images/cubatbot.png";
    const PERSON_IMG = "/dist/images/user.png";
    const BOT_NAME = "CubatBot";
    const PERSON_NAME = "Kamu";

    msgerForm.addEventListener("submit", event => {
    event.preventDefault();

    const msgText = msgerInput.value;
    if (!msgText) return;

    appendMessage(PERSON_NAME, PERSON_IMG, "right", msgText);
    msgerInput.value = "";
    botResponse(msgText);
    });

    function appendMessage(name, img, side, text) {
    //   Simple solution for small apps
    const msgHTML = `
    <div class="msg ${side}-msg">
        <div class="msg-img" style="background-image: url(${img})"></div>

        <div class="msg-bubble">
        <div class="msg-info">
            <div class="msg-info-name">${name}</div>
            <div class="msg-info-time">${formatDate(new Date())}</div>
        </div>

        <div class="msg-text">${text}</div>
        </div>
    </div>
    `;

    msgerChat.insertAdjacentHTML("beforeend", msgHTML);
    msgerChat.scrollTop += 500;
    }

    function botResponse(rawText) {
    // Bot Response
    $.get("/get", { msg: rawText }).done(function (data) {
        console.log(rawText);
        console.log(data);
        const msgText = data;
        appendMessage(BOT_NAME, BOT_IMG, "left", msgText);

    });
    }

    // Utils
    function get(selector, root = document) {
    return root.querySelector(selector);
    }

    function formatDate(date) {
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();

    return `${h.slice(-2)}:${m.slice(-2)}`;
    }
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#button-submit').on('click', function() {
            submitForm();
        });

        $('#input').on('keypress', function(e) {
            if (e.which === 13) { // Enter key pressed
                submitForm();
            }
        });

        function submitForm() {
            var $value = $('#input').val();
            $('#content-box').append(`
                <div class="mb-2">
                    <div class="float-right px-3 py-2" style="width: 270px; background: #4acfee;border-radius:10px;float-right; font-size: 85%;">
                        ` + $value + `
                    </div>
                    <div style="clear:both;"></div>
                </div>`);

            $.ajax({
                type: 'post',
                url: '{{url('send')}}',
                data: {
                    'input': $value
                },
                success: function(data){
                    $('#content-box').append(`<div class="d-flex mb-2">
                        <div class="mr-2" style="width: 45px;height: 45px;">
                            <img src="dist/images/bot1.jpg" width="100%" height="100%" style="border-radius: 50px;">
                        </div>
                        <div class="text-white px-3 py-2"
                            style="width: 270px; background: #13254b; border-radius: 10px; font-size: 85%;">
                            `+data+`
                        </div>
                    </div>`);
                    $value = $('#input').val('');
                }
            });
        }

    </script>
</body>
</html>
