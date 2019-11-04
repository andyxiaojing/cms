<?php


class ContentAction
{
    function index(){
        $sortField = $_GET["sortField"];
        if ($sortField==null){
            $sortField = "add_time";
        }
        $sortAction = $_GET["sortAction"];
        if ($sortAction==null){
            $sortAction = "desc";
        }
        $contentService = new ContentService();
        $result = $contentService->findList($sortField,$sortAction);
        $view = ViewUtil::getView();
        $view->addData("sortField",$sortField);
        $view->addData("sortAction",$sortAction);
        $view->addData("arrayData",$result);
        $view->display("content_index.php");
    }

    function toAddPage(){
        $categoryService = new CategoryService();
        $categoryList = $categoryService->findList();
        $view = ViewUtil::getView();
        $view->addData("categoryList",$categoryList);
        $view->display("content_add.php");
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

    function detail(){
        $id = $_GET["id"];
        $contentService = new ContentService();
        $categoryService = new CategoryService();
        $content = $contentService->findOne($id);
        $categoryList = $categoryService->findList();
        $view = ViewUtil::getView();
        $view->addData("categoryList",$categoryList);
        $view->addData("content",$content);
        $view->display("content_detail.php");
    }

    function toUpdatePage(){
        $id = $_GET["id"];
        $contentService = new ContentService();
        $categoryService = new CategoryService();
        $content = $contentService->findOne($id);
        $categoryList = $categoryService->findList();
        $view = ViewUtil::getView();
        $view->addData("categoryList",$categoryList);
        $view->addData("content",$content);
        $view->display("content_update.php");
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