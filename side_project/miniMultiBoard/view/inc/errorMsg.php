
<div class="text-danger mb-3" id="div-error-msg">
    <!-- 수정 후 -->
    <?php echo implode('<br>', $this->arrErrorMsg)


    // 수정 전
    // foreach($this->arrErrorMsg as $val){
    //     echo '<div class="form-text text-danger">'.$val.'</div>';
    // }

    
    // 알러트로 처리하고 싶을 떄
    // if(!empty($this->arrErrorMsg)) {
    //     echo "<script>alert('".implode('\n',$this->arrErrorMsg)."');</script>";
    // }
    ?>
</div>
