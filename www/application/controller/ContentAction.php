<?php


class ContentAction
{
    function index(){
        $contentService = new ContentService();
        $result = $contentService->findList();
        $smarty = SmartyUtil::getSmarty();
        $smarty->assign("arrayData",$result);
        $smarty->display("content_index.tpl");
    }

    function toAddPage(){
        $categoryService = new CategoryService();
        $categoryList = $categoryService->findList();
        $smarty = SmartyUtil::getSmarty();
        $smarty->assign("categoryList",$categoryList);
        $smarty->display("content_add.tpl");
    }


    function add(){
        $contentObj = new Content();
        $contentObj->categoryId=$_POST["categoryId"];
        $contentObj->content=$_POST["content"];
        $contentObj->copyFrom=$_POST["copyFrom"];
        $contentObj->title=$_POST["title"];
        $contentObj->keywords=$_POST["keywords"];
        $contentObj->description=$_POST["description"];
        $contentService = new ContentService();
        $contentService->add($contentObj);
        header("Location: index.php?model=content&method=index", true, 301);
    }

    function delete(){
        $id = $_GET["id"];
        $contentService = new ContentService();
        $contentService->delete($id);
        header("Location: index.php?model=content&method=index", true, 301);
    }

    function toUpdatePage(){
        $id = $_GET["id"];
        $contentService = new ContentService();
        $categoryService = new CategoryService();
        $content = $contentService->findOne($id);
        $categoryList = $categoryService->findList();
        $smarty = SmartyUtil::getSmarty();
        $smarty->assign("categoryList",$categoryList);
        $smarty->assign("content",$content);
        $smarty->display("content_update.tpl");
    }

    function update(){
        $content = new Content();
        $content->id = $_POST["id"];
        $content->categoryId=$_POST["categoryId"];
        $content->content=$_POST["content"];
        $content->copyFrom=$_POST["copyFrom"];
        $content->title=$_POST["title"];
        $content->keywords=$_POST["keywords"];
        $content->description=$_POST["description"];
        $contentService = new ContentService();
        $contentService->update($content);
        header("Location: index.php?model=content&method=index", true, 301);


    }




}