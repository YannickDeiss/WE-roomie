<?php

use controller\AuthController;

?>
</div>
<footer class="footer-distributed">

    <div class="footer-left">

        <h3>
            <span><img src="./dist/images/logo.png" width="120rem" height="50rem"></span>
        </h3>

        <p class="footer-links">
            <a href="#">Home</a>
            ·
            <a href="#">Blog</a>
            ·
            <a href="#">Pricing</a>
            ·
            <a href="#">About</a>
            ·
            <a href="#">Faq</a>
            ·
            <a href="#">Contact</a>
        </p>

        <p class="footer-company-name">Roomie &copy; 2018</p>
    </div>

    <div class="footer-center">
        <div>
            <i class="fas fa-map-marker"></i>
            <p>
                <span>Peter Merian-Strasse</span> Basel, Switzerland
            </p>
        </div>
        <div>
            <i class="fas fa-phone"></i>
            <p>+41 61 123 45 67</p>
        </div>

        <div>
            <i class="fas fa-envelope"></i>
            <p>
                <a href="mailto:support@company.com">support@roomie.ch</a>
            </p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>About the company</span>
            Since 2018 roomie is your partner when it comes to finding your perfect apartment and your perferct roommate. Stay up-to-date by subscribing to one of our many social media accounts.
        </p>

        <div class="footer-icons">

            <a href="#">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="#">
                <i class="fab fa-github"></i>
            </a>

        </div>

    </div>

</footer>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="dist/js/all.min.js" async defer></script>
<?php
if (!AuthController::authenticate()) {
    echo '<script src="dist/js/validator.js" async defer></script>';
}
?>


</body>

</html>