<?php

/**
 * This is the model class for table "vehiculo_ruta_asignada".
 *
 * The followings are the available columns in table 'vehiculo_ruta_asignada':
 * @property integer $id_vehiculo
 * @property integer $id_ruta_asignada
 * @property integer $id
 *
 * The followings are the available model relations:
 * @property RutaAsignada $idRutaAsignada
 * @property Vehiculo $idVehiculo
 */
class VehiculoRutaAsignada extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'vehiculo_ruta_asignada';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_vehiculo, id_ruta_asignada', 'required'),
			array('id_vehiculo, id_ruta_asignada', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_vehiculo, id_ruta_asignada, id', 'safe', 'on'=>'search'),
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
			'idRutaAsignada' => array(self::BELONGS_TO, 'RutaAsignada', 'id_ruta_asignada'),
			'idVehiculo' => array(self::BELONGS_TO, 'Vehiculo', 'id_vehiculo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vehiculo' => 'Vehiculos',
			'id_ruta_asignada' => 'Cláve foránea de la relación con la tabla rutas_asignadas',
			'id' => 'Identificador único de un registro en la tabla vehiculo_ruta_asignada',
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

		$criteria->compare('id_vehiculo',$this->id_vehiculo);
		$criteria->compare('id_ruta_asignada',$this->id_ruta_asignada);
		$criteria->compare('id',$this->id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VehiculoRutaAsignada the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
