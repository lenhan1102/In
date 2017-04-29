@extends('User.user-master')

@section('title')
{{$dish->name}}
@endsection
@section('header')
<script>

    // This is the first thing we add ------------------------------------------
    $(document).ready(function() {
    	$('.ratings_stars').hover(
            // Handles the mouseover
            function() {
            	$(this).prevAll().addBack().addClass('ratings_over');
            	$(this).nextAll().removeClass('ratings_vote'); 
            },
            // Handles the mouseout
            function() {
            	$(this).prevAll().addBack().removeClass('ratings_over');
                // can't use 'this' because it wont contain the updated data
                set_votes($(this).parent());
            }
            );


        // This actually records the vote when click
        $('.ratings_stars').bind('click', function() {
        	var star = this;
        	var widget = $(this).parent();
        	var voted = $(star).attr('class');
        	
        	$.ajax({
        		url: "{{route('vote')}}",
        		type:"POST",
        		beforeSend: function (xhr) {
        			var token = $('meta[name="csrf_token"]').attr('content');

        			if (token) {
        				return xhr.setRequestHeader('X-CSRF-TOKEN', token);
        			}
        		},
        		data: { voted : voted},
        		success:function(data){
        			console.log(data);
        			set_votes(widget, data);
        		},
        		error:function(){ 
        			alert("error!!!!");
        		}
        	});
        });
    });

    function set_votes(widget, data) {
    	$(widget).find('.star_' + data).prevAll().addBack().addClass('ratings_vote');
    	$(widget).find('.star_' + data).nextAll().removeClass('ratings_vote'); 
    	
    }
</script>

<script type="text/javascript">
	$.fn.xstar = function() {
		return $(this).each(function() {
			$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 16));
		});
	}
	$(function() {
		$('span.xstar').xstar();
	});
	$(document).ready(function(){
		$("#add").click(function(){
			$.get('{{route('action.addToCart', ["id" => $dish->id])}}', function(data){
				$("#cart > div").attr('data-badge', data);
			});
		});
	});


</script>
<header class="mdl-layout__header">
	<div class="mdl-layout__header-row">
		<!-- Title -->
		<span class="mdl-layout-title">Logo</span>
		<div class="mdl-layout-spacer"></div>
		<!-- Search-->
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
			<label class="mdl-button mdl-js-button mdl-button--icon" for="search">
				<i class="material-icons">search</i>
			</label>
			<div class="mdl-textfield__expandable-holder">
				<input class="mdl-textfield__input" type="text" id="search"/>
				<label class="mdl-textfield__label" for="search">Enter your query...</label>
			</div>
		</div>

		<!-- Cart-->
		<div id="cart">
			@if(!Session::has('badge') || Session::get('badge') == 0)
			<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message"  onclick="window.location='{{route('action.cart')}}'">
				mail_outline
			</div>
			@else
			<div class="material-icons mdl-badge mdl-badge--overlap mdl-button--icon message" onclick="window.location='{{route('action.cart')}}'" data-badge="{{Session::get('badge')}}">
				mail_outline
			</div>
			@endif
		</div>
		

		<!-- Account dropdown-->
		<div class="avatar-dropdown" id="icon">
			<span>{{Auth::user()->username}}</span>
			<img src='
			@if(count(Auth::user()->social_accounts))
			{{Auth::user()->avatar}}
			@else
			{{count(Auth::user()->avatar)? asset("images/avatars/" . Auth::user()->avatar) : asset("images/avatars/" . "card.jpg")}}
			@endif'
			>
		</img>
	</div>
	<ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown" for="icon">
		<li class="mdl-list__item mdl-list__item--two-line">
			<span class="mdl-list__item-primary-content">
				<span>{{Auth::user()->username}}</span>
				<span class="mdl-list__item-sub-title">{{Auth::user()->email}}</span>
			</span>
		</li>
		<li class="list__item--border-top"></li>
		<li class="mdl-menu__item mdl-list__item">
			<a href="{{ route('auth/logout') }}">
				<span class="mdl-list__item-primary-content">
					<i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
					Log out
				</span>
			</a>
		</li>
	</ul>

	<button id="more" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">more_vert</i></button>

	<ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp settings-dropdown" for="more">
		<li class="mdl-menu__item">Settings</li>
		<a class="mdl-menu__item" href="">
			Support
		</a>
		<li class="mdl-menu__item">
			F.A.Q.
		</li>
	</ul>
</div>
</header>
@endsection

@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" />
<div style="height: 350px; background-color: rgba(45, 43, 43, 0.48); color: white; width: 80%; margin: auto; margin-top: 40px" class="mdl-grid mdl-shadow--8dp">
	<div class="mdl-cell mdl-cell--6-col">
		<div class="w3-content w3-display-container mdl-shadow--8dp" style="height: 100%">
			@foreach($dish->images as $image)
			<img class="mySlides" src="{{asset('images/catalog/'.$dish->id.'/'.$image->link)}}" style="width: 100%; height: 100%">
			@endforeach
			<img class="mySlides" src="{{asset('images/catalog/15 Ga_tam_mam_nhi.jpg')}}" style="width:100%; height: 100%">
			<img class="mySlides" src="{{asset('images/catalog/16 Lau_ga_tiem_ot_hiem.jpg')}}" style="width:100%; height: 100%">
			<img class="mySlides" src="{{asset('images/catalog/17 Tra_sua_Gong_Cha.jpg')}}" style="width:100%; height: 100%">

			<button class="w3-button w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
			<button class="w3-button w3-display-right" onclick="plusDivs(1)">&#10095;</button>
		</div>
	</div>
	<div class="mdl-cell mdl-cell--6-col mdl-grid" >
		<div class="mdl-cell mdl-cell--12-col" style="height: 60%">
			<h2 style="margin-top: 0px; font-size:35px;">{{$dish->name}}
				<span class="xstar">3.4545</span>
			</h2>

			

			<p style="font-size:16px; white-space: pre-line;line-height: normal;" class="name-hot-restaurant" itemprop="name">{{$dish->mlist->menu->name}}
			</p>
			<p style="color: rgb(102, 102, 153)">$ {{$dish->price}}</p>
			<p style="font-size:12px;"> {{$dish->description}} </p>
		</div>

		<div  class="mdl-cell mdl-cell--2-col">
			<button id="add" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised" value="{{$dish->id}}"> Thêm</button> 
		</div>

		<!-- bought? -->
		<div class='movie_choice'>
			Rate: Raiders of the Lost Ark
			<div id="r1" class="rate_widget">
				<div class="star_1 ratings_stars"></div>
				<div class="star_2 ratings_stars"></div>
				<div class="star_3 ratings_stars"></div>
				<div class="star_4 ratings_stars"></div>
				<div class="star_5 ratings_stars"></div>
				<div class="total_votes">vote data</div>
			</div>
		</div>

		<div class='movie_choice'>
			Rate: The Hunt for Red October
			<div id="r2" class="rate_widget">
				<div class="star_1 ratings_stars"></div>
				<div class="star_2 ratings_stars"></div>
				<div class="star_3 ratings_stars"></div>
				<div class="star_4 ratings_stars"></div>
				<div class="star_5 ratings_stars"></div>
				<div class="total_votes">vote data</div>
			</div>
		</div>
		
	</div>
</div>

<script>
	var slideIndex = 1;
	showDivs(slideIndex);

	function plusDivs(n) {
		showDivs(slideIndex += n);
	}

	function showDivs(n) {
		var i;
		var x = document.getElementsByClassName("mySlides");
		if (n > x.length) {
			slideIndex = 1
		}    
		if (n < 1) {
			slideIndex = x.length
		}
		for (i = 0; i < x.length; i++) {
			x[i].style.display = "none";  
		}
		x[slideIndex-1].style.display = "block";  
	}
</script>
@endsection