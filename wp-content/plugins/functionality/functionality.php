<?php

/**
 * Makes it easy to create and edit your own functionality plugin
 * for pasting snippets instead of in the theme's functions.php
 *
 * To minimize confusion, throughout this file when I refer to
 * 'functionality plugin', I mean the functions.php file that is
 * created by this plugin in the WordPress plugins folder.
 * When I refer to 'this plugin', I'm talking about the plugin
 * whose code you're currently looking at.
 *
 * @version   1.2.0
 * @author    Mike Clark <mikeclark@mossycity.com>
 * @copyright Copyright (c) 2013-2016, Mike Clark
 * @license   https://opensource.org/licenses/MIT
 */

/*
Plugin Name: mdc_functionality
Plugin URI: https://github.com/sheabunge/functionality
Description: Some basic functionality for  http://mikeclark.mossycity.com
Author: Mike Clark
Author URI: https://mikeclark.mossycity.com
Version: 1.2.0
License: MIT
License URI: https://opensource.org/licenses/MIT
Text Domain: functionality
Domain Path: /languages

*/

/*
* Use different template for project post type
*/
add_filter( 'single_template', 'wpsites_single_post_type_template' );
function wpsites_single_post_type_template($single_template) {
     global $post;
     
     if ($post->post_type == 'projects' )  {
          $single_template = get_stylesheet_directory() . '/single_project.php';
     }
    
     return $single_template;
     wp_reset_postdata();
}

// if you want only logged in users to access this function use this hook
add_action('wp_ajax_mail_before_submit', 'mycustomtheme_send_mail_before_submit');

// if you want none logged in users to access this function use this hook
add_action('wp_ajax_nopriv_mail_before_submit', 'mycustomtheme_send_mail_before_submit');

// if you want both logged in and anonymous users to get the emails, use both hooks above


    

function mycustomtheme_send_mail_before_submit(){
	check_ajax_referer('my_email_ajax_nonce');
	if ( isset($_POST['action']) && $_POST['action'] == "mail_before_submit" ){

		$title   = 'Web Development Request';
        $from = "From: <a href='mailto:{$_POST['email_address']}'>{$_POST['Name']}</a>";
        //$from = 'From: '.$_POST['Name'].' <'.$_POST['email_address'].'>';
        //$headers = array('From: '.$_POST['Name'].' <'.$_POST['email_address'].'>');
        $message = "<div>{$_POST['message']}</div>
                    <div><p>{$from}</p></div>";

        //Send the email to mikeclark@mossycity.com
        add_filter('wp_mail_content_type', create_function('', 'return "text/html"; '));
        $email = wp_mail('mikeclark@mossycity.com', $title, $message);
        if(!$email)
        {
            echo "<h1>error<h1>";
            return false;
        }
        
        //Send thank you email
        $message = "<p>Thanks for contacting me!  I will get back to you soon.</p>
                    <div class='col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-0'>
                        <hgroup>
                            <h2>Mike Clark</h2>
                            <ul>
                                <li style='margin-bottom:10px;'>
                                <a href='mikeclark@mossycity.com'>mikeclark@mossycity.com</a>
                                </li>
                                <li style='margin-bottom:10px;'><a href='https://www.linkedin.com/in/michael-clark-webdeveloper' target='_blank'>Linkedin <i class='fa fa-linkedin-square' aria-hidden='true'></i> </a></li>
                            </ul>
                        </hgroup>
                    </div>";
        
        $headers = array('From: Mike Clark<mikeclark@mossycity.com>');
        $email = wp_mail($_POST['email_address'], "Thankyou for contacting mikeclark@mossycity.com", $message, $headers);
        
        if(!$email)
        {
           echo "<h1>error<h1>";
            return false;
        }
        
        remove_filter('wp_mail_content_type', 'set_html_content_type');

        return true;
	}
	echo "<h1>error<h1>";;
	return false;
}

function mycustomtheme_send_mail_before_submit_backup(){
	check_ajax_referer('my_email_ajax_nonce');
	if ( isset($_POST['action']) && $_POST['action'] == "mail_before_submit" ){

		//send email  wp_mail( $to, $subject, $message, $headers, $attachments ); ex:
		wp_mail($_POST['toemail'],'Web Development Request',$_POST['message']);
		echo 'email sent';
		die();
	}
	echo 'error';
	die();
}


/* get section title */
/* atts 'menu_link' => 'a-whoAmI'
/*      'title' => 'Who I am'
*/
function get_section_title($atts)
{
    $atts = shortcode_atts( array(
		'menu_link' => '',
        'title' => '',
	), $atts, 'mdc_section_title' );
    
    $menu_link = $atts['menu_link'];
    
    $title = $atts['title'];
    
    $html = "<a class='anchor' id='{$menu_link}'></a>
    <section>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-12 whoIam'>
                        <div class='sectionTitle'>{$title}</div>
                    </div>
                </div>
            </div>
    </section>";
    return $html;
}
add_shortcode( 'mdc_section_title', 'get_section_title');

/* get menu */
function get_mdc_menu($atts)
{
    $atts = shortcode_atts( array(
		'active' => 'whoAmI',
	), $atts, 'mdc_menu' );
    
    $active = $atts['active'];
    
    require_once dirname( __FILE__ ) . '/views/menu.php';
    return $html;
}
add_shortcode( 'mdc_menu', 'get_mdc_menu');

/* get skill graph */
function get_skills()
{
    
    wp_enqueue_script( 'mdc_skills_js' );
    return file_get_contents(dirname( __FILE__ ) .'/views/competencies.php',true);
}
add_shortcode( 'mdc_skills', 'get_skills');

/* get contact form */
function get_contact_form()
{
    
    wp_enqueue_script( 'mdc_contact_js' );
    return file_get_contents(dirname( __FILE__ ) .'/views/contactform.php',true);
}
add_shortcode( 'mdc_contact_form', 'get_contact_form');

require_once dirname( __FILE__ ) . "/views/projectDetails.php";


/* get project details */
function get_projects_details($atts)
{
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    //$my_posts = get_posts($args);
    //var_dump($args);
    $postID = get_the_ID();
    
    $titles="";
    
    //$posts = query_posts($args);
    
    //var_dump($posts);
        
    $imgDetailsTitle = get_post_meta( $postID, 'project-detail-photo-title', true );
    $imgDetailsID = get_post_meta( $postID, 'project-details-photo', true );
    $overView = get_post_meta( $postID, 'project-overview', true );
    $techUsed = get_post_meta( $postID, 'technologies-used', true );
    $liveSiteUrl = get_post_meta( $postID, 'live-site-url', true );
    if(!$imgDetailsID)
    {
        return;
    }
    $imgDetailsURL = wp_get_attachment_url($imgDetailsID);

    $prev_post = get_previous_post();

    $previousLink = "";
    if($prev_post)
    {
        $previousURL = get_permalink( $prev_post->ID );
        $previousLink = "<li><a href='{$previousURL}'>❮ Previous Project</a></li>";
    }

    $next_post = get_next_post();
    $nextLink="";
    if($next_post)
    {
        $nextURL = get_permalink( $next_post->ID );
        $nextLink = "<li><a href='{$nextURL}'>Next Project  ❯</a></li>";
    }

    $html = getProjectDetailsHtml($previousLink,$nextLink,$my_posts[0]->post_title, $imgDetailsTitle,$imgDetailsURL,$overView, $techUsed, $liveSiteUrl);
    wp_reset_postdata();
    wp_reset_query();
    return $html;
}
add_shortcode( 'mdc_proj_details', 'get_projects_details' );


/* get project title and photos for grid */
function get_projects_grid($args)
{
    //global $post;
    $args = array(
    'post_type'=> 'projects',
    'order'    => 'ASC'
    );     
    
    $titles="";
    
    $posts = query_posts($args);
    $html = '<a id="a-work"></a><section class="portfolio">
            <div class="container">
            <div class="container" style="margin-top:10px;">';
    //var_dump($posts);
    foreach($posts as $post)
    {
        
        $attachment_id = get_post_meta( $post->ID, 'project_photo', true );
        
        
        if(!$attachment_id)
            continue;
        $post_uri = get_permalink($post);
        $img_url = wp_get_attachment_url($attachment_id);
        $html.="<div class='col-xs-12 col-md-4' style='hieght:300px;'>
                        <a href='{$post_uri}'>
                            <div class='panel panel-default'>
                                <div class='panel-image hide-panel-body'>
                                    <img src='{$img_url}'  class='panel-image-preview' />
                                </div>

                                <div class='panel-footer text-center'>
                                    <h4>{$post->post_title}</h4> See More<span class='glyphicon glyphicon-share-alt'></span>
                                </div>
                            </div>
                        </a>
                    </div>";    
    }
    $html.="</div></div></div></section>";
    wp_reset_postdata();
    wp_reset_query();
    return $html;
}
add_shortcode( 'mdc_proj_grid', 'get_projects_grid' );

function get_work_histories()
{
    //work_history_group
    //global $post;
    $args = array(
    'post_type'=> 'work_histories',
    'meta_key'    => 'start-date',
    'orderby'    => 'meta_value',
    'order'       => 'DESC',
    'posts_per_page'=>-1,
    );
    
    $posts = query_posts($args);
    $html = '<a id="a-employment"></a><section class="">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="subTitle">Employment History</div>
                            <ul class="job">';
   //var_dump($posts);
    foreach($posts as $post)
    {
        $html.="<li>";
        //var_dump($posts);
        $data = get_post_meta( $post->ID, 'work_history_group', true );
        //var_dump($data);
        if(!$data)
            continue;

        $history = $data[0]; 
        if($history)
        {
            (!$history['job-title']?null:$html.="<div><strong>{$history['job-title']}</strong></div>");
            
            (!$history['employer']?null:$html.="<div><strong>{$history['employer']}</strong></div>");
            
            (!$history['employer-line2']?null:$html.="<div><strong>{$history['employer-line2']}</strong></div>");
            
            (!$history['technical-environment']?null:$html.="<div class='techEnviro'><strong>Technical Environment: </strong>{$history['technical-environment']}</div>");
        }

        //work_task_group
        $html.="<ul class='responsible'>";
        $tasks = get_post_meta( $post->ID, 'work_task_group', true ); 
        if($tasks)
        {
            foreach( $tasks as $task){
                $html.="<li>{$task["task"]}</li>";
            }
        }
        $html.="</ul>";
        $html.="</li>";

    }
    
    $html.='</ul></div></div></div></section>';   
    wp_reset_postdata();
    wp_reset_query();
    return $html;
}
add_shortcode( 'mdc_work_histories', 'get_work_histories' );

// get achievements
// not currently used
function get_achievments()
{
    //global $post;
    $args = array(
    'post_type'=> 'projects',
    'order'    => 'ASC'
    );     
    
    $titles="";
    
    $posts = query_posts($args);
    $html = '<div>';
            
    foreach($posts as $post)
    {
        $html.="<ul>";
        $achievements = get_post_meta( $post->ID, 'project_achievements', true ); 
        if($achievements)
        {
            foreach( $achievements as $achievement){
                $html.="<li>".$achievement["achievement"] . '</li>';
            }
        }
        $html.="</ul>";
    }
    $html .= '</div>';
    return $html;
}
add_shortcode( 'proj_achievements', 'get_achievments' );

/* used to create parent child relationships */
/*
function my_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'posts_to_pages',
        'from' => 'post',
        'to' => 'page'
    ) );
    return;
}
*/
// add_action( 'p2p_init', 'my_connection_types' );




/**
 * Enable autoloading of plugin classes
 * @param $class_name
 */
function functionality_autoload( $class_name ) {

	/* Only autoload classes from this plugin */
	if ( 'Functionality' !== substr( $class_name, 0, 13 ) ) {
		return;
	}

	/* Remove namespace from class name */
	$class_file = str_replace( 'Functionality_', '', $class_name );

	/* Convert class name format to file name format */
	$class_file = strtolower( $class_file );
	$class_file = str_replace( '_', '-', $class_file );


	/* Load the class */
	require_once dirname( __FILE__ ) . "/php/class-{$class_file}.php";
}

spl_autoload_register( 'functionality_autoload' );


/**
 * Create an instance of the class
 *
 * @since 1.0
 * @uses apply_filters() to allow changing of the filename without hacking
 * @return Functionality_Controller
 */
function functionality() {
	static $controller;

	if ( ! isset( $controller ) ) {
		$controller = new Functionality_Controller();
	}

	return $controller;
}

/**
 * Load site scripts.
 */
function bootstrap_theme_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	// jQuery.
	wp_enqueue_script( 'jquery' );

	// Bootstrap
	//wp_enqueue_script( 'bootstrap-script', $template_url . '/js/bootstrap.min.js', array( 'jquery' ), null, true );
    
    wp_enqueue_script( 'waypoints-script', $template_url . '/js/waypoints/lib/jquery.waypoints.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'sticky-script', $template_url . '/js/waypoints/lib/shortcuts/sticky.min.js', array( 'waypoints-script' ), null, true );
    wp_enqueue_script( 'inview-script', $template_url . '/js/waypoints/lib/shortcuts/inview.min.js', array( 'waypoints-script' ), null, true );
    
    
    wp_enqueue_script( 'bootstrap-script', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ), null, true );

	//wp_enqueue_style( 'bootstrap-style', $template_url . '/css/bootstrap.min.css' );
    
    wp_enqueue_style('bootstrap-style','https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    
    wp_enqueue_style( 'mdc-style', $template_url . '/css/my.css' );

	//Main Style
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

	// Load Thread comments WordPress script.
	if ( is_singular() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
    
    wp_register_script( 'mdc_skills_js',plugins_url('js/mdc_skill.js', __FILE__), array('jquery') );
    wp_register_script( 'mdc_contact_js',plugins_url('js/send_mail.js', __FILE__), array('jquery') );
   
    
}

add_action( 'wp_enqueue_scripts', 'bootstrap_theme_enqueue_scripts', 1 );

functionality()->run();




