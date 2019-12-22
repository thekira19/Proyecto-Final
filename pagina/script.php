    <script src='./../../js/sweet-alert.min.js'></script>
    <script src='//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js'></script>
    <script src='./../../js/modernizr.js'></script>
    <script src='./../../js/bootstrap.min.js'></script>

    <script src='./../../js/jquery.mCustomScrollbar.concat.min.js'></script>
    <script src='./../../js/main.js'></script>
    <script  src="./../../js/script.js"></script>
    <script src="./../../js/clock.js"></script>
    <?php
        if($_SESSION["usuario"]->fin!=NULL){
            if($_SESSION["usuario"]->nivel!=5){
                $date = date('M d Y H:i:s', strtotime($_SESSION["usuario"]->fin));
                echo "<script type='text/javascript'>countdown('".$date."', 'clock', '¡Cuenta Expirada!');</script>'";
            }
        }
    ?>