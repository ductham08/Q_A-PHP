<?php
    function getConnect(){

        $host = "localhost";
        $dbname = "question_database";
        $dbusername = "root";
        // $dbpwd = "123456";
        $dbpwd = "";
        
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpwd);
        }catch(Exception $ex){
            var_dump($ex->getMessage());
            die;
        }	
        return $conn;
    }



    function executeQuery($sqlQuery, $getAll = false){

        // tạo kết nối đến csdl
        $conn = getConnect();

        try {
            $stmt = $conn->prepare($sqlQuery);
            $success = $stmt->execute();
    
            if($success){
                if($getAll){
                    $result = $stmt->fetchAll();
                    if(!$result){
                        return ['error_code' => 0, 'data' => null];
                    }
                    return ['error_code' => 0, 'data' => $result];
                } else {
                    return ['error_code' => 0, 'data' => $stmt->fetch()];
                }
                return ['error_code' => 0, 'data' => null];
            } else {
                return ['error_code' => 1, 'error_msg' => 'Execute failed'];
            }
        } catch(PDOException $ex) {
            return ['error_code' => 2, 'error_msg' => $ex->getMessage()];
        }
    }

    function formatQuestionType($typeCode) {
        switch ($typeCode) {
            case 1:
                return 'Trắc nghiệm';
            case 2:
                return 'Tự luận';
            case 3:
                return 'Tổng hợp';
            default:
                return 'Không xác định'; // Nếu giá trị không phù hợp
        }
    }

    function formatQuestionRank($rankCode) {
        switch ($rankCode) {
            case 1:
                return 'Dễ';
            case 2:
                return 'Trung bình';
            case 3:
                return 'Khó';
            case 4:
                return 'Rất khó';
            default:
                return 'Không xác định'; // Nếu giá trị không phù hợp
        }
    }

?>


