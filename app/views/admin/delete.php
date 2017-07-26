<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ِAdmin | Delete: <?php echo $data['title']?></title>
		<meta charset="utf-8" lang="en">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
  <style>
    body{
      margin:0 auto;
      background-color:#ECF0F1;
    }
    div{
      width:60%;
      margin:0 auto;
      padding:20px;
      background-color:white;
    }
    input, textarea{
      display: inline-block;
      width: 100%;
      padding: 5px;
      margin: 10px 0;
    }
    input[type="submit"]{
      width: 10%;
    }
    .error{
      width:60%;
      border: 1px solid #fafafa;
      background-color: #2ecc71;
      padding: 20px;
      margin: 15px auto;
    }
  </style>
  <body>
    <div>
      <h2>Sure You Wanna Delete: "<?php echo $data['title']?> " ?</h2>
      <form method="post">
        <label for="confirm">Code: <?php echo $_SESSION['code']?> </label>
        <input type="text" name="confirm" required>
        <input type="submit" value="Delete">
      </form>
    </div>
  </body>
