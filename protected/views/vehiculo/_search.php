<?php
/* @var $this VehiculoController */
/* @var $model Vehiculo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'htmlOptions'=>array('class'=>'well'),
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<!-- <div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div> -->

	<div class="row">
		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textField($model,'numero',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'placa'); ?>
		<?php echo $form->textField($model,'placa',array('size'=>16,'maxlength'=>16)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serial_carroceria'); ?>
		<?php echo $form->textField($model,'serial_carroceria',array('size'=>32,'maxlength'=>32)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'anio'); ?>
		<?php echo $form->textField($model,'anio',array('size'=>4,'maxlength'=>4)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'color'); ?>
		<?php echo $form->textField($model,'color',array('size'=>32,'maxlength'=>32)); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->label($model,'n_puestos'); ?>
		<?php echo $form->textField($model,'n_puestos'); ?>
	</div> -->
<!-- 
	<div class="row">
		<?php echo $form->label($model,'id_tipo_vehiculo'); ?>
		<?php echo $form->textField($model,'id_tipo_vehiculo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_estatus_vehiculo'); ?>
		<?php echo $form->textField($model,'id_estatus_vehiculo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_modelo'); ?>
		<?php echo $form->textField($model,'id_modelo'); ?>
	</div>
-->
	<!-- <div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div> -->
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
