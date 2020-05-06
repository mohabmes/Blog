<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ِAdmin | Add</title>
		<meta charset="utf-8" lang="en">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
  <style>
    body{ margin:0 auto;background-color:#ECF0F1;}
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
    input[type="submit"]{ width: 10%; }
  </style>
  <body>
    <div>
      <form method="post" enctype="multipart/form-data">
				<? if($mode == "edit"):?>
					<h3 for="title">Edit: <?=$blog['title']?></h3>
	        <label for="title">Title:</label>
	        <input type="text" name="title" value="<?=$blog['title']?>" required>
	        <label for="tags">Tags:</label>
	        <input type="text" name="tags" value="<?=$blog['tags']?>" required>
					<label for="tags">Thumbnail: </label><span>(currently using <?=$blog['image']?> as a cover)</span>
					<input type="file" name="image" accept="image/*">
	        <label for="body">The content:</label>
	        <textarea name="body" rows="16" cols="100" required><?=$blog['body']?></textarea>
				<? else:?>
					<label for="title">Title:</label>
					<input type="text" name="title" value="<?=Input::get('title')?>" required>
					<label for="tags">Tags: (Multiple tags separated by ;)</label>
					<input type="text" name="tags" value="<?=Input::get('tags')?>" required>
					<label for="tags">Thumbnail:</label>
					<input type="file" name="image" accept="image/*">
					<label for="body">The content:</label>
					<textarea name="body" rows="30" cols="100" required><?=Input::get('body')?></textarea>
				<? endif;?>
        <input type="submit" value="OK">
      </form>
    </div>
  </body>
