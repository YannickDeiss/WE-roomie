<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/29/2018
 * Time: 3:33 PM
 */

use view\TemplateView;

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Contact Email</title>
</head>
<body>


<!--[if (gte mso 9)|(IE)]>
<table align="center" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="center" valign="top">
<![endif]-->
<table align="center" cellpadding="0" cellspacing="0" width="100%" bgcolor="#f96f5d">
    <tr>
        <td align="center" style="padding: 15px 5px 15px 5px;">
            <img src="https://we-roomie.s3.eu-central-1.amazonaws.com/uploads/3eb11b806f06049768e00a29ea8791c9.png" alt="Logo" width="90" height="45" style="border:0;"/>
        </td>
    </tr>
    <tr>
        <td align="center" style="padding: 15px 5px 15px 5px;font-weight: bold">
            Your current listings on Roomie.ch
        </td>
    </tr>
    <tr>
        <td align="center" valign="top">
            <!--[if (gte mso 9)|(IE)]>
            <table align="left" border="0" cellspacing="40" cellpadding="0" width="600">
                <tr>
                    <td align="center" valign="top" width="600">
            <![endif]-->
            <table border="0" cellpadding="0" cellspacing="40" width="600" class="wrapper">
                <thead>
                <tr>
                    <th align="left">ID</th>
                    <th align="left">Title</th>
                    <th align="left">Rooms</th>
                    <th align="left">Rent</th>
                    <th align="left">Available</th>
                    <th align="left">View online</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td align="center" valign="top">
                        <?php
                        foreach ($this->listings as $listing): /* @var Listing $listing */ ?>
                <tr>
                    <td><?php echo $listing->getId(); ?> </td>
                    <td><?php echo TemplateView::noHTML($listing->getTitle()); ?></td>
                    <td><?php echo TemplateView::noHTML($listing->getNumberofrooms()); ?> </td>
                    <td><?php echo TemplateView::noHTML($listing->getPrice()); ?> </td>
                    <td><?php echo TemplateView::noHTML($listing->getmoveindate()); ?> </td>
                    <a href='<?php echo $GLOBALS["ROOT_URL"]; ?>/search/<?php echo $listing->getId(); ?>'>
                        View
                    </a>
                </tr>
                <?php endforeach; ?>
                </td>
                </tr>
                </tbody>
            </table>
            <!--[if (gte mso 9)|(IE)]>
            </td>
            </tr>
            </table>
            <![endif]-->
        </td>
    </tr>
</table>
<!--[if (gte mso 9)|(IE)]>
</td>
</tr>
</table>
<![endif]-->
</body>
</html>