<?php 
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../../../bootstrap/sb-admin/vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);
  

    $mail = new PHPMailer(true);

    try {
        // Pengaturan server SMTP Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ardiansyah3151@gmail.com'; // Ganti dengan alamat email Gmail Anda
        $mail->Password = 'riiknwzqbhudrhtm'; // Ganti dengan kata sandi Gmail Anda
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Pengaturan email
        $mail->setFrom($email, $name);
        $mail->addAddress('ardiansyah3151@gmail.com'); // Alamat email tujuan (dalam hal ini, email Anda sendiri)
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: $name\nEmail: $email\nMessage: $message";
        // Kirim email
        $mail->send();
    } catch (Exception $e) {      
    }
} else {
}

// Cek apakah pengguna sudah login
if (!isset($_SESSION['session_username'])) {
    header("location: ../../crud/php/login.php");
    exit();
}
$userRole = isset($_SESSION['session_role']) ? $_SESSION['session_role'] : '';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Bootcamp</title>
    <link rel="icon" type="image/png" href="../img/favicon.ico"/>
    <link rel="stylesheet" href="../fontawesome-5.5/css/all.min.css" />
    <link rel="stylesheet" href="../slick/slick.css">
    <link rel="stylesheet" href="../slick/slick-theme.css">
    <link rel="stylesheet" href="../magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/tooplate-infinite-loop.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



  </head>
  <body>    
    <!-- Hero section -->
    <section id="infinite" class="text-white tm-font-big tm-parallax">
      <!-- Navigation -->
      <nav class="navbar navbar-expand-md tm-navbar" id="tmNav">              
        <div class="container">   
          <div class="tm-next">
              <a href="#infinite" class="navbar-brand">TechForge Academy</a>
          </div>             
            
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars navbar-toggler-icon"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="#infinite">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="#tentangkami">Tentang Kami</a>
              </li>    
             <li class="nav-item">
             <a class="nav-link tm-nav-link" href="#gallery">Daftar</a>
             </li>
              <li class="nav-item">
                <a class="nav-link tm-nav-link" href="#contact">Kontak Kami</a>
              </li>
              <li class="nav-item">
             <?php
            // Cek apakah pengguna sudah login
           if (!isset($_SESSION['session_email'])) {
        echo '<a class="nav-link tm-nav-link" href="login_bc.php">Login</a>';
         }
         ?>
         </li>
              <?php if($userRole == 'admin') { ?>
            <li class="nav-item">
                <a class="nav-link tm-nav-link" href="../../crud/php/dashboard.php">Dashboard</a>
            </li>
        <?php } ?>
            </li> 
              </li>
              <li class="nav-item">
    <a class="nav-link tm-nav-link" href="#logout" id="logoutLink">Logout</a>
</li>
               
            </ul>
          </div>        
        </div>
      </nav>
      
      <div class="text-center tm-hero-text-container">
        <div class="tm-hero-text-container-inner">
            <h2 class="tm-hero-title">TechForge Academy</h2>
            <p class="tm-hero-subtitle">
            Sulap ide menjadi kode, inspirasi menjadi inovasi, dan tantangan menjadi kesempatan.
              <br>Mencerdaskan Anak Bangsa
            </p>
        </div>        
      </div>

      <div class="tm-next tm-intro-next">
        <a href="#tentangkami" class="text-center tm-down-arrow-link">
          <i class="fas fa-2x fa-arrow-down tm-down-arrow"></i>
        </a>
      </div>      
    </section>

    <section id="tentangkami" class="tm-section-pad-top">
      
      <div class="container">

            <div class="row tm-content-box"><!-- first row -->
                <div class="col-lg-12 col-xl-12">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4 tm-section-title">Tentang Kami</h2>
                        <p class="mb-4 tm-intro-text">
                        TechForge Academy adalah pusat pengembangan keterampilan teknologi yang didedikasikan untuk memajukan bakat-bakat di dunia pemrograman dan teknologi informasi. 
                        Kami berkomitmen untuk memberikan lingkungan belajar yang dinamis, menantang, dan mendukung, membantu peserta didik kami mencapai puncak potensi mereka di ranah teknologi.</a>.</p>
                    </div>
                </div>

            </div><!-- first row -->
            
            <div class="row tm-content-box"><!-- second row -->
        		<div class="col-lg-1">
                    <i class="far fa-3x fa-chart-bar text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4">Visi</h2>
                        <p class="mb-4 tm-intro-text">
                         Menjadi pusat unggulan dalam menghasilkan talenta-talenta terbaik di bidang pemrograman, dengan fokus pada inovasi, kolaborasi, dan pemberdayaan masyarakat.</p>
                    </div>
                </div>
                
                <div class="col-lg-1">
                    <i class="far fa-3x fa-comment-alt text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4">Misi</h2>
                        <p class="mb-4 tm-intro-text">
                        Memberikan pendidikan berkualitas tinggi dalam bidang pemrograman untuk mempersiapkan peserta didik menjadi profesional yang kompeten
                        ,Mengembangkan ekosistem belajar yang inovatif dan berorientasi pada industri guna mendukung pertumbuhan karier peserta didik
                        ,Mendorong kolaborasi antara peserta didik, instruktur, dan industri untuk menciptakan solusi teknologi yang relevan
                        ,Menanamkan nilai-nilai kepemimpinan, etika, dan tanggung jawab sosial dalam setiap peserta didik
                        ,Menyediakan akses pendidikan pemrograman yang inklusif dan berkelanjutan bagi semua lapisan masyarakat.</p>
                    </div>
                </div>
            </div><!-- second row -->        
            <div class="row tm-content-box"><!-- third row -->
        		<div class="col-lg-1">
                    <i class="fas fa-3x fa-school text-center tm-icon"></i>
                </div>
                <div class="col-lg-5">
                    <div class="tm-intro-text-container">
                        <h2 class="tm-text-primary mb-4">Sejarah Singkat</h2>
                        <p class="mb-4 tm-intro-text">
                        TechForge Academy didirikan pada tahun 2016 dengan tujuan utama membuka peluang bagi individu 
                        yang berminat mengembangkan keterampilan pemrograman dan meniti karier di dunia teknologi. Sejak itu, kami telah berhasil membimbing 
                        dan menciptakan berbagai generasi pemrogram yang sukses dan inovatif. Dengan dukungan instruktur berpengalaman dan kurikulum yang terus dikembangkan, 
                        TechForge Academy terus berkomitmen untuk menjadi wadah pembelajaran yang inspiratif dan berkualitas.</p>
                        </div>
                    </div>
                </div>   
            </div><!-- third row -->
        </div>
        <?php
        echo '<section id="gallery" class="tm-section-pad-top">
      <div class="container tm-container-gallery">
        <div class="row">
          <div class="text-center col-12">
              <h2 class="tm-text-primary tm-section-title mb-4">BOOTCAMP</h2>
              <p class="mx-auto tm-section-desc">
              Daftar sekarang dan sambut tantangan baru dalam perjalanan menuju keahlian di dunia IT! 
              Bergabunglah dengan bootcamp kami dan tingkatkan keterampilan teknologi Anda, temukan wawasan mendalam, 
              dan bangun fondasi yang kokoh untuk karier Anda di dunia digital. Bersama-sama, kita akan menjelajahi, 
              belajar, dan tumbuh menjadi pemimpin di industri teknologi informasi. Daftar sekarang dan jadilah bagian dari revolusi digital!
              </p>
          </div>            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mx-auto tm-gallery-container">
                    <div class="grid tm-gallery">
                    <a href="#" onclick="checkLogin()">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="../img/gallery-tn-01.jpg" alt="Image 1" class="img-fluid">
                          <figcaption>
                            <h2><i>Web  <span>Development</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="#" onclick="checkLogin()">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="../img/gallery-tn-02.jpg" alt="Image 2" class="img-fluid">
                          <figcaption>
                            <h2><i>Data  <span>Science</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="#" onclick="checkLogin()">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="../img/gallery-tn-03.jpg" alt="Image 3" class="img-fluid">
                          <figcaption>
                            <h2><i>Full Stack <span>Development</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="#" onclick="checkLogin()">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="../img/gallery-tn-04.jpg" alt="Image 4" class="img-fluid">
                          <figcaption>
                            <h2><i>Mobile App <span>Development</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="#" onclick="checkLogin()">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="../img/gallery-tn-05.jpg" alt="Image 5" class="img-fluid">
                          <figcaption>
                            <h2><i>Cyber <span>Security</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="#" onclick="checkLogin()">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="../img/gallery-tn-06.jpg" alt="Image 6" class="img-fluid">
                          <figcaption>
                            <h2><i>Devs  <span>OPS</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="#" onclick="checkLogin()">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="../img/gallery-tn-07.jpg" alt="Image 7" class="img-fluid">
                          <figcaption>
                            <h2><i>UI/UX <span>Design</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                      <a href="#" onclick="checkLogin()">
                        <figure class="effect-honey tm-gallery-item">
                          <img src="../img/gallery-tn-08.jpg" alt="Image 8" class="img-fluid">
                          <figcaption>
                            <h2><i>Game  <span>Development</span></i></h2>
                          </figcaption>
                        </figure>
                      </a>
                    </div>
                </div>                
            </div>        
          </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function checkLogin(bidang) {
        ' . (!isset($_SESSION['session_email']) && (!isset($_SESSION['session_role']) || $_SESSION['session_role'] !== 'admin') ? '
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Silakan login terlebih dahulu."
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php"; // Ganti dengan path menuju halaman login
                }
            }); return false;' : '
        // Lakukan pemeriksaan email terdaftar di tb_peserta di sini
        var emailSudahTerdaftar = true; // Ganti dengan logika sesuai implementasi Anda
        if (emailSudahTerdaftar) {
            Swal.fire({
                icon: "info",
                title: "Email sudah terdaftar",
                text: "Maaf, Anda sudah terdaftar bila ingin ada perubahan silahkan hubungi customer service."
            });
        } else {
            window.location.href = "../../crud/php/create.php?bidang=" + bidang;
        }
        ') . '
    }
</script>';
?>
    <!-- Contact -->
    <section id="contact" class="tm-section-pad-top tm-parallax-2">
    
      <div class="container tm-container-contact">
        
        <div class="row">
            
            <div class="text-center col-12">
                <h2 class="tm-section-title mb-4">Contact Us</h2>
            </div>
            
            <div class="col-sm-12 col-md-6">
        <form id="contactForm" action="" method="post">
            <input id="name" name="name" type="text" placeholder="Your Name" class="tm-input" required />
            <input id="email" name="email" type="email" placeholder="Your Email" class="tm-input" required />
            <textarea id="message" name="message" rows="8" placeholder="Message" class="tm-input" maxlength="255" required></textarea>
            <button type="submit" class="btn tm-btn-submit">Submit</button>
        </form>
    </div>
            
            <div class="row">
              <div class="col-sm-12 col-md-6">
          
                  <div class="contact-item">
                      <a rel="nofollow" href="" class="item-link">
                          <i class="far fa-2x fa-comment mr-4"></i>
                          <span class="mb-0">Whatsapp</span>
                      </a>              
                  </div>
                  
                  <div class="contact-item">
                      <a rel="nofollow" href="" class="item-link">
                          <i class="far fa-2x fa-envelope mr-4"></i>
                          <span class="mb-0">ardiansyah3151@gmail.com</span>
                      </a>              
                  </div>
                  
                  <div class="contact-item">
                      <a rel="nofollow" href="https://www.google.com/maps/place/Jl.+Nusa+Indah+1,+Cingcin,+Kec.+Soreang,+Kabupaten+Bandung,+Jawa+Barat+40921/@-7.0296963,107.5377225,17z/data=!3m1!4b1!4m6!3m5!1s0x2e68ec398b87c029:0xe7cbde15481698fe!8m2!3d-7.0297016!4d107.5402974!16s%2Fg%2F11bx21q4ym?entry=tts" class="item-link">
                          <i class="fas fa-2x fa-map-marker-alt mr-4"></i>
                          <span class="mb-0">Our Location</span>
                      </a>              
                  </div>
                  
                  <div class="contact-item">
                      <a rel="nofollow" href="" class="item-link">
                          <i class="fas fa-2x fa-phone-square mr-4"></i>
                          <span class="mb-0">6281912388170</span>
                      </a>              
                  </div>
                  
                  <div class="contact-item">&nbsp;</div>
              
              </div>
          </div> 
            <!-- row ending -->
        </div>
      </div>
      	<footer class="text-center small tm-footer">
          <p class="mb-0">
          Copyright &copy; 2023 TechForge Academy 
          .</p>
        </footer>
    </section>
    
    <script src="../js/jquery-1.9.1.min.js"></script>     
    <script src="../slick/slick.min.js"></script>
    <script src="../magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="../js/easing.min.js"></script>
    <script src="../js/jquery.singlePageNav.min.js"></script>     
    <script src="../js/bootstrap.min.js"></script> 
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        var nameInput = document.getElementById("name");
        var emailInput = document.getElementById("email");
        var messageInput = document.getElementById("message");

        // Melakukan encoding pada nilai input sebelum mengirimkan formulir
        nameInput.value = encodeHTML(nameInput.value);
        emailInput.value = encodeHTML(emailInput.value);
        messageInput.value = encodeHTML(messageInput.value);
    });

    function encodeHTML(input) {
        return input.replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;")
                    .replace(/'/g, "&#39;");
    }
</script>
    <script>

      function getOffSet(){
        var _offset = 450;
        var windowHeight = window.innerHeight;

        if(windowHeight > 500) {
          _offset = 400;
        } 
        if(windowHeight > 680) {
          _offset = 300
        }
        if(windowHeight > 830) {
          _offset = 210;
        }

        return _offset;
      }

      function setParallaxPosition($doc, multiplier, $object){
        var offset = getOffSet();
        var from_top = $doc.scrollTop(),
          bg_css = 'center ' +(multiplier * from_top - offset) + 'px';
        $object.css({"background-position" : bg_css });
      }

      // Parallax function
      // Adapted based on https://codepen.io/roborich/pen/wpAsm        
      var background_image_parallax = function($object, multiplier, forceSet){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        // $object.css({"background-attatchment" : "fixed"});

        if(forceSet) {
          setParallaxPosition($doc, multiplier, $object);
        } else {
          $(window).scroll(function(){          
            setParallaxPosition($doc, multiplier, $object);
          });
        }
      };

      var background_image_parallax_2 = function($object, multiplier){
        multiplier = typeof multiplier !== 'undefined' ? multiplier : 0.5;
        multiplier = 1 - multiplier;
        var $doc = $(document);
        $object.css({"background-attachment" : "fixed"});
        
        $(window).scroll(function(){
          if($(window).width() > 768) {
            var firstTop = $object.offset().top,
                pos = $(window).scrollTop(),
                yPos = Math.round((multiplier * (firstTop - pos)) - 186);              

            var bg_css = 'center ' + yPos + 'px';

            $object.css({"background-position" : bg_css });
          } else {
            $object.css({"background-position" : "center" });
          }
        });
      };
      
      $(function(){
        // Hero Section - Background Parallax
        background_image_parallax($(".tm-parallax"), 0.30, false);
        background_image_parallax_2($("#contact"), 0.80);   
        background_image_parallax_2($("#testimonials"), 0.80);   
        
        // Handle window resize
        window.addEventListener('resize', function(){
          background_image_parallax($(".tm-parallax"), 0.30, true);
        }, true);

        // Detect window scroll and update navbar
        $(window).scroll(function(e){          
          if($(document).scrollTop() > 120) {
            $('.tm-navbar').addClass("scroll");
          } else {
            $('.tm-navbar').removeClass("scroll");
          }
        });
        
        // Close mobile menu after click 
        $('#tmNav a').on('click', function(){
          $('.navbar-collapse').removeClass('show'); 
        })

        // Scroll to corresponding section with animation
        $('#tmNav').singlePageNav({
          'easing': 'easeInOutExpo',
          'speed': 600
        });        
        
        // Add smooth scrolling to all links
        // https://www.w3schools.com/howto/howto_css_smooth_scroll.asp
        $("a").on('click', function(event) {
          if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;

            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 600, 'easeInOutExpo', function(){
              window.location.hash = hash;
            });
          } // End if
        });

        // Pop up
        $('.tm-gallery').magnificPopup({
          delegate: 'a',
          type: 'image',
          gallery: { enabled: true }
        });

        $('.tm-testimonials-carousel').slick({
          dots: true,
          prevArrow: false,
          nextArrow: false,
          infinite: false,
          slidesToShow: 3,
          slidesToScroll: 1,
          responsive: [
            {
              breakpoint: 992,
              settings: {
                slidesToShow: 2
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2
              }
            }, 
            {
              breakpoint: 480,
              settings: {
                  slidesToShow: 1
              }                 
            }
          ]
        });

        // Gallery
        $('.tm-gallery').slick({
          dots: true,
          infinite: false,
          slidesToShow: 5,
          slidesToScroll: 2,
          responsive: [
          {
            breakpoint: 1199,
            settings: {
              slidesToShow: 4,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 991,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 767,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
        });
      });
    </script>
    <script>
    // Tambahkan script JavaScript untuk menangani logout saat tombol Logout diklik
    document.getElementById('logoutLink').addEventListener('click', function(event) {
        event.preventDefault(); // Menghentikan aksi default dari link
        logout(); // Panggil fungsi logout
    });

    function logout() {
        // Lakukan logout melalui AJAX atau langsung mengarahkan ke halaman logout PHP
        // Saya akan menunjukkan contoh menggunakan AJAX
        // Pastikan untuk memasukkan library jQuery jika belum ada

        $.ajax({
            type: "POST",
            url: "../../crud/php/logout.php", // Gantilah dengan URL yang sesuai
            success: function(response) {
                // Redirect ke halaman login setelah logout
                window.location.href = "../../crud/php/login.php";
            },
            error: function(error) {
                console.error("Error during logout:", error);
                // Handle error jika diperlukan
            }
        });
    }
</script>
<script>
    document.getElementById('contactForm').addEventListener('submit', function (e) {
        e.preventDefault();

        // Simpan formulir dalam variabel
        var form = this;

        // Kirim formulir secara synchronous (non-Ajax)
        form.submit();

        // Tambahkan notifikasi SweetAlert
        Swal.fire({
            title: 'Form Submitted!',
            text: 'Your form has been submitted successfully.',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    });
</script>

    
  </body>
</html>