<?php

class ReportesController extends Controller
{
	//public $layout='//reportes/layout';
	public $layout='//layouts/column1';
	public function actionChoferes()
	{
		$this->render('choferes');
	}

	public function actionIndex()
	{
		$this->render('index');
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
}
