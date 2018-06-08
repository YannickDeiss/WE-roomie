<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/29/2018
 * Time: 3:33 PM
 */

use view\TemplateView;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <!-- If you delete this tag, the sky will fall on your head -->
    <meta name="viewport" content="width=device-width" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Contact Email</title>

    <link rel="stylesheet" type="text/css" href="dist/css/email.css" />

</head>

<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap" bgcolor="#999999">
    <tr>
        <td></td>
        <td class="header container">

            <div class="content">
                <table bgcolor="#999999">
                    <tr>
                        <td align="left">
                            <img src="https://we-roomie.s3.eu-central-1.amazonaws.com/uploads/3eb11b806f06049768e00a29ea8791c9.png" alt="Logo" width="90" height="45" style="border:0;"/>
                        </td>
                        <td align="right"><h6 class="collapse">Contact</h6></td>
                    </tr>
                </table>
            </div>

        </td>
        <td></td>
    </tr>
</table><!-- /HEADER -->


<!-- BODY -->
<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" bgcolor="#FFFFFF">

            <div class="content">
                <table>
                    <tr>
                        <td>

                            <h3>Email from  roomie.ch user <?php echo TemplateView::noHTML($this->$firstName . " " . $this->$lastName); ?></h3>

                            <p class="callout">
                                This email is about the following listing:  <a href="<?php echo $GLOBALS["ROOT_URL"]; ?>/search/<?php echo TemplateView::noHTML($listing->getId()); ?>">Your listing &raquo;</a>
                            </p>

                            <p><?php echo TemplateView::noHTML($this->$message); ?></p>

                            <br/>
                            <br/>
                        </td>
                    </tr>
                </table>
            </div>

        </td>
        <td></td>
    </tr>
</table><!-- /BODY -->

<!-- FOOTER -->
<table class="footer-wrap">
    <tr>
        <td></td>
        <td class="container">

            <!-- content -->
            <div class="content">
                <table>
                    <tr>
                        <td align="center">
                            <p>
                                <a href="#">Terms</a> |
                                <a href="#">Privacy</a> |
                            </p>
                        </td>
                    </tr>
                </table>
            </div><!-- /content -->

        </td>
        <td></td>
    </tr>
</table><!-- /FOOTER -->

</body>
</html>