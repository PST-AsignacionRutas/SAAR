<?php

class ReportesController extends Controller
{
	
	public $layout='//layouts/column1';
	

	/**
	 * @return array action filters
	 */
	/*public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}*/
	
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'reportesolicitudestransporte','reporteplanificacionrutasestudiantiles', 'reporteprogramacionactividadesdiarias'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionReporteSolicitudesTransporte()
	{
		$model = new Solicitud('search');
		
		if(isset($_POST['Solicitud']))
		{
			$model->attributes=$_POST['Solicitud'];
			
			$imprime = Yii::app()->ePdf->mpdf();
			/*$css = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/imprimir.css');
			$imprime->WriteHTML($css, 1);*/
			
			$this->layout='//layouts/reportes';
			$html = $this->render('imprimeRST',compact('model'), true);
			$imprime->WriteHTML($html);
			$imprime->Output('reporteSolicitudesTransporte.pdf', EYiiPdf::OUTPUT_TO_BROWSER);
		}
		
		$this->render('reporteSolicitudesTransporte',array(
			'model'=>$model,
		));
	}
	
	public function actionReportePlanificacionRutasEstudiantiles()
	{
		$model = new Solicitud('search');
		
		if(isset($_POST['Solicitud']))
		{
			$model->attributes=$_POST['Solicitud'];
			$model->tipo_solicitud = 1; // Ruta Estudiantil,
			$model->id_estatus_solicitud = 2;
			
			$imprime = Yii::app()->ePdf->mpdf();
			
			$this->layout='//layouts/reportes';

			$html = $this->render('imprimeRPRE',compact('model'), true);
			$imprime->WriteHTML($html);
			$imprime->Output('reportePlanificacionRutasEstudiantiles.pdf', EYiiPdf::OUTPUT_TO_BROWSER);
		}
		
		$this->render('reportePlanificacionRutasEstudiantiles',array(
			'model'=>$model,
		));
	}
	
	public function actionReporteProgramacionActividadesDiarias()
	{
		$model = new Solicitud('search');
		
		if(isset($_POST['Solicitud']))
		{
			$model->attributes=$_POST['Solicitud'];
			$model->tipo_solicitud = 0; // Actividad diaria,
			$model->id_estatus_solicitud = 2;
			
			$imprime = Yii::app()->ePdf->mpdf();
			
			$this->layout='//layouts/reportes';

			$html = $this->render('imprimeRPAD',compact('model'), true);
			$imprime->WriteHTML($html);
			$imprime->Output('reporteProgramacionActividadesDiarias.pdf', EYiiPdf::OUTPUT_TO_BROWSER);
		}
		
		$this->render('reporteProgramacionActividadesDiarias',array(
			'model'=>$model,
		));
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
