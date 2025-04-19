<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Giveat - Siap Makan Hari Ini</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reset & base */
        * {
            margin: 2;
            padding: 2;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
        }

        /* Header */
        header {
            background-color: #ffffff;
            padding: 16px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header .logo img {
            height: 40px;
        }

        header nav a {
            margin-left: 24px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }

        header nav a.active {
            color: #28a745;
        }

        header .user-profile {
            display: flex;
            align-items: center;
        }

        header .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 16px;
        }

        /* Banner */
        .banner-container {
            width: 100%;
            max-width: 1200px; /* sesuaikan dengan layout */
            margin: 24px auto; /* jarak atas bawah + center */
        }

        .banner-image {
            width: 100%;
            height: auto;
            display: block; /* hilangkan spasi bawah gambar */
            border-radius: 12px; /* opsional, agar sudut membulat */
            object-fit: cover;
        }

        /* Top Restaurants */
        .top-restaurants {
            margin: 24px;
            padding: 16px;
            background-color: #ffffff;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
        }

        .top-restaurants h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
            align-self: flex-start;
        }

        .top-restaurants .scroll-container {
            display: flex;
            gap: 16px;
            overflow-x: auto;
            padding-bottom: 16px;
        }

        .top-restaurants .scroll-container::-webkit-scrollbar {
            display: none;
        }

        .top-restaurants .restaurant-btn img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .top-restaurants .view-more {
            align-self: flex-end;
            font-size: 14px;
            font-weight: 500;
            color: #28a745;
            text-decoration: none;
        }

        /* Siap Makan Hari Ini */
        .siap-makan {
            margin: 24px;
            padding: 16px;
            background-color: #ffffff;
            border-radius: 8px;
        }

        .siap-makan h2 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .siap-makan .grid-foods {
            display: grid;
            grid-template-columns: repeat(4, minmax(180px, 1fr));
            gap: 16px;
        }

        .siap-makan .food-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 16px;
            position: relative;
        }

        .siap-makan .food-card img {
            width: 100%;
            height: auto;
            border-radius: 8px 8px 0 0;
        }

        .siap-makan .food-card .label-red-small {
            position: absolute;
            top: 8px;
            left: 8px;
            background-color: red;
            color: #ffffff;
            border-radius: 4px;
            padding: 4px 8px;
            font-weight: bold;
            font-size: 12px;
        }

        .siap-makan .food-card .food-name {
            font-size: 16px;
            font-weight: 600;
            margin-top: 8px;
            margin-bottom: 4px;
        }

        .siap-makan .food-card .small-text-muted {
            color: #888888;
            font-size: 12px;
        }

        .siap-makan .food-card .card-footer-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 8px;
        }

        .siap-makan .food-card .card-footer-info .icon-text {
            font-size: 12px;
            color: #666666;
        }

        .siap-makan .food-card .card-footer-info svg {
            fill: none;
            stroke: #666666;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .siap-makan .food-card .card-footer-info .time-icon svg {
            width: 18px;
            height: 18px;
            margin-right: 6px;
        }

        .siap-makan .food-card .card-footer-info .portion-icon svg {
            width: 18px;
            height: 18px;
            margin-right: 6px;
        }

        .siap-makan .food-card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Berita */
        .news-section {
  max-width: 1200px;
  margin: 40px auto;
}

.news-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.news-header h2 {
  font-size: 24px;
}

.see-more {
  font-size:14px;
  color:#666666;
 text-decoration:none; 
}

.see-more:hover {
   text-decoration : underline ;
}

/* Container untuk kartu berita */
.news-cards-container {
   display:flex; 
   gap :20 px ; 
   overflow-x:auto; /* scroll horizontal jika perlu */
   padding-top :20 px ;
}

/* Kartu Berita */
.news-card {
 position : relative ;
 width :400 px ; /* sesuaikan ukuran */
 height :200 px ;
 border-radius :12 px ;
 background-size : cover ;
 background-position:center center ;
 color:white;

 flex-shrink :

0 ;

 cursor:pointer;

 display:flex;

 align-items:center;

 padding-left:

20 

p x;


box-shadow:


rgba(0,0,0,.4) 

o x o x 


}


/* Overlay gelap agar teks terbaca */

.news-card .overlay {

position:absolute;

top:o;left:o;right:o;bottom:o;

background-color:

rgba(0,0,0,.5);

border-radius:

12 p x;


z-index:-1;



}



/* Konten teks dan tombol */

.news-card .content {

position :

relative ;

max-width :

70 % ;

}



.news-card h3 {

font-weight:bold;font-size:

18 p x;



margin-bottom:


10 p x;



line-height:


1.3em;


}



/* Tombol lihat selengkapnya */

.btn-see-more {

display:inline-block;padding:.

5 em 

1 em;background-color:#fff;color:#2f6c27;border-radius:.

8 em;text-decoration:none;font-weight:bold;font-size:.

85 rem;margin-top:.

5 em;}

.btn-see-more:hover{

background-color:#28a745;color:white;}


        /* Footer */
        footer{
background-color:#006633;color:white;padding:
20
px
30
px;width:
100%;
position:
relative;
/*
Jika ingin footer selalu dibawah viewport, bisa pakai fixed atau sticky,
tapi pastikan konten utama cukup tinggi.
*/
text-align:center;

box-sizing:border-box;

}

.footer-container{

max-width:

1200

px;margin:

auto;


display:flex;

flex-wrap:

wrap;

justify-content:

space-between;

align-items:

center;



gap:


10


px;


}



.footer-logo img{

height:


40


px;



}



.footer-nav a{

color:


white;


text-decoration:


none;



margin-left:


10


px;



margin-right:


10


px;



font-size:


14


pt;




}



.footer-nav a:hover{

text-decoration:



underline;




}


@media (max-width



768



){

.footer-container{


flex-direction:



column;


gap:



15



pt;




.text-center{


text-align:center!important;}}


}
    </style>
</head>
<body>

<header>
    <div class="logo">
        <img src="{{ asset('images/logo1.png') }}" alt="GiveAt Logo" />
    </div>
    <nav>
        <a href="#" class="active">Beranda</a>
        <a href="#">Forum</a>
        <a href="#">Berita</a>
        <a href="#">Persebaran</a>
        <a href="#">FAQ</a>
    </nav>
    <div class="user-profile">
        <span>Hailey Williams</span>
        <img src="{{ asset('images/user.png') }}" alt="User Profile" />
    </div>
</header>

<main class="container">

    <!-- Banner -->
    <div class="banner-container">
        <img src="{{ asset('images/banner/banner.png') }}" alt="Banner" class="banner-image" />
    </div>

    <!-- Top Restaurants -->
    <div class="top-restaurants">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <h2>Top Restaurant</h2>
            <a href="#" class="view-more">Lihat Selengkapnya</a>
        </div>
        <div class="scroll-container">
            @foreach ($restaurants as $restaurant)
                <div class="restaurant-btn">
                    <img src="{{ asset('images/restaurants/' . $restaurant->logo) }}" alt="{{ $restaurant->name }}" />
                </div>
            @endforeach
        </div>
    </div>

    <!-- Siap Makan Hari Ini -->
    <div class="siap-makan">
        <h2>Siap Makan Hari Ini</h2>
        <a href="#" class="see-more">Lihat Selengkapnya</a>
        <div class="grid-foods">
            @foreach ($foods as $food)
                <div class="food-card">
                    @if ($loop->first)
                        <div class="label-red-small">Tersisa 5</div>
                    @endif
                    <img src="{{ asset('images/foods/' . $food->image) }}" alt="{{ $food->name }}" />
                    <div class="food-name">{{ $food->name }}</div>
                    <div class="small-text-muted">{{ $food->portion }} porsi</div>
                    <div class="card-footer-info">
                        <div class="icon-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="time-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12 6 12 12 16 14"></polyline>
                            </svg>
                            {{ $food->preparation_time }} menit
                        </div>
                        <div class="icon-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="portion-icon">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12" y2="16"></line>
                            </svg>
                            {{ $food->portion }} porsi
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Berita -->
    <section class="news-section">
  <div class="news-header">
    <h2>Ada Apa Hari Ini</h2>
    <a href="#" class="see-more">Lihat Selengkapnya</a>
  </div>

  <div class="news-cards-container">
    <!-- Satu kartu berita -->
    <img src="{{ asset('images/berita/berita.png') }}" alt="Berita" class="berita-image" />
      </div>
    </article>

    <!-- Tambah kartu lain jika perlu -->
  </div>
</section>


</main>

<footer>
    <div class="footer-container">
        <div class="footer-logo">
            <img src="{{ asset('images/logo2.png') }}" alt="GiveAt Logo" />
        </div>

        <nav class="footer-nav">
            <a href="#">Privacy Policy</a> | 
            <a href="#">Hubungi Kami</a>
        </nav>

        <p>© 2025 GiveAt Food Cycle. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>
