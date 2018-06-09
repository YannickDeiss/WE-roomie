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
</head>

<body bgcolor="#FFFFFF">

<!-- HEADER -->
<table class="head-wrap" style="width: 100%;" bgcolor="#f96f5d">
    <tr>
        <td></td>
        <td class="header container">

            <div class="content">
                <table>
                    <tr>
                        <td align="left">
                            <img src="https://we-roomie.s3.eu-central-1.amazonaws.com/uploads/3eb11b806f06049768e00a29ea8791c9.png" alt="Logo" width="90" height="45" style="border:0;"/>
                        </td>
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
        <td class="container" style="	display:block!important;
	max-width:600px!important;
	margin:0 auto!important; /* makes it centered */
	clear:both!important;" bgcolor="#FFFFFF">

            <div class="content" style="	padding:15px;
	max-width:600px;
	margin:0 auto;
	display:block; ">
                <table style=" width: 100%;">
                    <tr>
                        <td>

                            <h3>Email from  roomie.ch user: <?php echo TemplateView::noHTML($this->firstName . " " . $this->lastName); ?></h3>

                            <p class="callout" style="	padding:30px;
	background-color:#ECF8FF;
	margin-bottom: 20px;">
                                This email is about the following listing:  <a style="color: #2BA6CB;	font-weight:bold;
	color: #2BA6CB;" href="<?php echo $GLOBALS["ROOT_URL"]; ?>/search/<?php echo $this->listing[0]->getId(); ?>">Your listing &raquo;</a>
                            </p>

                            <p><?php echo $this->message; ?></p>

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

<table class="head-wrap" style="width: 100%; height: 100px; position: absolute;bottom: 0;" bgcolor="#f96f5d">
    <tr>
        <td></td>
        <td class="header container">

            <div class="content" style="width: 100%; height: 100px;">
                <table>
                </table>
            </div>

        </td>
        <td></td>
    </tr>
</table><!-- /HEADER -->

</body>
</html>