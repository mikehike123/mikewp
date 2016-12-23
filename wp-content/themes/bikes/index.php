<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Bikes
 * @since Bikes 1.0
 */
get_header ();
?>


<a class="anchor" id="home" >TOP</a>
<div class="container">
	<div class="jumbotron">
		<h1>Mike&#39;s Affordable Used Bikes</h1>
		<p>I sell quality used bike&#39;s for often less than what you&#39;d pay for a
			new junky department store bike.</p>
	</div>
	<div id="imgMenuContainer">
		<div class="imgMenu row">
			<div class="col-md-6">
				<a href="#roadBikes"><div class="moduleRoad opp">
					<h2>Road Bikes</h2>
					<img src='<?=get_theme_root_uri()?>/bikes/blueroadbike-400x300.jpg' />
				</div></a>
			</div> 
			<div class="col-md-6">
				<a href="#mountainBikes"><div class="moduleMountain opp">
					<h2>Mountain Bikes</h2>
					<img src='<?=get_theme_root_uri()?>/bikes/mountainbikes-1.jpg' />
				</div></a>
			</div>
		</div>
	</div>
	<a class="anchor" id="about">About</a>
	<div class="row">
        <h2>About</h2>
		<div class="col-xs-12">
			<p>I have a love for vintage bikes from the 70s, 80s and 90s. The
				bikes I&#39;m currently riding the most are a Schwinn Varsity from the
				late 60s and a Raleigh Rocky II mountain bike from the 80s.</p>
			<p>A lot of the bikes I sell are bike&#39;s that I also ride. I’ll
				buy the bike; usually from a non profit; fix it; list it on CL and
				ride it while I’m waiting for a buyer. The two bike&#39;s I
				mentioned above are bike&#39;s which I had first intended on selling
				but no buyers were interested and I eventually fell in love with
				their ride and decided to keep them.</p>
		</div>
	</div>

	<div class="row">
		<a id="roadBikes" class="anchor" style="position:relative;">Road Bikes</a>
		<h2>Road Bikes</h2>

				<?php
				
				showProductsByCategory ( 'roadbikes' );
				?>
	</div>
	<div class="row">
		<a id="mountainBikes" class="anchor">Mountain Bikes</a>
		<h2>Mountain Bikes</h2>

				<?php
				
				showProductsByCategory ( 'mountainbikes' );
				?>
	</div>
    <a class="anchor" id="contact" class="anchor" style="position:relative;top:-70px;"></a>
	<div class="row" style="min-height: 500px;">
		
		<div class="">
			<h2>Contact Me</h2>
			<form role="form" id="contact-form" class="contact-form" action="">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" name="Name"
								autocomplete="off" id="Name" placeholder="Name">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="email" class="form-control" name="email"
								autocomplete="off" id="email" placeholder="E-mail">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<textarea class="form-control textarea" rows="3" name="Message"
								id="Message" placeholder="Message" cols=""></textarea>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<span id="EmailSent" class="pull-left" style="color:blue;">Thank you! Email has been sent.</span>
						<button type="submit" class="btn main-btn pull-right">Send a
							message</button>
					</div>
				</div>
				
			</form>
		</div>
	</div>

</div>


<script type="text/javascript">
	$('#contact-form').bootstrapValidator({
	//        live: 'disabled',
			message: 'This value is not valid',
			feedbackIcons: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				Name: {
					validators: {
						notEmpty: {
							message: 'The Name is required and cannot be empty'
						}
					}
				},
				email: {
					validators: {
						notEmpty: {
							message: 'The email address is required'
						},
						emailAddress: {
							message: 'The email address is not valid'
						}
					}
				},
				Message: {
					validators: {
						notEmpty: {
							message: 'The Message is required and cannot be empty'
						}
					}
				}
			}
		});

		$('.gallery').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
				  enabled:true
				}
			});
		});

		$( ".profile" ).click(function() {
			$(this).closest(".gallery").magnificPopup('open');
		});
		
		$(".nav a").on("click", function(){
			$(".nav").find(".active").removeClass("active");
			$(this).parent().addClass("active");
		});
	/*	
		$(window).scroll(function(){
		var scrollTop = $(document).scrollTop();
		var anchors = $('body').find('.anchor');
		
		isActiveSet = false;

		for (var i = anchors.length-1;  i> -1 ; i--){
			//- 50 && scrollTop < $(anchors[i]).offset().top + $(anchors[i]).height() - 50)
			 
			if (scrollTop > $(anchors[i]).offset().top -20 && !isActiveSet)  {
				//alert('nav ul li a[href="#' + $(anchors[i]).attr('id') + '"]');
				
				isActiveSet = true
				$('nav ul li').has('a[href="#' + $(anchors[i]).attr('id') + '"]').addClass('active');
			} else {
				//alert('nav ul li a[href="#' + $(anchors[i]).attr('id') + '"]');
				$('nav ul li').has('a[href="#' + $(anchors[i]).attr('id') + '"]').removeClass('active');
				//$('nav ul li a[href="#' + $(anchors[i]).attr('id') + '"]').removeClass('active');
			}
		}
		});
        
        */
		
		//handle contact form;
		$("#EmailSent").hide();
		$('#contact-form').submit(function(event) {
			
			event.preventDefault();
			
			// send email to client before moving onto worldpay payment form
			var data = {
			    action: 'mail_before_submit',
			    toemail: $('#email').val(), // change this to the email field on your form
			    message: $('#Message').val(),
			    _ajax_nonce: $('#my_email_ajax_nonce').data('nonce'),
			};
			//window.location.origin +
			$.post( "/bikes/wp-admin/admin-ajax.php", data, function(response) {
				$("#EmailSent").show();
				//$('#contact-form').trigger('reset');
				$("#contact-form").bootstrapValidator('resetForm', true);
			    console.log('Got this from the server: ' + response);
			});

			});
		$('.form-control').focus(function(event) {
			$("#EmailSent").hide();
		});
</script>

<footer class="footer " style="background-color: black; color: white; padding-top:15px; ">
<span id="my_email_ajax_nonce" data-nonce="<?php echo wp_create_nonce( 'my_email_ajax_nonce' ); ?>"></span>	
	<section class="container">
		<div class="col-md-4">
			<p>&copy;2016 Copyright Mike's Bikes </p>
		</div>
		<div class="col-md-6">
			<p>Contact Mike<span style="margin-left:5px;" ><a href='mailto:mikeclark@mossycity.com'><i class="glyphicon glyphicon-envelope"></i></a></span></p>
		</div>
	</section>
</footer>
<?php wp_footer(); ?>
</html>

