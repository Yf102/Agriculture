<?php

namespace Api\Controller;

use Agriculture\ParcelsQuery;
use Zend\View\Model\JsonModel;

class ParcelController extends AbstractRestfulJsonController
{
	static $albums = array(
		array('id' => 1, 'name' => 'Mothership', 'band' => 'Led Zeppelin'),
		array('id' => 2, 'name' => 'Coda', 'band' => 'Led Zeppelin'),
	);

	// Action used for GET requests without resource Id
	public function getList()
	{
		return new JsonModel(
			array('data' => ParcelsQuery::create()->find()->toArray())
		);
	}

	// Action used for GET requests with resource Id
	public function get($id)
	{
		$parcel = ParcelsQuery::create()->findPk($id);
		return new JsonModel(array("data" => is_null($parcel) ? [] : $parcel->toArray()));
	}

	// Action used for POST requests
	public function create($data)
	{
		return new JsonModel(array('data' => array('id' => 3, 'name' => 'New Album', 'band' => 'New Band')));
	}

	// Action used for PUT requests
	public function update($id, $data)
	{
		return new JsonModel(array('data' => array('id' => 3, 'name' => 'Updated Album', 'band' => 'Updated Band')));
	}

	// Action used for DELETE requests
	public function delete($id)
	{
		return new JsonModel(array('data' => 'album id 3 deleted'));
	}
}
