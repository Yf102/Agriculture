<?php

namespace Api\Controller;

use Agriculture\Parcels;
use Agriculture\ParcelsQuery;
use Zend\View\Model\JsonModel;

class ParcelController extends AbstractRestfulJsonController
{
	public function getList()
	{// Action used for GET requests without resource Id

		return new JsonModel(
			array('data' => ParcelsQuery::create()->find()->toArray())
		);
	}

	public function get($id)
	{// Action used for GET requests with resource Id

		$parcel = ParcelsQuery::create()->findPk($id);
		return new JsonModel(array("data" => is_null($parcel) ? [] : $parcel->toArray()));
	}

	/**
	 * @param mixed $data {ParcelName, Culture, Area}
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function create($data)
	{// Action used for POST requests

		$parcel = new Parcels();
		$parcel->fromArray($data, \Propel\Runtime\Map\TableMap::TYPE_PHPNAME);
		$parcel->save();

		return new JsonModel(array('data' => $parcel->toArray()));
	}

	public function update($id, $data)
	{// Action used for PUT requests

		$parcel = ParcelsQuery::create()->findPk($id);
		$parcel->fromArray($data);
		$parcel->save();

		return new JsonModel(array('data' => $parcel->toArray()));
	}

	public function delete($id)
	{// Action used for DELETE requests
		ParcelsQuery::create()->findPk($id)->delete();
		return new JsonModel(array("data" => "Parcels with id $id was successfully deleted"));
	}
}
