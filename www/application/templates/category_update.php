<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Update category</title>


</head>

<body class="no-skin">
<a href="index.php?model=category&method=index">Content List</a>
<hr/>
<form  method="post" action="index.php?model=category&method=update" class="form-horizontal" role="form">
            Name  <input type="text" id="name" name="name" value="<?=$cat->name?>"  placeholder="name" /><br/>
            Keywords  <input type="text" id="keywords" name="keywords" value="<?=$cat->keywords?>" placeholder="Keywords" /><br/>
           Description  <input type="text" id="description" value="<?=$cat->description?>" name="description" placeholder="Description"/><br/>
            <input type="hidden" id="id" name="id" value="<?=$cat->id?>" />
            Show status   <select class="chosen-select" id="status" name="status" data-placeholder="Choose a status"><br/>
                <option value="1" > Yes </option>
                <option value="0" > NO </option>
            </select><br/>
            <button class="btn btn-info" type="submit">
                <i class="ace-icon fa fa-check bigger-110"></i>
                Submit
            </button>
            <button class="btn" type="reset">
                <i class="ace-icon fa fa-undo bigger-110"></i>
                Reset
            </button>
</form>
<script src="public/js/jquery-2.1.4.min.js"></script>
</body>
</html>
