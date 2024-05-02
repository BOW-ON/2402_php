<?php
namespace model;

class BoardsModel extends Model {
    // protected $table = "boards";  // 원래 테이블명을 따로 빼두고 필요할때마다 사용함
    public function getBoardList(array $paramArr) {
        try {
            $sql = 
                " SELECT "
                ."  b_id "
                ."  ,b_title "
                ."  ,b_content "
                ."  ,b_img "
                ." FROM "
                ."  boards "
                ." WHERE "
                ."  b_type = :b_type "
                ." ORDER BY "
                ."  b_id DESC "
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);          
            $result = $stmt->fetchAll();

            return $result;

        } catch (\Throwable $th) {
            echo "BoardsModel -> getBoardList, ".$th->getMessage();
            exit;
        }
    }

    // 게시글 작성
    public function addBoard($paramArr){
        try {
            $sql = 
                " INSERT INTO boards( "
                ." u_id "
                ." ,b_type "
                ." ,b_title "
                ." ,b_content "
                ." ,b_img "
                ." ) "
                ." VALUES ("
                ." :u_id "
                ." ,:b_type "
                ." ,:b_title "
                ." ,:b_content "
                ." ,:b_img "
                ." ) "
            ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);   
            
            return $stmt->rowCount();
        } catch (\Throwable $th) {
            echo "boardsModel -> addBoard(), ".$th->getMessage();
            exit;
        }
        
    }

    // 게시글 조회
    public function getBoard($paramArr) {
        try {
            $sql =
                " SELECT "
                ." b_id "
                ." ,b_title "
                ." ,b_content "
                ." ,b_img "
                ." ,u_id "
                ." FROM "
                ."  boards "
                ." WHERE "
                ." b_id = :b_id "
            ;

            $stmt = $this->conn->prepare($sql);
            $stmt->execute($paramArr);
            $result = $stmt->fetchAll();

            return $result;
        } catch (\Throwable $th) {
            echo "boardsModel -> getBoard(), ".$th->getMessage();
            exit;
        }
    }
}