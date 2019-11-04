<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Add Category</title>

    <meta name="description" content="overview &amp; stats" />

</head>

<body class="no-skin">
<a href="index.php?model=category&method=index">Content List</a>
<hr/>
<form  method="post" action="index.php?model=category&method=add" class="form-horizontal" role="form">
    <div class="form-group">
            Name   <input type="text" id="name" name="name" placeholder="name" class="col-xs-10 col-sm-5" required /><br/>
            Keywords  <input type="text" id="keywords" name="keywords" placeholder="Keywords" class="col-xs-10 col-sm-5" /><br/>
            Description  <input type="text" id="description" name="description" placeholder="Description" class="col-xs-10 col-sm-5"/><br/>
            Show status   <select class="chosen-select" id="status" name="status" data-placeholder="Choose a status"><br/>
                <option value="1">  Yes </option>
                <option value="0"> NO </option>
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
