<?php 

//next gen gallery interface functions 

function listings_showfirstpic($galleryid,$class = '') {
	// inserts IMG tag for thumbnail
	return nextgengallery_showfirstpic($galleryid,$class);
}


function nextgengallery_showfirstpic($galleryid, $class = '') {
	global $wpdb;
	global $ngg_options;
	if (!$galleryid) return;

	if (!$wpdb->nggallery) return;

	if (! $ngg_options) {
		$ngg_options = get_option('ngg_options');
	}

	$picturelist = $wpdb->get_results("SELECT t.*, tt.* FROM $wpdb->nggallery AS t INNER JOIN $wpdb->nggpictures AS tt ON t.gid = tt.galleryid WHERE t.gid = '$galleryid' AND tt.exclude != 1 ORDER BY tt.$ngg_options[galSort] $ngg_options[galSortDir] LIMIT 1");
	if ($class) $myclass = ' class="'.$class.'" ';
	if ($picturelist) { 
		$pid = $picturelist[0]->pid;
		if (is_callable(array('nggGallery','get_thumbnail_url'))) {
			// new NextGen 1.0+
			$out = '<img alt="' . __('property photo') . '" src="' . nggGallery::get_thumbnail_url($pid) . '" ' . $myclass . ' />';
		} else {
			// backwards compatibility - NextGen below 1.0
			$out = '<img alt="' . __('property photo') . '" src="' . nggallery::get_thumbnail_url($pid) . '" ' . $myclass . ' />';
		}
		return $out;
	}
}

?>