<?php

//this file contains the APIs to be used by the mobile application to communicate with database
function activityCompleted(mysqli $connect,string $user,string $action_id): void{
    $action_name = "";
    $username = "";
    $streak = 0;
    $score = 0;

    try{

    //get id and name for the action
    if($statement = $connect->prepare("SELECT act_title,act_score FROM activity WHERE act_id=?")){
        $statement->bind_param("s",$action_id);
        $statement->execute();
        $result = $statement->get_result();
        if($row = $result->fetch_array()){
            $action_name = $row['act_title'];
            $score = $row['act_score'];
        }
        else{
            throw new Exception("Failed");
        }
    }

    if($statement = $connect->prepare("SELECT username FROM users WHERE user_id=?")){
        $statement->bind_param("s",$user);
        $statement->execute();
        $result = $statement->get_result();
        if($row = $result->fetch_array()){
            $username = $row['username'];
        }
        else{
            throw new Exception("Failed");
        }
    }

    if($statement = $connect->prepare("SELECT streak FROM records WHERE user_id=? ORDER BY time DESC LIMIT 1;")){
        $statement->bind_param("s",$user);
        $statement->execute();
        $result = $statement->get_result();

        if($row = $result->fetch_array()){
            $streak = (int)$row['streak']+$score;
        }
    }
    else{
        throw new Exception("Failed");
    }

    //insert into table
    if($statement = $connect->prepare("INSERT INTO records(record_id,user_id,act_id,streak,time) 
                                        VALUES (0,?,?,?,now());")){
        $statement->bind_param("ssi",$user,$action_id,$streak);
        $statement->execute();
        $result = $statement->get_result();
        
        //return result
        if($connect->affected_rows>0){
            $achievement = $username." had completed ".$action_name;
            $record = 0;
            if($statement = $connect->prepare("SELECT record_id FROM records WHERE user_id = ? AND act_id = ? AND streak=? ORDER BY record_id DESC;")){
                $statement->bind_param("ssi",$user,$action_id,$streak);
                $statement->execute();
                $result = $statement->get_result();

                $row = $result->fetch_array();
                $record = $row['record_id'];
            }

            if($statement = $connect->prepare("INSERT INTO ach_records(record_id,user_id,ach_name,act_id) VALUES (?,?,?,?);")){
                $statement->bind_param("isss",$record,$user,$achievement,$action_id);
                $statement->execute();

                if($connect->affected_rows>0)
                    echo "{\"result\":\"true\"}";
            }
            else{
                throw new Exception("Failed");
            }

        }else{
            throw new Exception("Failed");
        }
    }
    else   {
        throw new Exception("Failed");
    }
    }catch(Exception $e){
        echo "{\"result\":\"false\"}";
    }
}

function getUserMark(mysqli $connect, string $user){
    //get user mark
    if($statement = $connect->prepare("SELECT streak
                                    From records a
                                    WHERE a.user_id=?
                                    ORDER BY time DESC
                                    LIMIT 1;")){
        $statement->bind_param("s",$user);
        $statement->execute();
        $result = $statement->get_result();
        $mark = 0;
        if($row = $result->fetch_array()){
            $mark = $row['streak'];
        }
        
        echo "{\"result\":\"true\",\"mark\":".$mark."}";
    }
    else{
        echo "{\"result\":\"false\"}";
    }
}

function getUserAchievement(mysqli $connect,string $user,int $index): void{
    $achievement = "";
    //get user latest achievement based on the index
    if($statement = $connect->prepare("SELECT ach_name
                                    FROM ach_records
                                    ORDER BY record_id
                                    LIMIT ?,5;")){
        $init_pos = ($index) * 5;
        $statement->bind_param("i",$init_pos);
        $statement->execute();
        $result = $statement->get_result();

        while($row = $result->fetch_array()){
            $achievement .= ($row['ach_name']."\n");
        }
        //return achievement in result
        echo "{\"result\":\"true\",
            \"achievement\":\"".$achievement."\",
            \"index\":".$index."}";
        
    }else{
        echo "{\"result\":\"false\"}";
    }
}

$action = $_POST['action'];
$user = $_POST['user_id'];


//connect to mysql database//database connection
$connect = new mysqli("localhost","root","","tween_db");

//check connection
if($connect->connect_error){
    die("Connection error : $connect->connect_errno : $connect->connect_error");
}

switch($action){
    case "newActivity":
        activityCompleted($connect, $user, $_POST['action_id']);
        break;
    case "getMark":
        getUserMark($connect, $user);
        break;
    case "getAchievement":
        getUserAchievement($connect, $user, $_POST['index']);
}

$connect->close();


?>