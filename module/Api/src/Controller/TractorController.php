<?php
/**
 * Created by PhpStorm.
 * User: filiphristov
 * Date: 16/06/2018
 * Time: 16:19
 */

namespace Api\Controller;


use Agriculture\Tractors;
use Agriculture\TractorsQuery;
use Zend\View\Model\JsonModel;
use AppResult;

class TractorController extends AbstractRestfulJsonController
{
	public function getList()
	{

		$result = new AppResult(200, false, '', TractorsQuery::create()->find()->toArray());
		return $result->render();
	}

	public function get($id)
	{
		$result = new AppResult(200, false, '' , TractorsQuery::create()->findPk($id)->toArray());
		return $result->render();
	}

	/**
	 * @param mixed $data {TractorName}
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function create($data)
	{
		$tractor = new Tractors();
		$tractor->fromArray($data, \Propel\Runtime\Map\TableMap::TYPE_PHPNAME);
		$tractor->save();

		$result = new AppResult(200, false, 'Successfully created', $tractor->toArray());
		return $result->render();
	}

	public function update($id, $data)
	{// Action used for PUT requests

		$tractor = TractorsQuery::create()->findPk($id);
		$tractor->fromArray($data);
		$tractor->save();

		$result = new AppResult(200, false, 'Successfully updated', $tractor->toArray());
		return $result->render();
	}

	public function delete($id)
	{
		TractorsQuery::create()->findPk($id)->delete();

		$result = new AppResult(200, false, "Successfully deleted tractor $id", '');
		return $result->render();
	}
}
