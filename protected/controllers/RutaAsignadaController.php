<?php

class RutaAsignadaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

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
				'actions'=>array('create','update', 'listasolicitudes', 
				'asignaractividades', 'asignarrutaestudiantil', 'ajaxlistavehiculos', 
				'ajaxlistachoferes', 'listasolicitudesmodificar'),
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

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RutaAsignada;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RutaAsignada']))
		{
			$model->attributes=$_POST['RutaAsignada'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RutaAsignada']))
		{
			$model->attributes=$_POST['RutaAsignada'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RutaAsignada');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RutaAsignada('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RutaAsignada']))
			$model->attributes=$_GET['RutaAsignada'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Lista las solicitudes que están sin asignar para que puedan
	 *  ser asignadas
	 * 
	 */
	public function actionListaSolicitudes()
	{
		$model=new Solicitud('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Solicitud']))
			$model->attributes=$_GET['Solicitud'];
			$model->id_estatus_solicitud = 1;
			$model->tipo_solicitud = 0;

		$this->render('listaSolicitudes',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Lista las solicitudes que están asignadas para que puedan
	 *  ser modificadas
	 * 
	 */
	public function actionListaSolicitudesModificar()
	{
		$model=new Solicitud('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Solicitud']))
			$model->attributes=$_GET['Solicitud'];
			$model->id_estatus_solicitud = 2;
			$model->tipo_solicitud = 0;

		$this->render('listaSolicitudesModificar',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Crea una asignación de vehículos y choferes según solicitud
	 * para la programación de actividades diarias
	 * 
	 */
	public function actionAsignarActividades($id_solicitud)
	{
		
		$solicitud=Solicitud::model()->findByPk($id_solicitud);
		if($solicitud===null)
			throw new CHttpException(404,'La Solicitud no existe.');
		/*$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Solicitud']))
			$model->attributes=$_GET['Solicitud'];
		*/
		$model=new RutaAsignada;
		if(Yii::app()->request->isPostRequest)
		{
			
			$transaction = Yii::app()->db->beginTransaction();
			try 
			{
				$model->id_solicitud = $solicitud->id;
				$model->save();
				
				$solicitud->id_estatus_solicitud = 2;	
				$solicitud->save();
				
				$postVehiculos = $_POST['vehiculos'];
				// Se debe validar que vehiculos no se nulo
				foreach($postVehiculos as $v)
				{
					$vra = new VehiculoRutaAsignada();
					$vra->id_vehiculo = $v;
					$vra->id_ruta_asignada = $model->id;
					$vra->save();					
				}
				
				$postChoferes = $_POST['choferes'];
				// Se debe validar que choferes no se nulo
				foreach($postChoferes as $c)
				{
					$cra = new ChoferRutaAsignada();
					$cra->id_chofer = $v;
					$cra->id_ruta_asignada = $model->id;
					$cra->save();					
				}
				$transaction->commit();
				Yii::app()->user->setFlash('success', '<strong>¡Asignado!</strong> Se asignó una nueva ruta con éxito');
				$this->redirect(array('listasolicitudes'));
			}
			catch (Exception $e)
			{
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
				$this->redirect(array('listasolicitudes'));
			}
		}		
		
			$this->render('asignarActividades',array(
			'model'=>$model,
			'solicitud'=>$solicitud,
		));
	}


	/**
	 * Crea una asignación de vehículos y choferes para
	 * una ruta estudiantil
	 * 
	 */
	public function actionAsignarRutaEstudiantil()
	{
		$model = new Solicitud;
		$rutaAsignada = new RutaAsignada;
		$vehiculos = new VehiculoRutaAsignada;
		$choferes = new ChoferRutaAsignada;
		
		$this->performAjaxValidation(array($model, $vehiculos, $choferes));
		
		
		if(Yii::app()->request->isPostRequest)
		{
			
			$transaction = Yii::app()->db->beginTransaction();
			try 
			{
			 	// Llenando datos de solicitud
				$model->attributes=$_POST['Solicitud'];
				$model->solicitante = 'Coordinación de Transporte';
				$model->responsable = 'Coordinación de Transporte';
				$model->n_personas = '50';
				$model->id_estatus_solicitud = 2;
				$model->tipo_solicitud = 1; // Ruta Estudiantil, 
				
				$postVehiculos = $_POST['VehiculoRutaAsignada'];
				$postVehiculos = $postVehiculos['id_vehiculo'];
				$vehiculos->id_ruta_asignada = $vehiculos->id_vehiculo = isset($postVehiculos[0])? 1:null;
				
				$postChoferes = $_POST['ChoferRutaAsignada'];
				$postChoferes = $postChoferes['id_chofer'];
				$choferes->id_ruta_asignada = $choferes->id_chofer = isset($postChoferes[0])? 1:null;
				//print_r($model);
				
				// Validando datos 
				$validate = $model->validate();
				$validate = $vehiculos->validate() && $validate;
				$validate = $choferes->validate() && $validate;
				
				if (!$validate)
					throw new Exception();
				
				$model->save(false);
				
				// Llenando datos de la asignación
				$rutaAsignada->id_solicitud = $model->id;
				$rutaAsignada->save(false);
				
				
				
				foreach($postVehiculos as $v)
				{
					$vra = new VehiculoRutaAsignada();
					$vra->id_vehiculo = $v;
					$vra->id_ruta_asignada = $rutaAsignada->id;
					$vra->save(false);					
				}
				
				
				foreach($postChoferes as $c)
				{
					$cra = new ChoferRutaAsignada();
					$cra->id_chofer = $v;
					$cra->id_ruta_asignada = $rutaAsignada->id;
					$cra->save(false);					
				}
				$transaction->commit();
				Yii::app()->user->setFlash('success', '<strong>¡Asignado!</strong> Se asignó una nueva ruta con éxito');
				$this->redirect(array('asignarrutaestudiantil'));
			}
			catch (Exception $e)
			{
				$transaction->rollBack();
				Yii::app()->user->setFlash('error', "{$e->getMessage()}");
			}
		}		
		
		$this->render('asignarRutaEstudiantil',array(
			'model'=>$model,
			'vehiculos'=>$vehiculos,
			'choferes'=>$choferes,
			//'solicitud'=>$solicitud,
		));
	}
	
	/* Recibe un arreglo con los datos de fecha de entrada, fecha de salida, 
     * hora de entrada, hora de salida para verificar la disponibilidad de 
     * vehiculos 
     **/
    public function actionAjaxListaVehiculos()
    {
		if (Yii::app()->request->isAjaxRequest)
		{
            if (Yii::app()->request->isPostRequest)
            {
				$solicitud = new Solicitud;
				$jsondata = trim(file_get_contents('php://input'));
				$s = CJSON::decode($jsondata);
				$solicitud->fecha_salida =  isset($s['fecha_salida'])?$s['fecha_salida']:null;
				$solicitud->fecha_llegada = isset($s['fecha_llegada'])?$s['fecha_llegada']:null;
				$solicitud->hora_salida = isset($s['hora_salida'])?$s['hora_salida']:null;
				$solicitud->hora_llegada = isset($s['hora_llegada'])?$s['hora_llegada']:null;
                //Yii::log(__METHOD__ . "HoraSalida ".$solicitud->fecha_salida."HoraLlegada ".$solicitud->fecha_llegada , "error");
                $vehiculos = RutaAsignada::getListaVehiculos($solicitud);
                
                $option = sprintf("<option value=''></option>");
               foreach($vehiculos as $id=>$v)
                {
					$option .= sprintf("<option value='%d'>%s</option>", $id, $v);
					
				}			
                
			}
		}
		echo $option;
	}
	
	
	/* Recibe un arreglo con los datos de fecha de entrada, fecha de salida, 
     * hora de entrada, hora de salida para verificar la disponibilidad de 
     * choferes 
     **/
    public function actionAjaxListaChoferes()
    {
		if (Yii::app()->request->isAjaxRequest)
		{
            if (Yii::app()->request->isPostRequest)
            {
				$solicitud = new Solicitud;
				$jsondata = trim(file_get_contents('php://input'));
				$s = CJSON::decode($jsondata);
				$solicitud->fecha_salida =  isset($s['fecha_salida'])?$s['fecha_salida']:null;
				$solicitud->fecha_llegada = isset($s['fecha_llegada'])?$s['fecha_llegada']:null;
				$solicitud->hora_salida = isset($s['hora_salida'])?$s['hora_salida']:null;
				$solicitud->hora_llegada = isset($s['hora_llegada'])?$s['hora_llegada']:null;
                //Yii::log(__METHOD__ . "HoraSalida ".$solicitud->fecha_salida."HoraLlegada ".$solicitud->fecha_llegada , "error");
                $vehiculos = RutaAsignada::getListaChoferes($solicitud);
                
                $option = sprintf("<option value=''></option>");
               foreach($vehiculos as $id=>$v)
                {
					$option .= sprintf("<option value='%d'>%s</option>", $id, $v);
					
				}			
                
			}
		}
		echo $option;
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RutaAsignada the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=RutaAsignada::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RutaAsignada $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ruta-asignada-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
