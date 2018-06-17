<?php

namespace Api\Controller;

use Agriculture\Parcels;
use Agriculture\ParcelsQuery;
use Zend\View\Model\JsonModel;

class ParcelController extends AbstractRestfulJsonController
{
	public function getList()
	{// Action used for GET requests without resource Id

		$result = new \AppResult(200, false, '', ParcelsQuery::create()->find()->toArray());
		return $result->render();
	}

	public function get($id)
	{// Action used for GET requests with resource Id
		$result = new \AppResult(200, false, '', ParcelsQuery::create()->findPk($id)->toArray());
		return $result->render();
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

		$result = new \AppResult(200, false, '', $parcel->toArray());
		return $result->render();
	}

	public function update($id, $data)
	{// Action used for PUT requests

		$parcel = ParcelsQuery::create()->findPk($id);
		$parcel->fromArray($data);
		$parcel->save();

		$result = new \AppResult(200, false, '', $parcel->toArray());
		return $result->render();
	}

	public function delete($id)
	{// Action used for DELETE requests
		ParcelsQuery::create()->findPk($id)->delete();

		$result = new \AppResult(200, false, "Parcels with id $id was successfully deleted", '');
		return $result->render();
	}
}
