<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>

  *{
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing:border-box;
        scroll-padding-top:2rem;
        scroll-behaviour:smooth;
        list-style:none;
        text-decoration:none;
        

     }

    html {
        scroll-behavior: smooth;
        /*background-color:lightblue;*/
    }

    :root{
        --main-color:#fe5b3d;
        --second-color:#ffac38;
        --text-color:#444;
        --gradient:linear-gradient(#f35b3d,#ffac38);    
    }



    html::webkit-scrollbar{
        width:0.5rem;
    }
    html::webkit-scrollbar-track{
        background:transparent;
    }
    html::webkit-scrollbar-thumb{
        background:var(--main-color);
        border-rdaius:5rem;
    }
  
  header{
        postion:fixed;
        width:100%;
        color:whitesmoke
        top:0;
        right:0;
        z-index: 1000;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background:lightgrey;
        padding:15px 100px;
    }

    header .logo span{
      color:crimson;
    }

    .logo{
      width:50px;
      font-size:25px;
      color:#fff;
    }

    .navbar{
        display: flex;
    }

    .navbar li{
        position: relative;
    } 

    .navbar a{
        color:black;
        font-size:1rem;
        padding:10px 20px;
        font-weight:500;
    }

    .navbar a::after{
        content:'';
        width:0;
        height:3px;
        background:var(--gradient);
        position:absolute;
        bottom:-4px;
        left:0;
        transition:0.5s;
    }

    .navbar a:hover::after{
        width:100%;
    }
    #menu-icon{
        font-size:24px;
        cursor:pointer;
        z-index:10001;
        display: none;
    }

    .header-btn a{
        padding:10px 20px;
        color:var(--text-color);
        font-weight:500;
    }


    .header-btn .sign-up{
        color:crimson;
    }

    .header-btn .sign-in{
        background:#474fa0;
        color:white;
        border-radius:0.3rem;
        transition:0.5s ease;
    }

    .header-btn .sign-in:hover{
        background:var(--main-color);
    }

    header{
        position:sticky;
    }

    header.sticky{
        color:lightgrey;
    }

    .main{
        height:766px;
        width:100vw;
        background: #222;
    }
  </style>
</head>
<body>

<header>

<div class="logo">
<a href="/loginsystem">IFA<span>Login</span></a>
</div>

<div class="bx bx-menu" id="menu-icon"></div>

<ul class="navbar">
        <li><a href="/loginsystem/_nav.php">Home</a></li>
        <li><a href="/loginsystem/welcome.php">About</a></li>
        <li><a href="/loginsystem/signup.php">SignUp</a></li>
        <li><a href="/loginsystem/logout.php">Logout</a></li>
</ul>

<div class="header-btn">
    <a href="/loginsystem/signup.php" class="sign-up">Sign Up</a>
    <a href="/loginsystem/login.php" class="sign-in">Login</a>
</div>
</header>

<!--<div class="main">

</div> -->

</body>
</html>


