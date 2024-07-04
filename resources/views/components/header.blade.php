<style>
    /* Default height for small devices */
    @import url('https://fonts.googleapis.com/css?family=Lato');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Lato', sans-serif;
  font-weight: 400;
  font-size: 15px;
  line-height: 1.7;
  color: #fff;
}

.header {
  height: 95vh;
  width: 100%;
  background-image: linear-gradient(
    to right bottom, rgba(90, 232, 140, 0.829), 
    rgba(201, 109, 35, 0.8)),
    url('');
  background-size: cover;
  bacground-position: center;
  position: relative;
}

.text-box {
  position: absolute;
  top: 50%;
  left: 50%;
  text-align: center;
  transform: translate(-50%, -50%);
}

.heading-primary-top {
  display: block;
  font-size: 55px;
  text-transform: uppercase;
  letter-spacing: 20px;
}

.heading-primary-bottom {
  display: block;
  font-size: 18px;
  letter-spacing: 7px;
  font-weight: 700;
}

.btn:link,
.btn:visited {
  text-transform: uppercase;
  text-decoration: none;
  display: inline-block;
  border-radius: 100px;
  padding: 15px 40px;
  margin-top: 40px;
}

.btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(0, 0, 0, .2);
}

.btn:active {
  transform: translateY(-1px);
  box-shadow: 0 5px 10px rgba(0, 0, 0, .2);
}

.btn::after {
  content: "";
  display: inline-block;
  width: 100%;
  height: 100%;
  border-radius: 100px;
  position: absolute;
  top: 0;
  left: 0;
  z-index: -1;
  transition: all .4s;
}

.btn-call-to-action {
  background-color: #fff;
  color: #777;
  position: relative;
}

.btn-call-to-action::after {
  background-color: #fff;
}

.btn-call-to-action:hover::after {
  transform: scaleX(1.35) scaleY(1.55);
  opacity: 0;
}

.btn-animate {
  animation: moveUp .7s cubic-bezier(.64,.01,.49,1.76) .75s;
  animation-fill-mode: backwards;
}

@keyframes moveUp {
  0% {
    opacity: 0;
    transform: translateY(50px);
  }
  100% {
    opacity: 1;
    transform: translate(0);
  }
}


</style>

<!-- Navbar -->

<!-- Navbar -->

<!-- Background image -->


<header class="header">

  <div class="text-box">
    <h1 class="heading-primary">
      <span class="heading-primary-top">Los Cerezos</span> 
      <span class="heading-primary-bottom">¡Conoce nuestros productos!</span>
    </h1>
    <a class="btn btn-call-to-action btn-animate" href="#">INGRESAR A LA TIENDA</a>
  </div>
</header>
<style>



  footer {
    padding: 1rem 0;
    background: #f7f7f7;
    text-align: center;
    color: black;
  
  }

</style>
    
    <footer class="bg-white">
      <div class="container">
        <div class="grid">
          <div class="column-xs-12">
            <div class="container p-1 pb-0">
              <!-- Section: Social media -->
              <section class="mb-1">
                <!-- Facebook -->
              
          
                <a
      
                class="btn text-white btn-floating m-1"
                href="http://automatizacioncaldas.blogspot.com/"
                role="button">
                <img src="sen.png" width="190px"/>
  
            </a>
            
                <a

                  class="btn text-white btn-floating m-1"
                  href="https://oferta.senasofiaplus.edu.co/sofia-oferta/"
                  role="button">
                  <img src="https://tramiteinformativo.com/wp-content/uploads/2022/08/logo-sena-verde-png-sin-fondo.png" width="35px"/>

                </a>

              

              <a

                  class="btn text-white btn-floating m-1"
                  href="https://oferta.senasofiaplus.edu.co/sofia-oferta/"
                  role="button">
                  <img src="agroSENA_logo.png" width="35px"/>

                </a>

                
                
              </section>
         
            </div>
            <p class="copyright">&copy; Copyright 2022 Adsi2324924.</p>
          </div>
        </div>
      </div>
    </footer>
