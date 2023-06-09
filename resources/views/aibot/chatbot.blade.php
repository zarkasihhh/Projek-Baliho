@extends('layouts.app')

@section('content')
    <nav class="navbar navbar-expand-lg navbar-white">
        <div class="container">
            <img src="dist/images/orbit.png" height="50px" width="100px">
            <h2 class="chatbot-title"><b>Chatbot Kebudayaan Bali</b></h2>
            <img src="dist/images/kampus-merdeka.png" height="50px" width="100px">
        </div>
    </nav>
    <div class="card" style="background: #fcfcfc; max-width: 1000px; min-height: 700px; max-height: 700px; margin: 0 auto;">
        <div class="card-body" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%; min-height: 700px; max-height: 700px;">
            <div>
                <div class="container-fluid m-0 d-flex p-2">
                    <div class="pl-2" style="width: 40px; height: 50px; font-size: 180%;">
                        <a href="/" style="text-decoration: none;">
                            <i class="fa fa-angle-double-left text-black mt-2"></i>
                        </a>
                    </div>
                    <div style="width: 50px; height: 50px;">
                        <img src="dist/images/bot1.jpg" width="100%" height="100%" style="border-radius: 50px;">
                    </div>
                    <div class="text-black font-weight-bold ml-2 mt-2">
                        Chatbot
                    </div>
                </div>
                <div style="background: #061128;height: 2px;"></div>
                <div id="content-box" class="container-fluid p-2" style="max-height: 520px; overflow-y: auto;">
                    <!-- Content goes here -->
                </div>
            </div>
            <div class="container-fluid w-100 px-3 py-2 d-flex" style="background: #020202; border-radius: 10px;">
                @csrf
                <div class="text-white mr-2 pl-2" style="background: #898e8f;width: calc(100% - 45px);border-radius: 5px;">
                    <input id="input" class="text-white" type="text" name="input" style="background: none;width: 100%; height: 100%; border: 0;outline: none;">
                </div>
                <div id="button-submit" class="text-center" style="background: #4acfee;height: 100%;width: 50px;border-radius:5px;">
                    <i class="fa fa-paper-plane text-white" aria-hidden="true" style="line-height:45px;"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
