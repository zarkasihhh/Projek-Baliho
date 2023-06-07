@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-white">
    <div class="container">
      <img src="dist/images/orbit.png" height="50px" width="100px">
      <h2 class="chatbot-title"><b>Chatbot Kebudayaan Bali</b></h2>
      <img src="dist/images/kampus-merdeka.png" height="50px" width="100px">
    </div>
</nav>
<div class="chatbot-body">
    <div class="msger">
      <header class="msger-header">
        <div class="msger-header-title">
          <i class="fas fa-robot"></i> CubatBot <i class="fas fa-robot"></i>
        </div>
      </header>

      <main class="msger-chat">
        <div class="msg left-msg">
          <div class="msg-img"></div>
          <div class="msg-bubble">
            <div class="msg-info">
              <div class="msg-info-name">CubatBot</div>
              <div class="now">Sekarang</div>
            </div>

            <div class="msg-text">
              👋 Halo, dengan CubatBot disini. Ada yang bisa dibantu?
            </div>
          </div>
        </div>
      </main>

      <form class="msger-inputarea">
        <input type="text" class="msger-input" id="textInput" placeholder="Masukkan pesanmu disini...">
        <button type="submit" class="msger-send-btn">Kirim</button>
      </form>
    </div>
  </div>
@endsection
