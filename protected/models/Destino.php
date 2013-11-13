<?php

/**
 * This is the model class for table "destino".
 *
 * The followings are the available columns in table 'destino':
 * @property integer $id
 * @property string $nombre
 * @property integer $id_tipo_destino
 *
 * The followings are the available model relations:
 * @property Solicitud[] $solicituds
 * @property TipoDestino $idTipoDestino
 * @property RutaAsignada[] $rutaAsignadas
 */
class Destino extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'destino';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, id_tipo_destino', 'required'),
			array('id_tipo_destino', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, id_tipo_destino', 'safe', 'on'=>'search'),
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
			'solicituds' => array(self::HAS_MANY, 'Solicitud', 'id_destino'),
			'idTipoDestino' => array(self::BELONGS_TO, 'TipoDestino', 'id_tipo_destino'),
			'rutaAsignadas' => array(self::HAS_MANY, 'RutaAsignada', 'id_destino'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identificador único del destino',
			'nombre' => 'Nombre del destino',
			'id_tipo_destino' => 'Identificador único del tipo de destino',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('id_tipo_destino',$this->id_tipo_destino);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Destino the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
