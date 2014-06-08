<?php

/**
 * This is the model class for table "vehiculo".
 *
 * The followings are the available columns in table 'vehiculo':
 * @property integer $id
 * @property string $numero
 * @property string $placa
 * @property string $serial_carroceria
 * @property string $anio
 * @property string $color
 * @property integer $n_puestos
 * @property integer $id_tipo_vehiculo
 * @property integer $id_estatus_vehiculo
 * @property integer $id_modelo
 *
 * The followings are the available model relations:
 * @property VehiculoRutaAsignada[] $vehiculoRutaAsignadas
 * @property EstatusVehiculo $idEstatusVehiculo
 * @property VehiculoModelo $idModelo
 * @property TipoVehiculo $idTipoVehiculo
 */
class Vehiculo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehiculo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('placa, id_tipo_vehiculo, id_estatus_vehiculo, id_modelo, n_puestos', 'required', "message"=>"El campo no debe estar en blanco"),
			array('n_puestos, id_tipo_vehiculo, id_estatus_vehiculo, id_modelo, anio, numero', 'numerical', 'integerOnly'=>true),
			array('numero, placa', 'length', 'max'=>16),
			array('serial_carroceria, color', 'length', 'max'=>32),
			array('anio', 'length', 'max'=>4),
			array('color', 'match',
				'pattern' => '/^[a-zA-Z\s]+$/',
				//'color' => 'color debe estar escrito en letras',
			),
			array('placa', 'placaUnica', 'on'=>'insert'),
			array('placa', 'unsafe', 'on'=>'update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, numero, placa, serial_carroceria, anio, color, n_puestos, id_tipo_vehiculo, id_estatus_vehiculo, id_modelo', 'safe', 'on'=>'search'),
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
			'vehiculoRutaAsignadas' => array(self::HAS_MANY, 'VehiculoRutaAsignada', 'id_vehiculo'),
			'idEstatusVehiculo' => array(self::BELONGS_TO, 'EstatusVehiculo', 'id_estatus_vehiculo'),
			'idModelo' => array(self::BELONGS_TO, 'VehiculoModelo', 'id_modelo'),
			'idTipoVehiculo' => array(self::BELONGS_TO, 'TipoVehiculo', 'id_tipo_vehiculo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			/*'id' => 'Identificador único para el vehículo',
			'numero' => 'Número de identificación del vehículo. ',
			'placa' => 'Placas identificadoras del vehículo ante el registro de Tránsito Terrestre',
			'serial_carroceria' => 'Serial de carrocería del vehículo',
			'anio' => 'Año del modelo del vehículo',
			'color' => 'Color del vehículo',
			'n_puestos' => 'Número de puestos para pasajeros del vehículo',
			'id_tipo_vehiculo' => 'Id Tipo Vehiculo',
			'id_estatus_vehiculo' => 'Id Estatus Vehiculo',
			'id_modelo' => 'Id Modelo',*/
			'id' => 'Identificador único para el vehículo',
			'numero' => 'Número',
			'placa' => 'Placas',
			'serial_carroceria' => 'Serial de carrocería',
			'anio' => 'Año',
			'color' => 'Color',
			'n_puestos' => 'Nº de puestos',
			'id_tipo_vehiculo' => 'Tipo',
			'id_estatus_vehiculo' => 'Estatus',
			'id_modelo' => 'Modelo',
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
		$criteria->compare('numero',$this->numero,true);
		$criteria->compare('placa',$this->placa,true);
		$criteria->compare('serial_carroceria',$this->serial_carroceria,true);
		$criteria->compare('anio',$this->anio,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('n_puestos',$this->n_puestos);
		$criteria->compare('id_tipo_vehiculo',$this->id_tipo_vehiculo);
		$criteria->compare('id_estatus_vehiculo',$this->id_estatus_vehiculo);
		$criteria->compare('id_modelo',$this->id_modelo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vehiculo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	/**
	 * Devuelve una lista de los tipos de vehículos
	 * @return Lista de tipo de vehículos
	 */
	public function getListaTipoVehiculo()
    {
		return TipoVehiculo::model()->findAll();
    }
    
    /**
	 * Devuelve una lista de los estatus de vehículos
	 * @return Lista de estatus de vehículos
	 */
    public function getListaEstatusVehiculo()
    {		
		return EstatusVehiculo::model()->findAll();
    }
    
    /**
	 * Devuelve una lista de los modelos de vehículos
	 * @return Lista de modelos de vehículos
	 */
    public function getListaModeloVehiculo()
    {
		$criterios = new CDbCriteria;
		//$criterios->select="t.id, concat(t.modelo,'@',m.marca)as marcamodelo";
		$criterios->select="t.id, t.modelo";
		$criterios->with=array(
					'idMarca' => array(
                        'select' => 'marca',
					),
		);
		//$criterios->together = true;
		//$criterios->condition="id_marca = idMarca.id";
		//$criterios->join=" INNER JOIN vehiculo_marca m on m.id=t.id_marca";
		//$criterios->compare("t.id_dominio",$idDominio,true);
		$marcamodelos = VehiculoModelo::model()->findAll($criterios);
		 
		$lista = array();
		foreach ($marcamodelos as $mm) {
			$lista[$mm->id] = $mm->idMarca->marca . '-' . $mm->modelo;
		}
		
		return $lista;
    }
    
    public function placaUnica($attribute, $params)
    {
		$existe = Vehiculo::model()->findByAttributes(array('placa'=>$this->placa));
		//Yii::log('Cedula ' . $existe->nombre);
		if ($existe!=null)
			$this->addError('placa', 'Esta placa ya se encuentra registrada');
	}
}
