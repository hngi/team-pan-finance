<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FinTrack</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/tachyons.css') }}">
        <style>
            .btn-outline-primary:hover {
                border: 2px solid #5829B8;
                color: #000;
                background-color: #fff;
            }
        </style>

    </head>
    <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand ml-5" href="#" style="color: #5829B8; font-weight: 800; font-size: 250%;">
            <img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1569248451/finance-tracker/Finance_money_Dollar_management_cash_savings_salary-512_sgdosn.png" alt="Logo" style="width:40px;"><span class="mt-2">fintrack</span>
        </a>
        
        
            <ul class="navbar-nav mr-auto">

            </ul>
            
            <ul class="navbar-nav">

 <li class="nav-link "><a class="ml-5" href="{{ url('faqs') }}" style="text-decoration: none; font-size: 120%; color: #5829B8;">FAQS</a></li>
 <li class="nav-link "><a class="ml-5" href="{{ url('about') }}" style="text-decoration: none; font-size: 120%; color: #5829B8;">About</a></li>
                <li class="nav-link mr-5"><a class="ml-5" href="{{ url('team') }}" style="text-decoration: none; font-size: 120%; color: #5829B8;">Team</a></li>
                            </ul>        
        <li class="nav-link mr-5"><a class="ml-5" href="{{ url('testimonials') }}" style="text-decoration: none; font-size: 120%; color: #5829B8;">Testimonials</a></li>
                            </ul> 
    </nav>


    <div class="container">

        <div class="row">
            <div class="col-md-6 left-side">
                <div class="container mt-5">
                    <h1>Track Your <br> Finances</h1>
                    <p>Follow up on your finances, <br> by keeping a day to day record of your spending</p>
                    <ul class="navbar-nav">

                <li class="nav-item mr-2 mb-1">
                    <a class="nav-link btn btn-outline-primary" href="{{ route('login') }}" style="border: 2px solid #5829B8; color: #000">LOGIN</a>
                </li>
                <li class="nav-item mr-2 mb-1">
                    <a class="nav-link btn btn-primary" href="{{ asset('register') }}" style="background-color: #5829B8; border: 2px solid #5829B8; color: #fff;">REGISTER</a>
                </li>
            </ul>
                </div>
            </div>
            <div class="col-md-6 right-side">
                <img src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1569248452/finance-tracker/pilot-homepage-final_i4tlpr.png" alt="home-image" class="img-fluid">
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <footer class="pv4 ph3 ph5-m ph6-l mid-gray">
  <small class="f6 db tc"><?php echo date("Y") ?> <b class="ttu">fintrack</b>., All Rights Reserved</small>
  <div class="tc mt3">
   {{--  <a href="{{ url('faqs') }}" title="Language" class="f6 dib ph2 link mid-gray dim">FAQs</a>
    <a href="{{ url('about') }}"    title="Terms" class="f6 dib ph2 link mid-gray dim">About</a>
    <a href="{{ url('team') }}/privacy/"  title="Privacy" class="f6 dib ph2 link mid-gray dim">Team</a>
    <a href="{{ url('testimonial') }}/privacy/"  title="Privacy" class="f6 dib ph2 link mid-gray dim">Testimonial</a>
    <br> --}}
    <a style="text-decoration: none; font-size: 120%; color: #5829B8;" href="{{ route('admin.login') }}"  title="Privacy" class="f6 dib ph2 link mid-gray dim">Administrator Login</a>
  </div>
</footer>
    </body>
</html>