<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Category List</title>

    <meta name="description" content="overview &amp; stats" />
</head>

<body class="no-skin">

<?php if(CheckSessionUtil::isAdmin()===true): ?>
    <a href="index.php?model=category&method=toAddPage" class="btn btn-sm btn-primary">Add</a> |
<?endif; ?>
<?php if(CheckSessionUtil::isLogin()===true): ?>
    Welcome <?=CheckSessionUtil::getUsername()?> |
    <a href="index.php?model=login&method=logOut">LogOut</a>
<?php endif; ?>
<?php if(CheckSessionUtil::isLogin()===false): ?>
    <a href="index.php?model=login&method=toLoginPage">Login</a>
<?php endif; ?>


<hr/>
<table border="1">
    <thead>
    <tr>
        <th>Name</th>
        <th>Keywords</th>
        <th>Description</th>
        <th>Status</th>
        <th>
            AddTime
        </th>
        <th>
            UpdateTime
        </th>
        <?php if(CheckSessionUtil::isAdmin()===true): ?>
            <th></th>
        <?php endif; ?>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($arrayData as $v1) {?>
    <tr>
        <td><?=$v1->name?></td>
        <td><?=$v1->keywords?></td>
        <td><?=$v1->description?></td>
        <td class="hidden-480">
            <?php
                if($v1->status==1) {
                    echo "Show";
                }else{
                    echo "Hide";
                }
            ?>

        </td>
        <td><?=$v1->addTime?></td>
        <td><?=$v1->updateTime?></td>
        <?php if(CheckSessionUtil::isAdmin()===true): ?>
            <td>
                <a class="btn btn-sm btn-inverse" href="index.php?model=category&method=toUpdatePage&id=<?=$v1->id?>">Edit</a>
                <a class="btn btn-sm btn-inverse"  href="javascript:del('<?=$v1->id?>');" >Delete</a>
            </td>
        <?php endif; ?>

    </tr>
    <?php } ?>

    </tbody>
</table>

<script src="public/js/jquery-2.1.4.min.js"></script>

<script type="text/javascript">

    function del(id) {
        if(confirm("Are you sure？"))
        {
            document.location.href="index.php?model=category&method=delete&id="+id;
        }
    }
</script>

</body>
</html>
