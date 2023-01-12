<link rel="stylesheet" href="__inc/note/bootstrap/css/bootstrap.min.css" type="text/css">
<script type="text/javascript" src="__inc/note/jquery/jquery-1.10.1.min.js"></script>
<style>
    .star { display: inline-block; background: url("__inc/note/design/star.png") no-repeat; width: 25px; height: 25px; }
    .star_hover { display: inline-block; background: url("__inc/note/design/star.png") no-repeat; background-position: 0 -25px; width: 25px; height: 25px; }
</style>

<?php
function starBar($numStar, $mediaId, $starWidth) {
    global $bdd;
    $cookie_name = 'tcRatingSystem2'.$mediaId;
    $nbrPixelsInDiv = $numStar * $starWidth; // Calculate the DIV width in pixel

    // Rate average and number of rate from the database
    $query = $bdd->getOne('SELECT round(avg(rate), 2) AS average, count(rate) AS nbrRate FROM notation WHERE media='.$mediaId.'');

    //num of pixel to colorize (in yellow)
    $numEnlightedPX = round($nbrPixelsInDiv * $query['average'] / $numStar, 0);

    $getJSON = array('numStar' => $numStar, 'mediaId' => $mediaId); // We create a JSON with the number of stars and the media ID
    $getJSON = json_encode($getJSON);

    $starBar = '<div id="'.$mediaId.'">';
    $starBar .= '<div class="star_bar" style="width:'.$nbrPixelsInDiv.'px; height:'.$starWidth.'px; background: linear-gradient(to right, #FF0000 0px, #FF0000 '.$numEnlightedPX.'px,#ccc '.$numEnlightedPX.'px,#ccc '.$nbrPixelsInDiv.'px);" rel='.$getJSON.'>';
    for ($i=1; $i<=$numStar; $i++) {
        $starBar .= '<div title="'.$i.'/'.$numStar.'" id="'.$i.'" class="star"';
        if( !isset($_COOKIE[$cookie_name]) ) $starBar .= ' onmouseover="overStar('.$mediaId.', '.$i.', '.$numStar.'); return false;" onmouseout="outStar('.$mediaId.', '.$i.', '.$numStar.'); return false;" onclick="rateMedia('.$mediaId.', '.$i.', '.$numStar.', '.$starWidth.'); return false;"';
        $starBar .= '></div>';
    }
    $starBar .= '</div>';
    $starBar .= '<div class="resultMedia'.$mediaId.'" style="font-size: small; color: grey">'; // We show the rate score and number of rates
    if ($query['nbrRate'] == 0) $starBar .= 'Not rated yet';
    else $starBar .= '
        <div itemprop="itemReviewed" itemscope itemtype="https://schema.org/Product">
            <span itemprop="name">Entraxe Jante Alu</span>
            <span itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
            <br>Note : ' . '
                <span itemprop="ratingValue">' . $query['average'] . '</span>' . '/' . '<span itemprop="bestRating">' . $numStar . '</span>' . ' (' . '<span itemprop="ratingCount"><span itemprop="reviewCount">' . $query['nbrRate'] . '</span></span><span itemprop="worstRating" content="1"></span>' . ' votes)' . '
            </span>
        </div>';
    $starBar .= '</div>';
    $starBar .= '<div class="box'.$mediaId.'"></div>';
    $starBar .= '</div>';
    return $starBar;
}

?>
<script type="text/javascript" src="__inc/note/js/precise-star-rating.js"></script>
