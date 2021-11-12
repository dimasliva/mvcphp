<?php
class Controller_portfolio extends Controller
{
    function action_index()
    {
        $this->view->generate("portfolio_view.php", "template_view.php");
    }
}
