<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ِAdmin | Panel</title>
		<meta charset="utf-8" lang="en">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
  <style>
    body{
      margin:0 auto; background-color:#ECF0F1;
    }
    div{
      width:90%; margin:0 auto; padding:20px;background-color:white;
    }
    .error{
      width:60%;
      border: 1px solid #fafafa;
      background-color: #2ecc71;
      padding: 20px;
      margin: 15px auto;
    }
    table{
      width:100%;
      text-align:left;
    }
</style>
<body>
  <div>
    <h1>Posts</h1>
    <table>
    	<thead>
    		<tr>
    			<th>Title</th>
          <th>Tag</th>
    			<th>Slug</th>
    			<th></th>
    			<th></th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php foreach($allposts as $page): ?>
    			<tr>
    				<td><?=$page->title; ?></td>
            <td><?=$page->tags; ?></td>
    				<td><a href="<?=BASE_URL . "/post/".$page->slug?>"><?=$page->slug; ?></a></td>
    				<td><a href="<?=BASE_URL . "/admin/edit.php?id=". $page->id ?>">Edit</a></td>
    				<td><a href="<?=BASE_URL . "/admin/delete.php?id=".$page->id ?>">Delete</a></td>
    			</tr>
    		<?php endforeach; ?>
    	</tbody>

    </table>
    <a href="<?=BASE_URL."/admin/add.php"?>">Add new page</a>
  </div>

</body>
