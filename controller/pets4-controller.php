<?php

class Controller
{
    private $_f3; //Router

    public function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    public function order()
    {
        $view = new Template();
        echo $view->render('views/form1.html');
    }

    public function order2()
    {
        $view = new Template();
        echo $view->render('views/form2.html');
    }

    public function result()
    {
        $view = new Template();
        echo $view->render('views/results.html');
    }
}