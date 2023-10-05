<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <style>
    * {
      margin: 0;
      padding: 0;
      color: #f2f5f7;
      font-family: sans-serif;
      letter-spacing: 1px;
      font-weight: 300;
    }

    body {
      overflow-x: hidden;
    }

    nav {
      height: 4.5rem;
      width: 100vw;
      background: linear-gradient(to right, #9b1313, #ed1818);
      box-shadow: 0 3px 20px rgba(0, 0, 0, 0.2);
      display: flex;
      position: fixed;
      z-index: 10;
    }

    /*Styling logo*/
    .logo-menu {
      padding: 1vh 1vw;
      text-align: center;
      display: flex;
      align-items: center;
      padding-top: 16px;
    }

    /*Styling Links*/
    .nav-links-menu {
      display: flex;
      list-style: none;
      width: 88vw;
      padding: 0 0.7vw;
      justify-content: space-evenly;
      align-items: center;
      text-transform: uppercase;
    }

    .nav-links-menu li a {
      text-decoration: none;
      margin: 0 0.7vw;
    }

    .nav-links-menu li a hover {
      color: #df3e3e;
    }

    .nav-links-menu li {
      position: relative;
    }

    .nav-links-menu li a:hover::before {
      width: 80%;
    }

    /*Styling Buttons*/
    .login-button-menu {
      background-color: transparent;
      border: 1.5px solid #f2f5f7;
      border-radius: 2em;
      padding: 0.6rem 0.8rem;
      margin-left: 2vw;
      font-size: 1rem;
      cursor: pointer;
    }

    .login-button-menu:hover {
      color: #131418;
      background-color: #f2f5f7;
      border: 1.5px solid #f2f5f7;
      transition: all ease-in-out 350ms;
    }

    /*Styling Hamburger Icon*/
    .hamburger-menu div {
      width: 30px;
      height: 3px;
      background: #f2f5f7;
      margin: 5px;
      transition: all 0.3s ease;
    }

    .hamburger-menu {
      display: none;
    }

    /*Stying for small screens*/
    @media screen and (max-width: 800px) {
      nav-menu {
        position: fixed;
        z-index: 3;
      }

      .hamburger-menu {
        display: block;
        position: absolute;
        cursor: pointer;
        right: 5%;
        top: 50%;
        transform: translate(-5%, -50%);
        z-index: 2;
        transition: all 0.7s ease;
      }

      .nav-links-menu {
        position: fixed;
        background: linear-gradient(to bottom, #9b1313, #e21f1f);
        height: 100vh;
        width: 100%;
        flex-direction: column;
        clip-path: circle(50px at 90% -20%);
        -webkit-clip-path: circle(50px at 90% -10%);
        transition: all 1s ease-out;
        pointer-events: none;
      }

      .nav-links-menu.open {
        clip-path: circle(1000px at 90% -10%);
        -webkit-clip-path: circle(1000px at 90% -10%);
        pointer-events: all;
      }

      .nav-links-menu li {
        opacity: 0;
      }

      .nav-links-menu li:nth-child(1) {
        transition: all 0.5s ease 0.2s;
      }

      .nav-links-menu li:nth-child(2) {
        transition: all 0.5s ease 0.4s;
      }

      .nav-links-menu li:nth-child(3) {
        transition: all 0.5s ease 0.6s;
      }

      .nav-links-menu li:nth-child(4) {
        transition: all 0.5s ease 0.7s;
      }

      .nav-links-menu li:nth-child(5) {
        transition: all 0.5s ease 0.8s;
      }

      .nav-links-menu li:nth-child(6) {
        transition: all 0.5s ease 0.9s;
        margin: 0;
      }

      .nav-links-menu li:nth-child(7) {
        transition: all 0.5s ease 1s;
        margin: 0;
      }

      li.fade {
        opacity: 1;
      }

      .inner-header img {
        height: 75%;
        width: 75%;
      }
    }

    /*Animating Hamburger Icon on Click*/
    .toggle .line1 {
      transform: rotate(-45deg) translate(-5px, 6px);
    }

    .toggle .line2 {
      transition: all 0.7s ease;
      width: 0;
    }

    .toggle .line3 {
      transform: rotate(45deg) translate(-5px, -6px);
    }

    h1 {
      font-family: "Lato", sans-serif;
      font-weight: 300;
      letter-spacing: 2px;
      font-size: 48px;
    }

    p {
      font-family: "Lato", sans-serif;
      letter-spacing: 1px;
      font-size: 14px;
      color: #333333;
    }

    .header {
      position: relative;
      text-align: center;
      background: -webkit-linear-gradient(to right, #414345, #232526);
      background: linear-gradient(to right, #414345, #232526);
      color: white;
    }

    .logo-menu {
      width: 50px;
      fill: white;
      padding-right: 15px;
      display: inline-block;
      vertical-align: middle;
    }

    .inner-header {
      height: 65vh;
      width: 100%;
      margin: 0;
      padding: 0;
      background-color: #931f1f;
    }
  </style>
</head>

<body>
  <!--NavBar Início-->
  <nav>
    <div class="logo-menu">
      <a href="inicial.php"><img style="
              display: block;
              margin: auto;
              transition: background-color 300ms;
            " src="https://www.claro.com.br/files/104379/x/4e0cdf35df/claro.svg/m/filters:quality(75)" /></a>
    </div>
    <div class="hamburger-menu">
      <div class="line1"></div>
      <div class="line2"></div>
      <div class="line3"></div>
    </div>
    <ul class="nav-links-menu">
      <li><a href="#">CONSULTA</a></li>
      <li><a href="#">MODELO</a></li>
      <li><a href="about.php">SOBRE NÓS</a></li>
      <li><a href="#">SERVIÇOS</a></li>

      <li>
        <a class="login-button-menu" href="Login.html">Login</a>
      </li>
    </ul>
  </nav>
  <!--NavBar Fim-->
  <script>
    // Hamburguer Menu Início
    const hamburger = document.querySelector(".hamburger-menu");
    const navLinks = document.querySelector(".nav-links-menu");
    const links = document.querySelectorAll(".nav-links-menu li");

    hamburger.addEventListener("click", () => {
      //Animate Links
      navLinks.classList.toggle("open");
      links.forEach((link) => {
        link.classList.toggle("fade");
      });

      //Hamburger Animation
      hamburger.classList.toggle("toggle");
    });
    // Hamburguer Menu Fim
  </script>
</body>

</html>