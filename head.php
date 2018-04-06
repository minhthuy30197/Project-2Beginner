<style>
    .navbar {
        min-height: 60px;
    }

    .navbar-default {
        background-color: #00b5a9;
        border-color: #E7E7E7;
    }

    .sticky {
        position: fixed;
        top: 0;
        width: 100%
    }

    .dotcom {
        color: #00b5a9;
    }

    .logo {
        font-family: Verdana;
        line-height: 1;
        font-weight: bold;
        font-size: 38px;
        letter-spacing: 3px;
        color: #555555;
        display: block;
        position: relative;
        padding-bottom: 15px;
        padding-top: 25px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .slogan {
        color: #4b4b4b;
        font-size: 20px;
        padding-top: 30px;
        font-weight: lighter;
        font-family: "Courier New";
    }

    .navbar-default .navbar-brand {
        color: white;
    }

    .navbar-default .navbar-nav > li > a {
        font-size: x-large;
        font-family: "Courier New";
        color: white;
    }

    .navbar-default .navbar-brand:hover {
        opacity: 0.6;
    }

    .navbar-default .navbar-nav > li > a:hover {
        opacity: 0.6;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="logo">2Beginner<span class="dotcom">.com</span></div>
        </div>
        <div class="col-md-6 col-xs-12 text-right">
            <div class="slogan">Let us help you make your future</div>
        </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-inverse" id="myHeader">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-home"></span></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-left">
                <li><a href="#">Listening</a></li>
                <li><a href="#">Reading</a></li>
                <li><a href="#">Vocabulary</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<script>
    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset >= sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
</script>
