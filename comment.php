<?php

class Comments
{

    public function AddCommentsUser($db, $corsId, $lesson, $UserId, $Commnt, $today)
    {
        $query = "insert into comments(UserId,courcesId,lessId,comment,datecomment,state)values($UserId,$corsId,$lesson,'$Commnt','$today',1)";
        $result = $db->insert($query);
        return $result;
    }
    public function getCountComments($db, $corsId, $lesson)
    {
        $query = "select count(*)Countcomm from comments where courcesId=$corsId and lessId=$lesson";
        $row = $db->SelectQuery($query);
        $contcomment = (float) $row['Countcomm'];
        return $contcomment;
    }
    public function getAllComments($db, $corsId, $lesson)
    {
        $query = "select comment,datecomment,(select UserName from users where UserId=g.UserId)UserName from comments g where state=1 and courcesId=$corsId and lessId=$lesson order by rowid";
        $result = $db->getData($query);
        return $result;
    }
    public function getInfoComment($row)
    {
        $date = ($row['datecomment']);
        $unixTimestamp = strtotime($date);
        $comment = ($row['comment']);
        $UserName = ($row['UserName']);
        $tdate = date("Y-m-d", $unixTimestamp);
        $ttime = date("H:i:s", $unixTimestamp);

        $data = array(
            "UserName" => $UserName,
            "Date" => $tdate,
            "Time" => $ttime,
            "Comment" => $comment
        );
        $json_data = json_encode($data);
        return $json_data;
    }
}
