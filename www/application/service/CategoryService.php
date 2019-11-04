<?php


class CategoryService
{

    function findOne($id){
        $db = DbOperation::getDb();
        $sql = "select * from category where id=$id limit 1 ";
        $result = $db->queryOne($sql);

        $cat =new Category();
        $cat->id=$result["id"];
        $cat->name=$result["name"];
        $cat->keywords=$result["keywords"];
        $cat->description=$result["description"];
        $cat->status=$result["status"];
        $db->closeConnection();
        return $cat;
    }


    function findList(){
        $db = DbOperation::getDb();
        $sql = "select * from category order by id desc  limit 10000 ";
        $result = $db->select($sql);
        $arrayContent = array();
        foreach ($result as $row){
            $cat = new Category();
            $cat->id = $row["id"];
            $cat->name = $row["name"];
            $cat->keywords = $row["keywords"];
            $cat->description = $row["description"];
            $cat->updateTime = $row["update_time"];
            $cat->addTime = $row["add_time"];
            $cat->status = $row["status"];
            array_push($arrayContent,$cat);
        }
        $db->closeConnection();
        return $arrayContent;
    }

    function add(Category $category){
        $db = DbOperation::getDb();
        $name =$category->name;
        $keywords =$category->keywords;
        $desc =$category->description;
        $status =$category->status;
        $sql = "insert into category(`name`,`keywords`,`description`,`status`,add_time,update_time) values('$name','$keywords','$desc',$status,now(),now())";
        $db->insert($sql);
        $db->closeConnection();
    }

    function delete($id){
        $db = DbOperation::getDb();
        $sql = "delete from category where id=$id";
        $db->delete($sql);
        $db->closeConnection();
    }


    function update(Category $category){
        $db = DbOperation::getDb();
        $id =$category->id;
        $name =$category->name;
        $keywords =$category->keywords;
        $desc =$category->description;
        $status =$category->status;
        $sql = "update category set name='$name',keywords='$keywords',`description`='$desc',`status`=$status,update_time=now() where id=$id";
        $db->update($sql);
        $db->closeConnection();
    }
}