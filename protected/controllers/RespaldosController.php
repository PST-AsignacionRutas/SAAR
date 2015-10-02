<?php

class RespaldosController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionBd()
	{
		$archivo = sprintf('RespaldoSAAR%s.sql',date('Ymd-H_i_s'));
		//$archivo = sprintf('RespaldoPostgres.sql');
		$pathArchivo = sprintf(Yii::app()->basePath.'/../tmp/'.$archivo);
		$db = "saar";
		$user = "saar";
		$comando="pg_dump -c -F p -U $user $db > $pathArchivo";
		//echo "$comando";
		//exit(0);

		// Especifico el mime-type
		header("Content-type: text/plain;");
		header("Content-Disposition: attachment; filename=".urlencode($archivo));
		//Comando

		exec($comando);
		readfile($pathArchivo);
		//$this->render('index');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/

	public function filters()
	{
		return array(array('CrugeAccessControlFilter'));
	}
}
