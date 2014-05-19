<?php

/**
 * This is the model class for table "chofer".
 *
 * The followings are the available columns in table 'chofer':
 * @property integer $id
 * @property string $nombre
 * @property string $cedula
 * @property integer $id_tipo_chofer
 * @property integer $id_estatus_chofer
 *
 * The followings are the available model relations:
 * @property ChoferRutaAsignada[] $choferRutaAsignadas
 * @property EstatusChofer $idEstatusChofer
 * @property TipoChofer $idTipoChofer
 */
class Chofer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chofer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, cedula, id_tipo_chofer, id_estatus_chofer', 'required'),
			array('id_tipo_chofer, id_estatus_chofer', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>256),
			array('cedula', 'length', 'max'=>16),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, cedula, id_tipo_chofer, id_estatus_chofer', 'safe', 'on'=>'search'),
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
			'choferRutaAsignadas' => array(self::HAS_MANY, 'ChoferRutaAsignada', 'id_chofer'),
			'idEstatusChofer' => array(self::BELONGS_TO, 'EstatusChofer', 'id_estatus_chofer'),
			'idTipoChofer' => array(self::BELONGS_TO, 'TipoChofer', 'id_tipo_chofer'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identificador único de chofer',
			'nombre' => 'Nombres y apellidos',
			'cedula' => 'Cédula de identidad',
			'id_tipo_chofer' => 'Tipo',
			'id_estatus_chofer' => 'Estatus',
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
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('id_tipo_chofer',$this->id_tipo_chofer);
		$criteria->compare('id_estatus_chofer',$this->id_estatus_chofer);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Chofer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getListaTipoChofer()
    {
		return TipoChofer::model()->findAll();
    }
    
    public function getListaEstatusChofer()
    {
		return EstatusChofer::model()->findAll();
    }
}
