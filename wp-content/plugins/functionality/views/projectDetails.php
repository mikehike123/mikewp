<?php


/*
* get Project Details Html from a file
*
*/
function getProjectDetailsHtml($previousLink,$nextLink,$projectTitle,$imgDetailsTitle,$imgDetailsURL,$overView, $techUsed, $liveSiteUrl)
{
$home_uri = get_home_url();

$html = "<div class='row' style=''>
            <div class='col-lg-offset-3 col-lg-6 '>
                <ul class='pager'>
                    {$previousLink}
                    {$nextLink}
                </ul>
                <ul class='pager'>
                    <li><a href='{$home_uri}#a-work'>Back To Home</a></li>
                </ul>
            </div>
        </div>
        <div class='details-card'>

            <h3 class='details-product-title'>{$projectTitle}</h3>
            <div class='container-fliud'>

                <div class='wrapper row'>
                    <div class='preview col-md-offset-1 col-md-3'>
                        <div class='hidden-xs preview-pic tab-content'>
                            <div class='tab-pane active' id='pic-1'>
                                <h4 class='details-price'>{$imgDetailsTitle}</h4>
                                <img width='250px' src='{$imgDetailsURL}'>
                            </div>
                        </div>


                    </div>
                    <div class='details col-md-offset-1 col-md-6'>
                        <h4 class='details-price'>Overview:</h4>
                        <div class='details-product-description'>{$overView}</div>
                        <h4 class='details-price'>Technology Used:</h4>
                        <p class='details-vote'><strong><em>{$techUsed}</em></strong></p>
                        <p>";
    
                        if($liveSiteUrl):
                            $html  .=
                            "<a href='{$liveSiteUrl}' target='_blank' class='whiteButton'>Go To Live Site<span class='glyphicon glyphicon-share-alt'></span></a></p>";
                        endif;  
                   
        $html  .= "</div>
                </div>
            </div>
        </div>";
    return $html;
    }
    
                            