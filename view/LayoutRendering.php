<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/7/2018
 * Time: 1:47 PM
 */

namespace view;

use controller\AuthController;
use service\AuthServiceImpl;


class LayoutRendering
{

    public static function basicLayout(TemplateView $contentView)
    {
        $view = new TemplateView("layout.php");
        $view->meta = (new TemplateView("meta.php"))->render();
        $view->nav = (new TemplateView("nav.php"))->render();
        // REPLACE LINE ABOVE WITH CODE BLOCK BELOW WHEN READY FOR IT
        //        if (AuthController::authenticate()) {
//            $view->header = (new TemplateView("nav_signedIn.php"))->render();
//        } else {
//            $view->header = (new TemplateView("nav.php"))->render();
//        }
        $view->content = $contentView->render();
        $view->footer = (new TemplateView("footer.php"))->render();
        echo $view->render();
    }
}