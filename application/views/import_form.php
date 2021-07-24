<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=file], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h2>Import Data by Excel</h2>
<p>Please <a href="<?=base_url('assets/sample.xlsx')?>" download="">download</a> the sample excel format for importing data</p>

<div class="container">
  <form method="POST" enctype="multipart/form-data" action="<?=base_url('import/import_data')?>">
  <div class="row">
    
    <div class="col-75">
      <input type="file"  id="file" name="file" placeholder="Upload file.">
    </div>
  </div>
  <div class="row">
	<div class="col-75">
		<input type="submit" name="submit" value="Submit">
	</div>
  </div>
  </form>
</div>
<div class="container">
	<h3>Users</h3>
	<table id="customers">
	<tr>
		<th>Name</th>
		<th>Email</th>
		<th>Phone</th>
	</tr>
	<?php if(count($users)>0){ 
			foreach($users as $user){
		
		?>
	<tr>
		<td><?=$user->name?></td>
		<td><?=$user->email?></td>
		<td><?=$user->phone?></td>
	</tr>
	<?php }

} else{
	?>
	<tr><td colspan="3">No data</td></tr>
	<?php }?>
	
	</table>
</div>

</body>
</html>

