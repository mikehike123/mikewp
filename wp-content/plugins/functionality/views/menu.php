<?php
    global $post;
    $post_slug=$post->post_name;
    if($post_slug!="home")
    {
        $site_url=site_url()."/";
    }

$html = "<div id='topHeader' class='' style='z-index: 1000; width: 100%;'><nav class='navbar navbar-default' style='width: 100%; height: 44px;'>
<div class='container-fluid' style='width: 100%;'>
<div id='navbar-brand'></div>
<div class='navbar-header'>

<button class='navbar-toggle collapsed' type='button' data-toggle='collapse' data-target='#myNavbar'>
<span class='icon-bar'> </span>
<span class='icon-bar'> </span>
<span class='icon-bar'> </span>
</button>
</div>
<div id='myNavbar' class='collapse navbar-collapse '>
<ul class='nav navbar-nav navbar-right'>";
    $html .= ($active=='whoAmI'?"<li class='active'>":"<li class=''>");
 	$html .= "<a class='page-scroll' href='{$site_url}#a-whoAmI'>Who Am I</a></li>";
    $html .= ($active=='portfolio'?"<li class='active'>":"<li class=''>");
 	$html .= "<a class='page-scroll' href='{$site_url}#a-portfolio'>Portfolio</a></li>";
 	$html .= "<li class=''><a class='page-scroll' href='{$site_url}#a-competencies'>Competencies</a></li>";
    $html .= ($active=='resume'?"<li class='active'>":"<li class=''>");
    $html .= "<a class='page-scroll' href='/resume'>Resume</a></li>";

    $html .= "<li><a class='page-scroll' href='{$site_url}#a-contact'>Contact Me</a></li>
</ul>
</div>
</div>
</nav></div>";