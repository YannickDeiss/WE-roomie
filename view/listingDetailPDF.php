<?php
use view\TemplateView;

$listing = $this->listing[0];
?>

<h1 align="center" style="font-family: Helvetica;"><span style="color: #f4476b;">Roomie</span> | Your apartment</h1>
<br>
<table border="0" style="height: 237px; border-color: #f4476b; border-collapse: collapse; width: 463.5px; margin-left: auto; margin-right: auto; font-size: 20px;" >
    <tbody>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107);">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Street</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($listing->getStreet()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Zip Code</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($listing->getPlz()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">City</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($listing->getCity()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Canton</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($listing->getCanton()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Number of rooms</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($listing->getNumberofrooms()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Square meters</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($listing->getSquaremeters()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Rent</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($listing->getPrice()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107);">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Available from</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($listing->getMoveInDate()); ?></td>
    </tr>
    <tr style="height: 30px; border-top: 1px solid rgb(244,71,107); border-bottom: 1px solid rgb(244,71,107)">
        <td style="width: 186px; padding-left: 10px; font-family: Helvetica; font-weight: bold;">Description</td>
        <td style="width: 274.5px; padding-left: 10px; font-family: Helvetica;"><?php echo TemplateView::noHTML($listing->getDescription()); ?></td>
    </tr>
    </tbody>
</table>