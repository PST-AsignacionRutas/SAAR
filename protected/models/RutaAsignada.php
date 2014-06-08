<?php

/**
 * This is the model class for table "ruta_asignada".
 *
 * The followings are the available columns in table 'ruta_asignada':
 * @property integer $id
 * @property string $fecha_salida
 * @property string $fecha_llegada
 * @property string $hora_salida
 * @property string $hora_llegada
 * @property integer $id_solicitud
 * @property integer $id_destino
 *
 * The followings are the available model relations:
 * @property VehiculoRutaAsignada[] $vehiculoRutaAsignadas
 * @property Destino $idDestino
 * @property Solicitud $idSolicitud
 * @property ChoferRutaAsignada[] $choferRutaAsignadas
 */
class RutaAsignada extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ruta_asignada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			/*array('fecha_salida, fecha_llegada, id_solicitud, id_destino', 'required'),
			array('id_solicitud, id_destino', 'numerical', 'integerOnly'=>true),
			array('hora_salida, hora_llegada', 'safe'),*/
			array('id_solicitud', 'required'),
			array('id_solicitud', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id, fecha_salida, fecha_llegada, hora_salida, hora_llegada, id_solicitud, id_destino', 'safe', 'on'=>'search'),
			array('id, id_solicitud', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'vehiculoRutaAsignadas' => array(self::HAS_MANY, 'VehiculoRutaAsignada', 'id_ruta_asignada'),
			'idDestino' => array(self::BELONGS_TO, 'Destino', 'id_destino'),
			'idSolicitud' => array(self::BELONGS_TO, 'Solicitud', 'id_solicitud'),
			'choferRutaAsignadas' => array(self::HAS_MANY, 'ChoferRutaAsignada', 'id_ruta_asignada'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identificador único de la ruta asignada',
			'id_solicitud' => 'Cláve foránea de la relación con la tabla solicitudes',
			/*'fecha_salida' => 'Fecha de salida',
			'fecha_llegada' => 'Fecha de llegada',
			'hora_salida' => 'Hora de salida',
			'hora_llegada' => 'Hora de llegada',
			'id_destino' => 'Cláve foránea de la relación con la tabla destinos',*/
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('id_solicitud',$this->id_solicitud);
		/*
		$criteria->compare('fecha_salida',$this->fecha_salida,true);
		$criteria->compare('fecha_llegada',$this->fecha_llegada,true);
		$criteria->compare('hora_salida',$this->hora_salida,true);
		$criteria->compare('hora_llegada',$this->hora_llegada,true);
		
		$criteria->compare('id_destino',$this->id_destino);*/

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RutaAsignada the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getListaVehiculos($solicitud)
    {
		//Se debe filtrar por el estatus de vehículo
		// e incluso se puede filtrar por los que están disponibles de acuerdo a la solicitud
		$vehiculos = Vehiculo::model()->findAll('id_estatus_vehiculo=:estatus', array(':estatus' => 1));
		 
		$lista = array();
		foreach($vehiculos as $v) 
		{
			$lista[$v->id] = $v->numero." ".$v->placa." ".$v->idModelo->idMarca->marca." ".$v->idModelo->modelo." ".$v->idTipoVehiculo->tipo;
		}
		
		$solicitudes = Solicitud::model()->findAll('id_estatus_solicitud=:estatus', array(':estatus'=>2));
		$sFechaSalida = date('Y-m-d', strtotime($solicitud->fecha_salida));
		$sFechaLlegada = date('Y-m-d', strtotime($solicitud->fecha_llegada));
		$sHoraSalida = strtotime($solicitud->hora_salida);
		$sHoraLlegada = strtotime($solicitud->hora_llegada);
		$vOcupados = array();
		foreach($solicitudes as $s)
		{	
			$vFechaSalida = date('Y-m-d', strtotime($s->fecha_salida));
			$vFechaLlegada = date('Y-m-d', strtotime($s->fecha_llegada));
			if (((($sFechaSalida > $vFechaSalida) && ($sFechaSalida < $vFechaLlegada))
			|| (($sFechaLlegada > $vFechaSalida) && ($sFechaLlegada < $vFechaLlegada))
			|| (($vFechaSalida > $sFechaSalida) && ($vFechaSalida < $sFechaLlegada))
			|| (($vFechaLlegada > $sFechaSalida) && ($vFechaLlegada < $sFechaLlegada))
			))			
			{
				foreach($s->rutaAsignadas->vehiculoRutaAsignadas as $v)
				{
					$vOcupados[$v->id_vehiculo] = $v->id_vehiculo;
				}
			}
			
			$vHoraSalida = strtotime($s->hora_salida);
			$vHoraLlegada = strtotime($s->hora_llegada);
			if (($sFechaSalida = $vFechaSalida) && ($sFechaLlegada = $vFechaLlegada)
			&& ((($sHoraSalida >= $vHoraSalida) && ($sHoraSalida <= $vHoraLlegada))
			|| (($sHoraLlegada >= $vHoraSalida) && ($sHoraLlegada <= $vHoraLlegada))
			|| (($vHoraSalida >= $sHoraSalida) && ($vHoraSalida <= $sHoraLlegada))
			|| (($vHoraLlegada >= $sHoraSalida) && ($vHoraLlegada <= $sHoraLlegada))))
			{
				foreach($s->rutaAsignadas->vehiculoRutaAsignadas as $v)
				{
					$vOcupados[$v->id_vehiculo] = $v->id_vehiculo;
				}
			}
		}
		
		foreach($vOcupados as $vId)
		{
			unset($lista[$vId]);
		}
		//print_r($vOcupados);
		//exit(1);
		return $lista;
    }
    
    public function getListaChoferes($solicitud)
    {
		//Se debe filtrar por el estatus de vehículo
		// e incluso se puede filtrar por los que están disponibles de acuerdo a la solicitud
		$choferes = Chofer::model()->findAll('id_estatus_chofer=:estatus', array(':estatus' => 1));
		 
		$lista = array();
		foreach ($choferes as $c) {
			$lista[$c->id] = $c->cedula." ".$c->nombre." ".$c->idTipoChofer->tipo;
		}
		
		return $lista;
    }
}
