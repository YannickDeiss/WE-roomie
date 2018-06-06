<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/29/2018
 * Time: 3:29 PM
 */

namespace controller;

use service\AuthServiceImpl;
use service\ListingServiceImpl;
use view\TemplateView;
use service\EmailServiceClient;
class EmailController
{
    public static function sendMeMyCustomers(){
        $emailView = new TemplateView("view/listingListEmail.php");
        $emailView->listings = (new ListingServiceImpl())->findAllListings();
        return EmailServiceClient::sendEmail(AuthServiceImpl::getInstance()->readUser()->getEmail(), "My current listings", $emailView->render());
    }
}