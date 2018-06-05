<?php

use controller\AuthController;

?>
<footer class="footer">footer</footer>
</div>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="dist/js/all.min.js" async defer></script>
<?php
if (!AuthController::authenticate()) {
    echo '<script src="dist/js/validator.js" async defer></script>';
}
?>


</body>

</html>