<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Add Content</title>

    <meta name="description" content="overview &amp; stats" />
</head>

<body class="no-skin">
<a href="index.php?model=content&method=index">Content List</a>
<hr/>
<form  method="post" action="index.php?model=content&method=add" class="form-horizontal" role="form">

            Title: <input type="text" id="title" name="title" placeholder="Title" class="col-xs-10 col-sm-5" required /> <br/>
            Category   <select class="chosen-select" id="categoryId" name="categoryId" data-placeholder="Choose a status"> <br/>
                <?php foreach ($categoryList as $v){ ?>
                <option value="<?=$v->id?>">  <?=$v->name?> </option>
                <?php } ?>
            </select> <br/>
            Keywords: <input type="text" id="keywords" name="keywords" placeholder="Keywords" class="col-xs-10 col-sm-5" /> <br/>
            Description  <input type="text" id="description" name="description" placeholder="Description" class="col-xs-10 col-sm-5"/> <br/>
            From  <input type="text" id="copyFrom" name="copyFrom" placeholder="copyFrom" class="col-xs-10 col-sm-5" /> <br/>
            Content:  <textarea class="wysiwyg-editor" id="content" name="content" cols="35" rows="25"></textarea><br/>
            <button class="btn btn-info" type="submit">
                Submit
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                Reset
            </button>
</form>


<!--[if !IE]> -->
<script src="public/js/jquery-2.1.4.min.js"></script>

<script>


</script>

</body>
</html>
