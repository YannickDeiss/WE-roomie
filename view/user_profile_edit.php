<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 07.01.2018
 * Time: 01:08
 */

use view\TemplateView;

?>



<main class="content">
    <div class="listing-grid">
        <div class="section-heading">
            <h2>EDIT YOUR PROFILE</h2>
        </div>
        <div class="form-layout">
            <form class="entry-form" method="POST" action="<?php echo $GLOBALS["ROOT_URL"]; ?>/user/edit">
                <h1>Edit Your Profile</h1>

                <input class="form-control" type="hidden" readonly="" name="id"
                       value="<?php echo $user->getId(); ?>">

                <div class="form-group">
                    <input type="text"  name="userName"
                           value="<?php echo TemplateView::noHTML($user->getUserName()) ?>"/>
                    <label>Username</label>
                </div>
                <div class="form-group">
                    <input type="text"  name="email"
                           value="<?php echo TemplateView::noHTML($user->getEmail()) ?>"/>
                    <label <?php echo isset($this->userValidator) ? 'style="color:red;font-weight:bold;font-size:1rem"' : "" ?>><?php echo isset($this->userValidator) ? $this->userValidator->getEmailError() : "Email" ?></label>
                </div>

                <div class="form-group">
                    <input type="password" name="oldPassword"
                           value=""/>
                    <label>Old Password</label>
                </div>

                <div class="form-group">
                    <input type="password" name="newPassword"
                           value=""/>
                    <label>New Password</label>
                </div>

                <!--                <input type="button" class="green" onclick="submitForm()" value="Submit"/>-->
                <!--                <input id="submit_handle" type="submit" style="display: none">-->
                <input type="button" class="green" onclick="form.submit()" value="Update"/>
                <input type="button" value="Cancel"
                       onclick="window.location.href='<?php echo $GLOBALS["ROOT_URL"]; ?>/user'"/>
            </form>
        </div>
    </div>
</main>


<script>
    function submitForm() {
        // $('#submit_handle').click();
        $('#entry-form').submit();
    }
</script>
