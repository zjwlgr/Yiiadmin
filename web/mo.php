<?php
//header('Content-type: text/html;charset=utf-8');

$m = new MongoClient("mongodb://root:123456@127.0.0.7:27017"); // 连接默认主机和端口为：mongodb://localhost:27017
//$m = new MongoClient( "mongodb://example.com" ); // 连接远程数据库，默认端口为27017
//$m = new MongoClient( "mongodb://example.com:65432" ); // 连接远程数据库，端口号为指定的端口号。
$db = $m->form1; // 获取名称为 "form1" 的数据库

//创建集合
//$collection = $db->createCollection("runoob");
//echo "集合创建成功";

//插入文档
$collection = $db->runoob; // 选择集合
/*$document = array(
	"title" => "MongoDB",
	"description" => "database",
	"likes" => 100,
	"url" => "http://www.runoob.com/mongodb/",
	"by", "菜鸟教程"
);
$collection->insert($document);
echo "数据插入成功";*/


// 更新文档 找到的第一条
//$collection->update(array("title"=>"MongoDB"), array('$set'=>array("title"=>"MongoDB 教程")));

// 更新文档 找到的所有条
/*$collection->update(
    array("title"=>"MongoDB"),
    array('$set'=>array("title"=>"MongoDB 教程")),
    array('multiple' => true)
);*/


//查找文档
$cursor = $collection->find();
//var_dump($cursor);
// 迭代显示文档标题
foreach ($cursor as $document) {
    echo $document["title"] . "<br />";
}

// 移除文档
//$collection->remove(array("title"=>"MongoDB 教程"), array("justOne" => true));