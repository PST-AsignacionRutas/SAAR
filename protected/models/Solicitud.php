<?php

/**
 * This is the model class for table "solicitud".
 *
 * The followings are the available columns in table 'solicitud':
 * @property integer $id
 * @property string $fecha_salida
 * @property string $fecha_llegada
 * @property string $hora_salida
 * @property string $hora_llegada
 * @property string $lugar_encuentro
 * @property integer $id_destino
 * @property integer $id_estatus_solicitud
 * @property string $solicitante
 *
 * The followings are the available model relations:
 * @property Destino $idDestino
 * @property EstatusSolicitud $idEstatusSolicitud
 * @property RutaAsignada[] $rutaAsignadas
 */
class Solicitud extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitud';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_salida, fecha_llegada, id_destino, id_estatus_solicitud, solicitante, responsable, n_personas, hora_salida, hora_llegada,', 'required'),
			array('id_destino, id_estatus_solicitud, n_personas', 'numerical', 'integerOnly'=>true),
			array('solicitante', 'length', 'max'=>256),
			array('responsable', 'length', 'max'=>256),
			array('n_personas', 'length', 'max'=>3),
			array('hora_salida, hora_llegada, lugar_encuentro, lugar_encuentro_llegada, observaciones, recorrido', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fecha_salida, fecha_llegada, hora_salida, hora_llegada, lugar_encuentro, id_destino, id_estatus_solicitud, solicitante', 'safe', 'on'=>'search'),
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
			'idDestino' => array(self::BELONGS_TO, 'Destino', 'id_destino'),
			'idEstatusSolicitud' => array(self::BELONGS_TO, 'EstatusSolicitud', 'id_estatus_solicitud'),
			'rutaAsignadas' => array(self::HAS_ONE, 'RutaAsignada', 'id_solicitud'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			//'id' => 'Identificador único de la solicitud',
			'id' => 'Nº de Solicitud',
			//'fecha_salida' => 'Fecha probable de salida según solicitud',
			'fecha_salida' => 'Fecha de salida',
			//'fecha_llegada' => 'Fecha probable de llegada según solicitud',
			'fecha_llegada' => 'Fecha de llegada',
			'hora_salida' => 'Hora de salida',
			//'hora_salida' => 'Hora de salida estimada según solicitud',
			'hora_llegada' => 'Hora de llegada',
			//'hora_llegada' => 'Hora de llegada según solicitud',
			//'lugar_encuentro' => 'Lugar de encuentro de los beneficiarios del servicio de ruta para la salida',
			'lugar_encuentro' => 'Lugar de encuentro de salida',
			//'id_destino' => 'Cláve foránea de la relación con la tabla destinos',
			'id_destino' => 'Destino',
			//'id_estatus_solicitud' => 'Cláve foránea de la relación con la tabla estatus_solicitud',
			'id_estatus_solicitud' => 'Estatus',
			//'solicitante' => 'Nombre de la persona o departamento solicitante',
			'solicitante' => 'Departamento',
			'responsable'=>'Responsable',
			'lugar_encuentro_llegada' => 'Lugar de encuentro de llegada',
			'n_personas'=> 'Nº de personas',
			'observaciones'=> 'Motivo',
			'recorrido'=> 'Recorrido del viaje',			
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
		$criteria->compare('fecha_salida',$this->fecha_salida,true);
		$criteria->compare('fecha_llegada',$this->fecha_llegada,true);
		$criteria->compare('hora_salida',$this->hora_salida,true);
		$criteria->compare('hora_llegada',$this->hora_llegada,true);
		$criteria->compare('lugar_encuentro',$this->lugar_encuentro,true);
		$criteria->compare('id_destino',$this->id_destino);
		$criteria->compare('id_estatus_solicitud',$this->id_estatus_solicitud);
		$criteria->compare('solicitante',$this->solicitante,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solicitud the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Devuelve una lista con los destinos
	 * @return Lista de modelos de vehículos
	 */
    public function getListaDestino()
    {
		return Destino::model()->findAll();
    }
    
    /**
	 * Devuelve una lista con los estatus de solicitudes
	 * @return Lista de modelos de vehículos
	 */
    public function getListaEstatusSolicitud()
    {
		return EstatusSolicitud::model()->findAll();
    }
    
    public function afterFind()
	{
		$this->hora_llegada = date("g:i A", strtotime($this->hora_llegada));
		$this->hora_salida = date("g:i A", strtotime($this->hora_salida));
		
		$this->fecha_salida=Yii::app()->dateFormatter->format('dd-MM-yyyy',CDateTimeParser::parse($this->fecha_salida,"yyyy-MM-dd"));
		$this->fecha_llegada=Yii::app()->dateFormatter->format('dd-MM-yyyy',CDateTimeParser::parse($this->fecha_llegada,"yyyy-MM-dd")); 
		parent::afterFind();
	}
}
