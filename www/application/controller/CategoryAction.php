<?php


class CategoryAction
{
    function index(){
        $categoryService = new CategoryService();
        $result = $categoryService->findList();
        $view = ViewUtil::getView();
       // print_r($result);die();
        $view->addData("arrayData",$result);
        $view->display("category_index.php");
    }

    function toAddPage(){
        $view = ViewUtil::getView();
        $view->display("category_add.php");
    }


    function add(){
        $name = $_POST["name"];
        $keywords = $_POST["keywords"];
        $description = $_POST["description"];
        $status = $_POST["status"];

        $cat = new Category;
        $cat->setName($name);
        $cat->setKeywords($keywords);
        $cat->setDescription($description);
        $cat->setStatus($status);
        $categoryService = new CategoryService();
        $categoryService->add($cat);
        header("Location: index.php?model=category&method=index", true, 301);
    }

    function delete(){
        $id = $_GET["id"];
        $categoryService = new CategoryService();
        $categoryService->delete($id);
        header("Location: index.php?model=category&method=index", true, 301);
    }

    function toUpdatePage(){

        $id = $_GET["id"];
        $categoryService = new CategoryService();
        $cat = $categoryService->findOne($id);
      //  print_r($cat);die();
        $view = ViewUtil::getView();
        $view->addData("cat",$cat);
        $view->display("category_update.php");
    }

    function update(){
        $id = $_POST["id"];
        $name = $_POST["name"];
        $keywords = $_POST["keywords"];
        $description = $_POST["description"];
        $status = $_POST["status"];
        $cat = new Category;
        $cat->setId($id);
        $cat->setName($name);
        $cat->setKeywords($keywords);
        $cat->setDescription($description);
        $cat->setStatus($status);
        $categoryService = new CategoryService();
        $categoryService->update($cat);
        header("Location: index.php?model=category&method=index", true, 301);


    }




}