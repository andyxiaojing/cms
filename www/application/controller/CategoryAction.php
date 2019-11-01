<?php


class CategoryAction
{
    function index(){
        $categoryService = new CategoryService();
        $result = $categoryService->findList();
        $smarty = SmartyUtil::getSmarty();
        $smarty->assign("arrayData",$result);
        $smarty->display("category_index.tpl");
    }

    function toAddPage(){
        $smarty = SmartyUtil::getSmarty();
        $smarty->display("category_add.tpl");
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

        $smarty = SmartyUtil::getSmarty();
        $smarty->assign("cat",$cat);
        $smarty->display("category_update.tpl");
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