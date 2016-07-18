@extends('template.t_index')
@section('content')

<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800,600,300' rel='stylesheet' type='text/css'>
{{ Html::style(asset('css/megamenu.css')) }}
{{ Html::script(asset('js/megamenu.js')) }}
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>

<?php  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));?>

<div class="header">
	<div class="container">
		<div class="logo">
			<div class="col-md-5">
            	<a href="{{ URL('\') }}">
					<img src="gambar/mapicon.png" class="img-responsive" alt="" style="text-size:5.15em;" align="center">
                </a>
			</div>
			<div class="col-md-7"><h3 style="font-weight:bold;"><br>
            	Sistem Informasi Geografis -  Pengusaha Kota Bandung</h3>
				<br>
				<h1 style="color:blue;">MOBILOCATOR <font color="red">Website</font></h1>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<div class="header-bottom">
	<div class="container">
		<div class="top-nav">
			<span class="menu"> </span>
			<ul class="navig megamenu skyblue">
				<li class="home"><a href="{{ URL('location') }}" class="scroll"><span> </span> Cari Lokasi</a>
                    <div class="megapanel">
                        <div class="na-left">
                            <ul class="grid-img-list">
                                <li><a href="{{ URL('location') }}">Pencarian Lokasi  </a></li> |
                                <li><a href="{{ URL('reviewlocation') }}"> Review Usaha  </a></li> |
                                <div class="clearfix"> </div>	
                            </ul>
                        </div>
                        <div class="na-right">
                            <ul class="grid-img-list">
                                <li><a href="{{ URL('login') }}">Login Here or</a></li>
                                <li class="reg">
                                    <form action="{{ URL('pemilik_register') }}">
                                        <input type="submit" value="Register">
                                    </form>
                                </li>
                                <div class="clearfix"> </div>	
                            </ul>
                        </div>
                        <div class="clearfix"> </div>	
                    </div>
				</li>
				<li><a href="{{ URL('usaha') }}" class="scroll"> <span class="service"> </span>Data Usaha</a></li>
				<div class="clearfix"></div>
			</ul>
			<script>
            $("span.menu").click(function(){
				$(".top-nav ul").slideToggle(300, function(){
				});
            });
            </script>
		</div>
		<div class="head-right">
			<ul class="number">
				<li><a href="{{ URL('login') }}"><i class="phone"> </i>Sign In</a></li>
				<li><a href="{{ URL('contact') }}"><i class="mail"> </i>Contact</a></li>	
				<div class="clearfix"> </div>						
			</ul>
		</div>
		<div class="clearfix"> </div>	
    </div>
</div>
<div class="banner">
    <?php include("{{ asset('php/maps_usaha.php') }}") ;?>
</div>
<div class="container" style="background-color:#057a81; width:100%;">
    <div class="col-md-4">
        <span style="text-align:center;"> </span>
    </div>
    <div class="col-md-4">
        <span style="text-align:center; color:white;"> TUGAS BESAR ATOL - MOBILOCATOR  2016</span>
    </div>
    <div class="col-md-4">
        <span style="text-align:center;"> </span>
    </div>
</div>

@stop