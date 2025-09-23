<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}" />
<link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}" />
<meta name="apple-mobile-web-app-title" content="PayConnect" />
<meta name="description" content="{{ config('app.name') }} lets you earn daily income by purchasing products. Turn every purchase into a smart investment.">
  <meta name="keywords" content="earn daily income, buy to earn, investment products, passive income, product-based ROI, {{ config('app.name') }}, online earning, income from shopping">
<!-- Canonical URL -->
  <link rel="canonical" href="{{ url()->current() }}">
<!-- Open Graph / Facebook -->
  <meta property="og:title" content="Buy Products & Earn Daily | {{ config('app.name') }}">
  <meta property="og:description" content="Invest by buying products on {{ config('app.name') }} and earn daily income. Join a smarter way to grow your money.">
  <meta property="og:image" content="{{ asset('logo.png?v=1.1') }}"> <!-- Replace with actual image URL -->
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="{{ config('app.name') }}">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Buy & Earn Daily | {{ config('app.name') }}">
  <meta name="twitter:description" content="Turn purchases into profits. Earn daily income by investing in products on {{ config('app.name') }}.">
  <meta name="twitter:image" content="{{ asset('logo.png?v=1.1') }}"> <!-- Replace with actual image URL -->
  <meta name="twitter:site" content=""> <!-- Optional -->


<link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />
<link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.config('versions.vite_version').'') }}">
<link rel="stylesheet" href="{{ asset('vitecss/css/app.css?v='.config('versions.vite_version').'') }}">
<link rel="manifest" href="{{ asset('manifest.json') }}" class="">
<title>{{ config('app.name') }} | Users | @yield('title')</title>

    @yield('css')
</head>
<section class="pos-fixed loading column justify-center top-0 left-0 bottom-0 right-0 bg higher">
<svg fill="var(--primary)" height="100" width="100" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="RadialGradient8932"><stop offset="0%" stop-color="var(--primary)" stop-opacity="1"/><stop offset="100%" stop-color="var(--primary)" stop-opacity="0.25"/></linearGradient></defs><style>@keyframes spin8932 {
            to {
                transform: rotate(360deg);
            }
        }

        #circle8932 {
            transform-origin: 50% 50%;
            stroke: url(#RadialGradient8932);
            fill: none;
            animation: spin8932 .5s infinite linear;
            :

        }</style><circle cx="10" cy="10" r="8" id="circle8932" stroke-width="2"/></svg>
</section>
<template class="spa_loader">
  <div class="x-auto c-primary y-auto">
    <svg stroke="currentColor" height="70" width="70" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><circle cx="12" cy="12" r="9.5" fill="none" stroke-width="3" stroke-linecap="round"><animate attributeName="stroke-dasharray" dur="1.5s" calcMode="spline" values="0 150;42 150;42 150;42 150" keyTimes="0;0.475;0.95;1" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" repeatCount="indefinite"/><animate attributeName="stroke-dashoffset" dur="1.5s" calcMode="spline" values="0;-16;-59;-59" keyTimes="0;0.475;0.95;1" keySplines="0.42,0,0.58,1;0.42,0,0.58,1;0.42,0,0.58,1" repeatCount="indefinite"/></circle><animateTransform attributeName="transform" type="rotate" dur="2s" values="0 12 12;360 12 12" repeatCount="indefinite"/></g></svg>
  </div>
</template>
<body class="column bg justify-center">
   <header class="pos-sticky average row align-center space-between no-select pc-x-padding stick-top w-full bg border-bottom-thin p-10">
    <img src="{{ asset('images/avatar.svg?v=1.1') }}" height="50" alt="">
    <strong class="desc">@yield('title')</strong>
    <img src="{{ asset('logo.png?v=1.1') }}" height="30" alt="">
   </header>
   <main class="flex-auto bg pc-x-padding w-full">
    <section class="popup" onclick="HidePopUp(MyFunc.PopUpHidden)">
      <div onclick="StopPropagation(event)" class="child">@yield('popup_child')</div>
    </section>
    <section class="slideup" onclick="HideSlideUp()">
      <div class="child" onclick="StopPropagation(event)">@yield('slideup_child')</div>
    </section>
     @yield('main')
   </main>
   <footer class="box-shadow-silver pc-x-padding no-select bg w-full pos-sticky stick-bottom row space-between">
    <div onclick="spa(event,'{{ url('users/dashboard') }}',this)" class="column pc-pointer nav p-10 g-5 w-full align-center">
       <div class="svg p-5 align-center column w-full">
       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="CurrentColor" viewBox="0 0 256 256"><path d="M231.69,93.81,217.35,43.6A16.07,16.07,0,0,0,202,32H54A16.07,16.07,0,0,0,38.65,43.6L24.31,93.81A7.94,7.94,0,0,0,24,96v16a40,40,0,0,0,16,32v72a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8V144a40,40,0,0,0,16-32V96A7.94,7.94,0,0,0,231.69,93.81ZM88,112a24,24,0,0,1-35.12,21.26,7.88,7.88,0,0,0-1.82-1.06A24,24,0,0,1,40,112v-8H88Zm64,0a24,24,0,0,1-48,0v-8h48Zm64,0a24,24,0,0,1-11.07,20.2,8.08,8.08,0,0,0-1.8,1.05A24,24,0,0,1,168,112v-8h48Z"></path></svg>

       </div>
        <span>Home</span>
    </div>

    <div onclick="spa(event,'{{ url('users/tasks') }}',this)" class="column pc-pointer nav p-10 g-5 w-full align-center">
       <div class="svg p-5 align-center column w-full">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="CurrentColor" viewBox="0 0 256 256"><path d="M238,82.73A8,8,0,0,0,232,80H187.63L134,18.73a8,8,0,0,0-12,0L68.37,80H24a8,8,0,0,0-7.93,9.06L31.14,202.12A16.06,16.06,0,0,0,47,216H209a16.06,16.06,0,0,0,15.86-13.88L239.93,89.06A8,8,0,0,0,238,82.73ZM81.6,184a7.32,7.32,0,0,1-.81,0,8,8,0,0,1-8-7.2l-5.6-56a8,8,0,0,1,15.92-1.6l5.6,56A8,8,0,0,1,81.6,184Zm54.4-8a8,8,0,0,1-16,0V120a8,8,0,0,1,16,0ZM89.63,80,128,36.15,166.37,80Zm99.13,40.8-5.6,56a8,8,0,0,1-7.95,7.2,7.32,7.32,0,0,1-.81,0,8,8,0,0,1-7.16-8.76l5.6-56a8,8,0,0,1,15.92,1.6Z"></path></svg>

       </div>
        <span class="ws-nowrap">Tasks</span>
    </div>
    <div onclick="spa(event,'{{ url('users/recharge') }}',this)" class="column pc-pointer nav p-10 g-5 w-full align-center">
       <div class="svg p-5 align-center column w-full">
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="CurrentColor" viewBox="0 0 256 256"><path d="M128,24A104,104,0,1,0,232,128,104.13,104.13,0,0,0,128,24Zm40,112H136v32a8,8,0,0,1-16,0V136H88a8,8,0,0,1,0-16h32V88a8,8,0,0,1,16,0v32h32a8,8,0,0,1,0,16Z"></path></svg>
       
       </div>
        <span>Deposit</span>
    </div>
    <div onclick="spa(event,'{{ url('users/withdraw') }}',this)" class="column pc-pointer nav p-10 g-5 w-full align-center">
       <div class="svg p-5 align-center column w-full">
         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="CurrentColor" viewBox="0 0 256 256"><path d="M208,48H48A24,24,0,0,0,24,72V184a24,24,0,0,0,24,24H208a24,24,0,0,0,24-24V72A24,24,0,0,0,208,48Zm-56,72a24,24,0,0,1-48,0,8,8,0,0,0-8-8H40V96H216v16H160A8,8,0,0,0,152,120ZM48,64H208a8,8,0,0,1,8,8v8H40V72A8,8,0,0,1,48,64Z"></path></svg>
        
       </div>
        <span>Withdraw</span>
    </div>
    <div onclick="spa(event,'{{ url('users/profile') }}',this)" class="column pc-pointer nav p-10 g-5 w-full align-center">
       <div class="svg p-5 align-center column w-full">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="CurrentColor" viewBox="0 0 256 256"><path d="M230.93,220a8,8,0,0,1-6.93,4H32a8,8,0,0,1-6.92-12c15.23-26.33,38.7-45.21,66.09-54.16a72,72,0,1,1,73.66,0c27.39,8.95,50.86,27.83,66.09,54.16A8,8,0,0,1,230.93,220Z"></path></svg>
      </div> 
        <span>Mine</span>
    </div>
    
   </footer>
    
    <script src="{{ asset('vitecss/js/app.js?v='.config('versions.vite_version').'') }}"></script>
    @yield('js')
</body>
</html>