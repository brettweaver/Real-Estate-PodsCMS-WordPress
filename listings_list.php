<div class="prop-box-avail">
	<div class="prop-thumb">
            <?php echo listings_showfirstpic('{@gallery_id}'); ?>
    </div>
    	<h2><a href="{@detail_url}">{@name}</a></h2>
        <h3>{@status}
        <?php 
           $list_price="{@list_price}";
           if ($list_price != "") { ?>
           - Offered at ${@list_price} <?php } ?></h3>
        <div>{@blurb}</div>
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
	<?php if ($line1 || $line2) { ?>
	 	<div class='propdata'>
    		<?php if ($line1) echo "<div class='propdata-line'>$line1</div>"; ?>
			<?php if ($line2) echo "<div class='propdata-line'>$line2</div>"; ?>
		</div> <!--ends propdata div -->
	<?php } ?>
</div> <!-- ends prop-box-avail -->