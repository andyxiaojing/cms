<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Update content</title>

    <meta name="description" content="overview &amp; stats" />
</head>

<body class="no-skin">
<a href="index.php?model=content&method=index">Content List</a>
<hr/>
<form  method="post" action="index.php?model=content&method=update" class="form-horizontal" role="form">
            Title  <input type="text" id="title" name="title" value="<?=$content->title?>" placeholder="Title" class="col-xs-10 col-sm-5" required /> <br/>
            Category    <select class="chosen-select" id="categoryId" name="categoryId" data-placeholder="Choose a status"> <br/>
                <?php foreach($categoryList as $v){ ?>
                <option value="<?=$v->id?>"  <?php if($v->id == $content->categoryId){ ?> selected <?php }?>  >  <?=$v->name?> </option>
                <?php } ?>
            </select> <br/>
            Keywords  <input type="text" id="keywords" name="keywords" value="<?=$content->keywords?>" placeholder="Keywords" class="col-xs-10 col-sm-5" /> <br/>
            Description   <input type="text" id="description" name="description" value="<?=$content->description?>" placeholder="Description" class="col-xs-10 col-sm-5"/>  <br/>
            <input type="hidden" id="contentId" name="content" class="col-xs-10 col-sm-5"/>
            <input type="hidden" id="id" name="id" value="<?=$content->id?>" class="col-xs-10 col-sm-5"/>
            From  <input type="text" id="copyFrom" name="copyFrom" value="<?=$content->copyFrom?>" placeholder="copyFrom" class="col-xs-10 col-sm-5" /> <br/><br/>
            Content:  <textarea class="wysiwyg-editor" id="content" name="content" cols="35" rows="25" ><?=$content->content?></textarea><br/>
            <button class="btn btn-info" type="submit">
                Submit
            </button>

            &nbsp; &nbsp; &nbsp;
            <button class="btn" type="reset">
                Reset
            </button>
</form>

<script src="public/js/jquery-2.1.4.min.js"></script>

<script>

</script>

</body>
</html>
