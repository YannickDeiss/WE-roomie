<?php
/**
 * Created by PhpStorm.
 * User: Hermann Grieder
 * Date: 5/7/2018
 * Time: 1:47 PM
 */

namespace view;

use controller\AuthController;

class LayoutRendering
{

    public static function basicLayout(TemplateView $contentView)
    {
        $view = new TemplateView("layout.php");
        $view->meta = (new TemplateView("meta.php"))->render();
        $view->modal = (new TemplateView("modal.php"))->render();
        $view->nav = (new TemplateView("nav.php"))->render();
//        if (AuthController::authenticate()) {
//            $view->nav = (new TemplateView("nav_signedIn.php"))->render();
//        }
        $view->content = $contentView->render();
        $view->footer = (new TemplateView("footer.php"))->render();
        echo $view->render();
    }
}