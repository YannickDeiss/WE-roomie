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
        return EmailServiceClient::sendEmail(AuthServiceImpl::getInstance()->readUser()->getEmail(), "noreply@fhnw.ch", "Roomie Support", "My current listings", $emailView->render());
    }

    public static function sendContactEmail()
    {
        $listingID = $_POST["listingID"];
        $userID = $_POST["userID"];

        $userDAO = new UserDAO();
        $toEmail = $userDAO->findById($userID)->getEmail();

        $firstName = $_POST["firstName"];
        $lastName  = $_POST["lastName"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        $emailView = new TemplateView("view/listingContactEmail.php");
        $emailView->listing = (new ListingServiceImpl())->findListingById($listingID);
        $emailView->firstName = $firstName;
        $emailView->lastName = $lastName;
        $emailView->email = $email;
        $emailView->message = $message;

        EmailServiceClient::sendEmail($toEmail, $email, $firstName . " " . $lastName, "Interested party in your listing on roomie.ch", $emailView->render());
    }
}