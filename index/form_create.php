<?php
	//category
	$json = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$data = json_decode($json,true);
	$category = $data['records'];
?>
      <link rel="stylesheet" type="text/css" href="css/style.css">
<form action="pro_create.php" method="POST">
<h1> Create Product </h1>
	  <div style="margin: auto; width:15%; border:3px solid black;padding: 10px;">
<input type="text" name="name" placeholder="name"/><br><br>
<input type="text" name="description" placeholder="description"/><br><br>
<input type="text" name="price" placeholder="price"/><br><br>
<select name="category"><br><br>
		</div>
<option value="">--Category--</option>
	<?php
      foreach($category as $cview){
    ?>
		<option value="<?php echo $cview['id']?>"><?php echo $cview['name']?></option>
    <?php
      }
    ?>
	</select>
<input type="submit" name="submit" value="submit"/>

</form>
