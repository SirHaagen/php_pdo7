<div class="option">
  <?php
    $widthBar= $percentage * 5;
    $style= "bar";

    if($survey->getOptionSelected() == $language["choice"]){
      $style= "selected";
    }
    echo "<b>".$language["choice"]."</b>";
  ?>

  <div class="<?php echo $style; ?>" style="width:<?php echo $widthBar. 'px'; ?>">
    <?php echo "(". $percentage. "%)"; ?>
  </div>

</div>