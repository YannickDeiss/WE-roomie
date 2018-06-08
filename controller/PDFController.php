<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:51
 */

namespace controller;

use service\CustomerServiceImpl;
use service\ListingServiceImpl;
use view\LayoutRendering;
use view\TemplateView;
use service\PDFServiceClient;

class PDFController
{
    public static function generateDetailPDF($id){

        $pdfView = new TemplateView("listingDetailPDF.php");
        $pdfView->listing = (new ListingServiceImpl())->findListingById($id);
        //LayoutRendering::basicLayout($pdfView);

        $result = PDFServiceClient::sendPDF($pdfView->render());
        header("Content-Type: application/pdf", NULL, 200);
        echo $result;
    }
}