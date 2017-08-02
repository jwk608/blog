
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Blog- Welcome</title> <!-- change THIS TITLE EVERY PAGE-->


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    @yield('stylesheets')
    <style>
        body {
    padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
}
        .red{
    color:red;
    }
.form-area
{
    background-color: #FAFAFA;
    padding: 10px 40px 60px;
    margin: 10px 0px 60px;
    border: 1px solid GREY;
    }
        
/* footer */        
.full {
    width: 100%;    
}
.gap {
    height: 30px;
    width: 100%;
    clear: both;
    display: block;
}
.footer {
    background: #EDEFF1;
    height: auto;
    padding-bottom: 30px;
    position: relative;
    width: 100%;
    border-bottom: 1px solid #CCCCCC;
    border-top: 1px solid #DDDDDD;
}
.footer p {
    margin: 0;
}
.footer img {
    max-width: 100%;
}
.footer h3 {
    border-bottom: 1px solid #BAC1C8;
    color: #54697E;
    font-size: 18px;
    font-weight: 600;
    line-height: 27px;
    padding: 40px 0 10px;
    text-transform: uppercase;
}
.footer ul {
    font-size: 13px;
    list-style-type: none;
    margin-left: 0;
    padding-left: 0;
    margin-top: 15px;
    color: #7F8C8D;
}
.footer ul li a {
    padding: 0 0 5px 0;
    display: block;
}
.footer a {
    color: #78828D
}
.supportLi h4 {
    font-size: 20px;
    font-weight: lighter;
    line-height: normal;
    margin-bottom: 0 !important;
    padding-bottom: 0;
}

.footer-bottom {
    background: #E3E3E3;
    border-top: 1px solid #DDDDDD;
    padding-top: 10px;
    padding-bottom: 10px;
}
.footer-bottom p.pull-left {
    padding-top: 6px;
}
.payments {
    font-size: 1.5em;   
}        
    </style>
  </head>
  <body>
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Laravel</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="/">Home</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/contact">Contact</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <!-- end-navigation -->  
    
    <!-- main-content -->
    <div class="container">

        @yield('content')

    </div>
    <hr/><br/>
    <!-- end-main-content -->
    <!--footer -->
    <footer>
    <div class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-2  col-md-2 col-sm-4 col-xs-6">
                    <h3> Quick Links </h3>
                    <ul>
                        <li> <a href="#"> Popular Post </a> </li>
                        <li> <a href="#"> Latest Posts </a> </li>
                        <li> <a href="#"> About Me </a> </li>
                        <li> <a href="#"> Contact Me </a> </li>
                    </ul>
                </div>
            </div>
            <!--/.row--> 
        </div>
        <!--/.container--> 
    </div>
    <!--/.footer-->
    
    <div class="footer-bottom">
        <div class="container">
            <p class="pull-left"> Copyright ©Laravel 2017. All right reserved. </p>
        </div>
    </div>
    <!--/.footer-bottom--> 
</footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script>
      $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
  </script>
  @yield('scripts')
  </body>
</html>