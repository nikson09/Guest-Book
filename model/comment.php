<?php

class comment {

public static function commentExist()
    {
        $db = Db::getConnection();


                $sql = 'SELECT comment_id, name, text, parent_id, date FROM comment '
                        . 'WHERE parent_id = "0" ORDER BY comment_id DESC '
                        ;


                $result = $db->prepare($sql);
                $result->bindParam(':count', $count, PDO::PARAM_INT);


                $result->setFetchMode(PDO::FETCH_ASSOC);


                $result->execute();


                $i = 0;
                $comment = array();
                while ($row = $result->fetch()) {
                    $comment[$i]['comment_id'] = $row['comment_id'];
                    $comment[$i]['name'] = $row['name'];
                    $comment[$i]['text'] = $row['text'];
                    $comment[$i]['date'] = $row['date'];
                    $comment[$i]['parent_id'] = $row['parent_id'];
                    $i++;
                }
                return $comment;
    }

public static function addComment($name, $text, $parent_id)
    {

        $db = Db::getConnection();

        $sql = 'INSERT INTO comment (name, text, parent_id) '
                . 'VALUES (:name,:text, :parent_id)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':parent_id', $parent_id, PDO::PARAM_INT);
        return $result->execute();
    }



public static function db_connect($host, $user, $password, $db_name) {
    $link = mysqli_connect($host, $user, $password, $db_name);

    if (!$link) {
        die('Ошибка подключения (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
    }

    return $link;
}

public static  function getCategories($link) {
    if ($result = mysqli_query($link, "SELECT * FROM comment")) {
         return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}

public static   function createTree($arr) {
	$parents_arr = array();
	foreach($arr as $key=>$item) {
		$parents_arr[$item['parent_id']][$item['comment_id']] = $item;
	}

	$treeElem = $parents_arr[0];

	comment::generateElemTree($treeElem,$parents_arr);

	return $treeElem;
}

public static   function generateElemTree(&$treeElem,$parents_arr) {
	foreach($treeElem as $key=>$item) {
		if(!isset($item['children'])) {
			$treeElem[$key]['children'] = array();
		}
		if(array_key_exists($key,$parents_arr)) {
			$treeElem[$key]['children'] = $parents_arr[$key];
			comment::generateElemTree($treeElem[$key]['children'],$parents_arr);
		}
	}
}

public static  function renderTemplate($path,$arr) {
	$output = '';

	if(file_exists($path)) {
		extract($arr);

		ob_start();
		include $path;
		$output = ob_get_clean();
	}

	return $output;
}

}