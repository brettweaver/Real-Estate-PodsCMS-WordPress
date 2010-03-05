<!-- list of active (for sale or for rent listings -->
<h1>Listings</h1>
<?php
	$ForSale = new Pod('listings');
	$status_forsale  = "(status = 'For Sale' || status = 'For Rent')";
	$ForSale->findRecords('name ASC', 10, $status_forsale);
	$total_forsale = $ForSale->getTotalRows();
	if( $total_forsale>0 ) { 
?>
	<div id="activelistings">
	<h2>Active Listings</h2>
<?php echo $ForSale->showTemplate('listings_list'); ?>
	</div> <!-- ends div id activelistings-->
	<?php } ?>

<!-- list of pending (pending sale or pending lease listings -->
<?php
	$PendingSale = new Pod('listings');
	$status_pending  = "(status = 'Sale Pending' || status = 'Lease Pending')";
	$PendingSale->findRecords('name ASC', 10, $status_pending);
	$total_pending = $PendingSale->getTotalRows();
	if( $total_pending>0 ) { 
?>
	<div id="pendingsales">
	<h2>Pending Listings</h2>
<?php echo $PendingSale->showTemplate('pending_list'); ?>
	</div> <!-- ends div id pendingsales -->
	<?php } ?>

<!-- list of sold (sold or leased listings -->

<?php
	$SoldListing = new Pod('listings');
	$status_sold  = "(status = 'Sold' || status = 'Rented')";
	$SoldListing->findRecords('name ASC', 10, $status_sold);
	$total_sold = $SoldListing->getTotalRows();
	if( $total_sold>0 ) { 
?>
  <div id="soldlistings">
  <h2>Sold or Leased</h2>
  <?php echo $SoldListing->showTemplate('sold_list'); ?>
  </div><!-- ends div id soldlistings -->
  <?php } ?>
	
