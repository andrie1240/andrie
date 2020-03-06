<?php
	$id = $_GET['id'];
	$json = file_get_contents('http://rdapi.herokuapp.com/product/read_one.php?id='.$id);
	$data = json_decode($json,true);
	$details = array('records' => $data);
	$result = $details['records'];
	//category
	$json2 = file_get_contents('http://rdapi.herokuapp.com/category/read.php');
	$data2 = json_decode($json2,true);
	$category = $data2['records'];
?>
<html> 
    <head>  
      <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>

<div class="navbar">
	
	    <ul>
       <li> <a href="index.php?navigation=product">Show</a> </li>
         <li><a href="index.php?navigation=categories">Category</a> </li>
        <li> <a href="index.php?navigation=create">Create</a> </li>
       <li>  <a href="index.php?navigation=delete">Delete</a> </li>
	    </ul>
    </div>
	<h1> Update Product </h1>
<form action="pro_update.php?id=<?php echo $id ?>" method="POST"><br><br>
	  <div style="margin: auto; width:15%; border:3px solid black;padding: 10px;">
	<input type="text" name="name" value="<?php echo $result['name'];?>"/><br><br>
	<input type="text" name="description" value="<?php echo $result['description']; ?>"/><br><br>
	<input type="text" name="price" value="<?php echo $result['price']; ?>"/><br><br>
	<select name="category">
	<option value="<?php echo $result['category_id'];?>"><?php echo $result['category_name'];?></option>
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


</html>
