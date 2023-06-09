<div class="header_section">
    <div class="header_main">
       <div class="mobile_menu">
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
             <div class="logo_mobile">
                <a href="/">
                    <div class="col-md-6 padding_right_0">
                        <img src="dist/images/baliho-logo.png" alt="Logo" style="width: 100%;">
                     </div>
                /<a>
                </div>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                   <li class="nav-item">
                      <a class="nav-link" href="/">Home</a>
                   </li>
                   <li class="nav-item">
                      <a href="/about">About</a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link" href="/services">Services</a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link " href="/contactus">Contact US</a>
                   </li>
                   <li class="nav-item">
                      <a class="nav-link " href="/chatbot">Chatbot</a>
                   </li>

                </ul>
             </div>
          </nav>
       </div>
       <div class="container-fluid">
        <a href="/" style="display: flex; justify-content: center; align-items: center;">
            <div class="col-md-6 padding_right_0" style="display: flex; justify-content: center; align-items: center;">
              <img src="dist/images/baliho-logo.png" alt="Logo" style="width: 200px;">
            </div>
          </a>
        <div class="menu_main">
          <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/services">Services</a></li>
            <li><a href="/contactus">Contact US</a></li>
            <li><a href="/chatbot">Chatbot</a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- banner section start -->
    @if(Request::is('/'))
    <div class="banner_section layout_padding">
       <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container">
                 <h1 class="banner_taital">Bali</h1>
                 <p class="banner_text">Pariwisata Bali merupakan salah satu tujuan wisata yang sudah tidak diragukan lagi</p>
                 <div class="read_bt"><a href="services.html">Get A Quote</a></div>
              </div>
           </div>
             <div class="carousel-item">
                <div class="container">
                   <h1 class="banner_taital">Wisata</h1>
                   <p class="banner_text">Obyek Wisata Bali tersebar di seluruh wilayah Bali. Obyek wisata dengan unsur budaya di beberapa tempat di Bali</p>
                   <div class="read_bt"><a href="services.html">Get A Quote</a></div>
                </div>
             </div>
             <div class="carousel-item">
                <div class="container">
                   <h1 class="banner_taital">Budaya</h1>
                   <p class="banner_text">Bali merupakan salah satu daerah populer yang menarik para wisatawan asing maupun lokal karena keindahan kotanya. Bali juga terkenal karena keragaman budaya dan adat istiadat yang masih melekat pada setiap masyarakatnya. Mereka sangat menjaga adat istiadat yang diwariskan oleh leluhurnya</p>
                   <div class="read_bt"><a href="services.html">Get A Quote</a></div>
                </div>
             </div>
          </div>
       </div>
    </div>
    @endif
    <!-- banner section end -->
 </div>
