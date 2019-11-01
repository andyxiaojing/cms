<?php


class ContentService
{

    function findOne($id){
        $db = DbOperation::getDb();
        $sql = "select * from content where id=$id ";
        $result = $db->queryOne($sql);
        $content =new Content();
        $content->id=$result["content"];
        $categoryId = $result["categoryId"];
        $content->categoryId=$categoryId;
        $content->title=$result["title"];
        $content->content=$result["content"];
        $content->keywords=$result["keywords"];
        $content->description=$result["description"];
        $content->copyFrom=$result["copy_from"];
        $content->addTime=$result["add_time"];
        $content->updateTime=$result["update_time"];
        $content->closeConnection();
        return $content;
    }


    function findList(){
        $db = DbOperation::getDb();
        $sql = "select * from content order by id desc  limit 10000 ";
        $result = $db->select($sql);
        $arrayContent = array();
        foreach ($result as $row){
          $content = new Content();
          $content->id = $row["id"];
          $content->categoryId = $row["category_id"];
          $content->title = $row["title"];
          $content->keywords = $row["keywords"];
          $content->description = $row["description"];
          $content->copyFrom = $row["copy_from"];
          $content->updateTime=$row["update_time"];
          $content->addTime=$row["add_time"];
          $categoryService = new CategoryService();
          $cat =$categoryService->findOne($content->categoryId);
          $content->categoryName= $cat->name;
          array_push($arrayContent,$content);
        }
        $db->closeConnection();
        return $arrayContent;
    }

    function add(Content $contentObj){
        $db = DbOperation::getDb();
        $categoryId = $contentObj->categoryId;
        $content = $contentObj->content;
        $copyFrom = $contentObj->copyFrom;
        $title =$contentObj->title;
        $keywords =$contentObj->keywords;
        $desc =$contentObj->description;
        $sql = "insert into content(`category_id`,`content`,`copy_from`,`title`,`keywords`,`description`,add_time,update_time) values('$categoryId','$content','$copyFrom','$title','$keywords','$desc',now(),now())";
        $db->insert($sql);
        $db->closeConnection();
    }

    function delete($id){
        $db = DbOperation::getDb();
        $sql = "delete from content where id=$id";
        $db->delete($sql);
        $db->closeConnection();
    }


    function update(Content $content){
        $db = DbOperation::getDb();
        $id =$content->id;
        $categoryId = $content->categoryId;
        $contents = $content->content;
        $copyFrom = $content->copyFrom;
        $title =$content->title;
        $keywords =$content->keywords;
        $desc =$content->description;
        $sql = "update content set categoryId=$categoryId, content='$contents',copyFrom='$copyFrom',title='$title',keywords='$keywords',description='$desc',update_time=now() where id=$id";
        $db->update($sql);
        $db->closeConnection();
    }
}