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
   <title>Selamat Datang di Cubatbot</title>
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
   <link rel="icon" href="dist/images/baliho-logo.png" type="image/gif" />
   <!-- Scrollbar Custom CSS -->
   <link rel="stylesheet" href="dist/css/jquery.mCustomScrollbar.min.css">
   <!-- Tweaks for older IEs-->
   <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
   <!-- fonts -->
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
   <!-- owl stylesheets -->
   <link rel="stylesheet" href="dist/css/owl.carousel.min.css">
   <link rel="stylesheet" href="dist/css/owl.theme.default.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   {{-- <link rel="stylesheet" href="dist/botman/style.css"> --}}
   <link rel="stylesheet" href="{{ asset('dist/css/botman.css') }}">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <!-- Navbar -->
  @include('layouts.header')

  @yield('content')

  <!-- Main Footer -->
  @include('layouts.footer')

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
  <script src="dist/js/all.js"></script>
  <script id="botmanWidget" src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/chat.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> 
  <script src="{{ asset('dist/js/botman.js') }}"></script>
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
      var botmanWidget = {
          frameEndpoint: '/botman/chat', // Adjust the endpoint URL if needed
          chatServer: '/botman', // Adjust the route URL if needed
          title: 'Chat with Bot', // Adjust the widget title
          introMessage: 'Hello! How can I assist you today?', // Adjust the intro message
          mainColor: '#456', // Adjust the color scheme
          bubbleBackground: '#456', // Adjust the color scheme
          aboutText: 'Powered by BotMan', // Adjust the about text
          bubbleAvatarUrl: 'bot-avatar.png', // Adjust the avatar image URL if needed
      };
  </script>

<script>
  $(document).ready(function() {
    var userName = ''; // Variable to store the user name
    var timestamp = new Date().toLocaleTimeString();
    var BOT_NAME = "CubatBot";
    var USER_IMG = "/dist/images/user.png";
    var BOT_IMG = "/dist/images/cubatbot.png";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function askName() {

    $('#content-box').append(`
                        <div class="msg left-msg">
                            <div class="msg-img" style="background-image: url(${BOT_IMG})"></div>
                            <div class="msg-bubble float-right">
                                <div class="msg-info">
                                    <div class="msg-info-name">${BOT_NAME}</div>
                                    <div class="msg-info-time">${timestamp}</div>
                                </div>
                                <div class="msg-text">👋 Halo Welcome to CubatBot, Nama Kamu Siapa?</div>
                            </div>
                        </div>`);

    $('#button-submit').one('click', submitName);

    var flag = true;

    $('#input').on('keypress', function(e) {
        if (flag && e.which === 13) {
            submitName();
            flag = false; // Set the flag to false to ignore subsequent keypress events
        }
    });

        function submitName() {
            var $value = $('#input').val().trim();
                $value = $value.replace(/^\w/, function(char) {
                    return char.toUpperCase();
                });

            $('#content-box').append(`
                <div class="msg right-msg">
                    <div class="msg-img" style="background-image: url(${USER_IMG})"></div>
                    <div class="msg-bubble float-right">
                        <div class="msg-info">
                            <div class="msg-info-name">${$value}</div>
                            <div class="msg-info-time">${timestamp}</div>
                        </div>
                        <div class="msg-text">${$value}</div>
                    </div>
                </div>`);

            if ($value !== '') {
                userName = $value;

                $('#content-box').append(`
                        <div class="msg left-msg">
                            <div class="msg-img" style="background-image: url(${BOT_IMG})"></div>
                            <div class="msg-bubble float-right">
                                <div class="msg-info">
                                    <div class="msg-info-name">${BOT_NAME}</div>
                                    <div class="msg-info-time">${timestamp}</div>
                                </div>
                                <div class="msg-text">Nice To meet You ${userName}, Ada yang bisa saya bantu?</div>
                            </div>
                        </div>`);

                $('#input').val(''); // Clear the input field

                // Scroll to the bottom of the content
                var $contentBox = $('#content-box');
                $contentBox.scrollTop($contentBox.prop('scrollHeight'));

                // Run the controller after receiving the user's name
                runController();
            }
        }
    }

    function runController() {
        $('#button-submit').on('click', function() {
            submitForm();
        });

        $('#input').on('keypress', function(e) {
            if (e.which === 13) { // Enter key pressed
                submitForm();
            }
        });

        function submitForm() {
            var $value = $('#input').val().trim();

            $('#content-box').append(`
                <div class="msg right-msg">
                    <div class="msg-img" style="background-image: url(${USER_IMG})"></div>
                    <div class="msg-bubble float-right">
                        <div class="msg-info">
                            <div class="msg-info-name">${userName}</div>
                            <div class="msg-info-time">${timestamp}</div>
                        </div>
                        <div class="msg-text">${$value}</div>
                    </div>
                </div>`);

            // AJAX request and bot response
            $.ajax({
                type: 'post',
                url: '{{url('send')}}',
                data: {
                    'input': $value
                },
                success: function(data) {
                    $('#content-box').append(`
                        <div class="msg left-msg">
                            <div class="msg-img" style="background-image: url(${BOT_IMG})"></div>
                            <div class="msg-bubble float-right">
                                <div class="msg-info">
                                    <div class="msg-info-name">${BOT_NAME}</div>
                                    <div class="msg-info-time">${timestamp}</div>
                                </div>
                                <div class="msg-text">${data}</div>
                            </div>
                        </div>`);

                    $('#input').val(''); // Clear the input field

                    // Scroll to the bottom of the content
                        var $contentBox = $('#content-box');
                        $contentBox.scrollTop($contentBox.prop('scrollHeight'));
                    }
                });
            }
        }

        askName();
    });

</script>
</body>
</html>
