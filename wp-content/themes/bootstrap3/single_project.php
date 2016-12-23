<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mike Clark - Web Developer</title>
    <meta charset="utf-8" />
    <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property='og:title' content=''>
    <meta property='og:description' content='' />
    <meta property='og:url' content='' />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Relentless Recruiting LLC</title>
    <link rel="icon" href="">


    <!--
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans|Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Theme CSS 
    <link href="css/creative.css?version=1" rel="stylesheet" />
    -->
    <?php wp_head(); ?>

</head>


<body data-spy="scroll" data-target=".navbar">
    
    <?php
    
        echo do_shortcode("[mdc_menu active='portfolio' ]");
        echo do_shortcode("[mdc_proj_details]");
        echo do_shortcode("[insert page='footer' display='content']");
    ?>
   
    <?php wp_footer(); ?>
    
    <script>
        var $ = jQuery;
        // Closes the Responsive Menu on Menu Item Click
        $('.navbar-collapse ul li a').click(function() {
            $('.navbar-toggle:visible').click();
        });

        $(document).ready(function() {

            var sticky = new Waypoint.Sticky({
                element: $('#topHeader')[0]
            })
        });
         
    </script>
    <script>jQuery('p:empty').remove();</script>
</body>

</html>