<h1>{@name}</h1>

<?php $gallery_id="{@gallery_id}"; ?>
<?php echo nggShowGallery({@gallery_id},$template = 'carousel', null) ?>
<?php 
		$vtour= "{@virtual_tour}";
		$floorplan= "{@floorplan}";
		$line3="";
		if ($vtour !="") {
			$line3 .= "<div><a href=\"$vtour\" title=\"Take a virtual tour of {@name}\" target=\"_blank\">Take a Virtual Tour</a></div>" ; }
		if ($floorplan !="") {
			$line3 .= "<div><a href=\"$floorplan\" title=\"Floorplan of {@name}\">See Floor Plan</a></div>"; }
		$line3 .= "<div><a href=\"/contact\" title=\"Remember to mention this property in your message\">Contact Us to View</a></div>";
		?>
		<div class="vt-box">
		<div class="vtdata">
		<?php if ($line3) echo "<div class='vtour-line'>$line3</div>"; ?>
		</div>
		</div>
<div class="page-blurb">{@blurb}</div>

    <div class="page-propdata-box">
        <?php 
           $line1="";
           $bedrooms="{@bedrooms}";
           if ($bedrooms != "") { $line1 .= "<div>$bedrooms Bedrooms</div>"; }
        ?>
        <?php
            $bathrooms="{@full_baths}";
            $halfbaths="{@half_baths}";
            if ($bathrooms != "") {$line1 .= "<div>$bathrooms Full ";
            if ($halfbaths != "") $line1 .= "&amp; $halfbaths Half ";
			$line1 .= " Baths</div>";  }
        ?>
        <?php $gar_spaces="{@garage_spaces}";
        if ($gar_spaces !="") {$line1 .= "<div>$gar_spaces Garage Spaces</div>";} ?>
		<?php $sqft_living="{@sqft_living}";
			  $sqft_total="{@sqft_total}";
			  $acres="{@acres}";
			  $line2="";
		if ($sqft_living !="") { 
		$line2 .= "<div>$sqft_living Sq/Ft Under Air</div>"; }
		if ($sqft_total !="") { 
		$line2 .= "<div>$sqft_total Sq/Ft Total</div>"; }
		if ($acres !="") { 
		$line2 .= "<div>$acres Acres</div>"; }
		?>
		
	<?php if ($line1 || $line2){ ?>
	 	<div class='propdata'>
    		<?php if ($line1) echo "<div class='propdata-line'>$line1</div>"; ?>
			<?php if ($line2) echo "<div class='propdata-line'>$line2</div>"; ?>
			<h3>{@status}<?php 
           $list_price="{@list_price}";
           if ($list_price != "") { ?>
           - Offered at ${@list_price} <?php } ?></h3>
           
		</div> <!--ends propdata div -->
	<?php } ?>

</div><!-- close page-propdata-box -->

<?php $desc="{@description}";
		if ($desc != "") { ?>
<div class="page-propdata-box">
<div class='desc-data'>
	 <?php echo "<div>Description</div><div>$desc</div>"; ?>
</div>
</div>
<?php } 

else echo "<p align=\"center\"><a href=\"/contact\">Contact us today to schedule a showing!</a></p>"; ?>

<?php $lat="{@lat}";
		$long="{@long}";
		if (($lat != "") && ($long != "")) { ?>
<div id="map">
   <h2>Location Map</h2>
  <?php echo do_shortcode('[SGM lat="{@lat}" lng="{@long}" directionsto="{@address}, {@city}, {@state} {@zip}" content="<b>{@address}</b><br>{@city},{@state} {@zip}<br>For directions enter your address below."]') ; ?> 
</div>
<?php } 
else echo "<p align=\"center\">Map not available for this location.</p>"
?>