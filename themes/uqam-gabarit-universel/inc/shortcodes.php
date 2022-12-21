<?php
/**
* SHORTCODE POUR AJOUTER DES IFRAMES
**/
function iframeSC($att, $content) {
	if (!$att['width']) { $att['width'] = 900; }
	if (!$att['height']) { $att['height'] = 500; }
	if (!$att['frameborder']) {$att['frameborder'] = 0;}
	if (!$att['class']) {$att['class'] = '';}
	if (!$att['allowfullscreen']) {$att['allowfullscreen'] = 'allowfullscreen';}

	if($att['src']){
		return '<iframe border="0" class="shortcode_iframe ' . $att['class'] . '" src="' . $att['src'] . '" width="' . $att['width'] . '" height="' . $att['height'] . '" frameborder="'.$att['frameborder'].'" '.$att['allowfullscreen'].'  loading="lazy"></iframe>';
	}
}
add_shortcode('iframe', 'iframeSC');