<?php
    class SinhVienModel extends DB{
        public function getSv(){
            return "function getSV()";
        }
        public function SinhVien(){
            $qr = "SELECT * FROM sinhvien";
            return mysqli_query($this->con, $qr);
        }
    }
?>