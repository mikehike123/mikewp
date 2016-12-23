<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Mike&#39;s Bikes</title>
        
        
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/magnify/magnific-popup.css"></link>

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/magnify/jquery.magnific-popup.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous" />

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous" />

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <?php wp_head(); ?>

    </head>

    <body data-spy="scroll" data-target=".navbar" data-offset="0">
        <nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#top">Mike&#39;s Bikes</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav">
                        <li class="active"><a href="#home" class="hidden-xs">Home</a></li>
                        <li><a href="#home" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Home</a></li>

                        <li><a href="#about" class="hidden-xs">About</a></li>
                        <li><a href="#about" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">About</a></li>


                        <li><a href="#roadBikes" class="hidden-xs">Road Bikes</a></li>
                        <li><a href="#roadBikes" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Road Bikes</a></li>

                        <li><a href="#mountainBikes" class="hidden-xs">Mountain Bikes</a></li>
                        <li><a href="#mountainBikes" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Mountain Bikes</a></li>


                        <li><a href="#contact" class="hidden-xs">Contact</a></li>
                        <li><a href="#contact" class="visible-xs" data-toggle="collapse" data-target=".navbar-collapse">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
