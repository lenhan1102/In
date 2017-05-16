@extends('master')

@section('title')
{{$dish->name}}
@endsection

@section('script')
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
        		data: { voted : voted, dish_id: {{$dish->id}}},
        		success:function(data){
        			console.log(data);
        			set_votes(widget, data);
        		},
        		error:function(){ 
        			alert("error!!!!");
        		}
        	});
        });
        set_votes($(".rate_widget"), {{$dish->rating}});
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
@endsection

@section('content')
<meta name="csrf_token" content="{{ csrf_token() }}" />
<div style="height: 350px; background-color: white; border-color: rgba(45, 43, 43, 0.48); color: black; width: 80%; margin: auto; margin-top: 40px" class="mdl-grid mdl-shadow--8dp">
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
		<div class="mdl-cell mdl-cell--12-col">
			<h2 style="margin-top: 0px; font-size:35px;">{{$dish->name}}
				<span class="xstar">{{$dish->rating? $dish->rating : 0}}</span>
				
			</h2>
			
			<p style="font-size:16px; white-space: pre-line;line-height: normal;" itemprop="name">{{$dish->menu->name}}
			</p>
			<p style="color: rgb(102, 102, 153)">$   {{' '. $dish->price}} - Được mua: {{' '.$dish->ordered.' '}} lần</p>
			<p style="font-size:12px;"> {{$dish->description}} </p>
		</div>

		<div  class="mdl-cell mdl-cell--2-col">
			<button id="add" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored" value="{{$dish->id}}"> Thêm </button> 
		</div>

		@can('vote', $dish)
		<div  class="mdl-cell mdl-cell--10-col">
			<div class='movie_choice'>
				<div id="r1" class="rate_widget">
					<div class="star_1 ratings_stars"></div>
					<div class="star_2 ratings_stars"></div>
					<div class="star_3 ratings_stars"></div>
					<div class="star_4 ratings_stars"></div>
					<div class="star_5 ratings_stars"></div>
				</div>
			</div>
		</div>
		@endcan
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