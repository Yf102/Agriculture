<?php
namespace Api\Controller;

use Api\Controller\AbstractRestfulJsonController;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractRestfulJsonController
{
    public function getList()
    {
        return new JsonModel(array('data' => "Welcome to the Agriculture's API"));
    }
}
