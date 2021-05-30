<?php
  if(isset($_FILES['userimage']))
  {
    require_once('class.NsfwFilter.php');
    $filter = new ImageFilter;
    $score = $filter->GetScore($_FILES['userimage']['tmp_name']);
  }
?>
<html>
<head>
    <title>Sexual/Adult Content/Nude Images Filter</title>
</head>
<body>
<?php if(isset($score)){ ?>
    <?php if($score >= 45){ ?>
    <div style="text-align:center; font-weight:bold; color:#DD0000">Image scored <?php echo $score ?>%<br/><br/>It seems that you have uploaded a sexual or nude image!</div>
    <?php } else { ?>
    <div style="text-align:center; font-weight:bold; color:#008800">Image scored <?php echo $score ?>%<br/><br/>It seems that you have uploaded a good image</div>
    <?php } ?>
<?php } ?>
<div align="center">
<br>
<form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
 Select an image: <input name="userimage" type="file" />
 <input type="submit" value="Filter" style="width:150px" />
</form>
</div>
</body>
</html>