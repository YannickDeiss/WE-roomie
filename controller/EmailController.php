<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/29/2018
 * Time: 3:29 PM
 */

namespace controller;

use dao\UserDAO;
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

    public static function sendContactEmail()
    {
        $listingID = $_POST["listingID"];
        $userID = $_POST["userID"];

        $userDAO = new UserDAO();
        $toEmail = $userDAO->findById($userID)->getEmail();

        $firstName = $_POST["firstName"];
        $lastName  = $_POST["lasttName"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        return EmailServiceClient::sendContactEmail($toEmail, $firstName, $lastName, $email, $message);
    }
}