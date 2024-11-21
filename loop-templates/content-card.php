<div class="card-wrapper <?php echo $card_columns; ?>">
  <div class="card">
	<div class="card-image"><div class="background" style="background-image:url('<?php echo $image; ?>');"></div></div> 
    <div class="card-body">
	  <p class="card-tooltip"><?php echo $card_tooltip; ?></p>
      <h3 class="card-title"><?php echo $title; ?></h3>
      <p class="card-text"><?php echo $text; ?></p>
    </div>
	<?php if ($card_link) { ?> <a href="<?php echo $card_link ?>" class="btn btn-primary"><?php echo $card_button_text ?></a> <?php } ?>
  </div>
</div>