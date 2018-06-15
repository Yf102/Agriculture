<?php
namespace Api\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\Http\Response;

class AbstractRestfulJsonController extends AbstractRestfulController
{
    /**
     * @throws \Exception
     */
    protected function methodNotAllowed()
    {
        $this->response->setStatusCode(405);
        throw new \Exception('Method Not Allowed');
    }

    # Override default actions as they do not return valid JsonModels

    /**
     * @param mixed $data
     * @throws \Exception
     */
    public function create($data)
    {
        return $this->methodNotAllowed();
    }

    /**
     * @param mixed $id
     * @throws \Exception
     */
    public function delete($id)
    {
        return $this->methodNotAllowed();
    }

    /**
     * @throws \Exception
     */
    public function deleteList($data)
    {
        return $this->methodNotAllowed();
    }

    /**
     * @param mixed $id
     * @throws \Exception
     */
    public function get($id)
    {
        return $this->methodNotAllowed();
    }

    /**
     * @throws \Exception
     */
    public function getList()
    {
        return $this->methodNotAllowed();
    }

    /**
     * @param null $id
     * @throws \Exception
     */
    public function head($id = null)
    {
        return $this->methodNotAllowed();
    }

    /**
     * @throws \Exception
     */
    public function options()
    {
        return $this->methodNotAllowed();
    }

    /**
     * @param $id
     * @param $data
     * @throws \Exception
     */
    public function patch($id, $data)
    {
        return $this->methodNotAllowed();
    }

    /**
     * @param mixed $data
     * @throws \Exception
     */
    public function replaceList($data)
    {
        return $this->methodNotAllowed();
    }

    /**
     * @param mixed $data
     * @throws \Exception
     */
    public function patchList($data)
    {
        return $this->methodNotAllowed();
    }

    /**
     * @param mixed $id
     * @param mixed $data
     * @throws \Exception
     */
    public function update($id, $data)
    {
        return $this->methodNotAllowed();
    }
}
