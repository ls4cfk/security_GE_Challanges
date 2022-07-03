<?php

## note for dev: the license is: https://pentesterlab.com/gift/REDACTED

if ($_SERVER['REMOTE_ADDR'] == '172.30.0.3') {
    echo "Good job\n";

    class TestReq{
        public $inject;
        function __construct(){
        }
        function __wakeup(){
            if(isset($this->inject)){
                eval($this->inject);
            }
        }
    }
    if(isset($_REQUEST['r'])){  
        $var1=unserialize($_REQUEST['r']);

        if(is_array($var1)){
            echo "<br/>".$var1[0]." - ".$var1[1];
        }
    }
    else{
        echo "";
    }
}

else {
    http_response_code(403);
    header("Location: /403.php");
}

?>