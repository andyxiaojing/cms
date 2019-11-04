<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
</head>

<body class="no-skin">
<?php if(CheckSessionUtil::isAdmin()===true): ?>
    <a href="index.php?model=content&method=toAddPage">Add Content</a>  |
<?endif; ?>
<?php if(CheckSessionUtil::isLogin()===true): ?>
    Welcome <?=CheckSessionUtil::getUsername()?> |
    <a href="index.php?model=login&method=logOut">LogOut</a>
<?php endif; ?>
<?php if(CheckSessionUtil::isLogin()===false): ?>
    <a href="index.php?model=login&method=toLoginPage">Login</a>
<?php endif; ?>

<hr/>
<table  border="1">
    <thead>
    <tr>
        <th>
            <?php if(CheckSessionUtil::isAdmin()===true): ?>
                <a href="javascript:sort_by('title')"> Title</a>
                <?else:?>
                Title
            <?endif; ?>
            </th>
        <th>Category</th>
        <th>Keywords</th>
        <th>Description</th>
        <th>From</th>
        <th>
            <?php if(CheckSessionUtil::isAdmin()===true): ?>
                <a href="javascript:sort_by('add_time')"> AddTime</a>
            <?else:?>
                AddTime
            <?endif; ?>
        </th>
        <th>
            <?php if(CheckSessionUtil::isAdmin()===true): ?>
                <a href="javascript:sort_by('update_time')"> UpdateTime</a>
            <?else:?>
                UpdateTime
            <?endif; ?>

        </th>
        <?php if(CheckSessionUtil::isAdmin()===true): ?>
        <th></th>
        <?php endif; ?>
    </tr>
    </thead>

    <tbody>
    <?php foreach($arrayData as $v1): ?>
    <tr>
        <td>
            <a target="_blank" href="index.php?model=content&method=detail&id=<?=$v1->id?>"><?=$v1->title?></a>
        </td>
        <td><?=$v1->categoryName?></td>
        <td><?=$v1->keywords?></td>
        <td><?=$v1->description?></td>
        <td ><?=$v1->copyFrom?></td>
        <td><?=$v1->addTime?></td>
        <td><?=$v1->updateTime?></td>
        <?php if(CheckSessionUtil::isAdmin()===true): ?>
        <td>
                <a  href="index.php?model=content&method=toUpdatePage&id=<?=$v1->id?>">Edit</a>
                <a  href="javascript:del('<?=$v1->id?>');" >Delete</a>
        </td>
        <?php endif; ?>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<input type="hidden" id="sortField" value="<?=$sortField?>"/>
<input type="hidden" id="sortAction" value="<?=$sortAction?>"/>

<script src="public/js/jquery-2.1.4.min.js"></script>

<script type="text/javascript">
    function del(id) {
        if(confirm("Are you sure？"))
        {
            document.location.href="index.php?model=content&method=delete&id="+id;
        }
    }

    function sort_by(f) {
        var current_f = $('#sortField').val(); // sort field
        var action = $('#sortAction').val(); // desc ,asc
        if(current_f==null){
            current_f = "add_time";
        }
        if (action==null){
            action = "asc";
        }
        if (action=="desc"){
            action = "asc";
        }else {
            action = "desc"
        }
        if (f==current_f){

            document.location.href="index.php?model=content&method=index&sortField="+current_f+"&sortAction="+action;
        }else {
            document.location.href="index.php?model=content&method=index&sortField="+f+"&sortAction="+action;
        }
    }
</script>

</body>
</html>