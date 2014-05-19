<?php
/* @var $this RutaAsignadaController */
/* @var $model RutaAsignada */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ruta-asignada-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_salida'); ?>
		<?php echo $form->textField($model,'fecha_salida'); ?>
		<?php echo $form->error($model,'fecha_salida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_llegada'); ?>
		<?php echo $form->textField($model,'fecha_llegada'); ?>
		<?php echo $form->error($model,'fecha_llegada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hora_salida'); ?>
		<?php echo $form->textField($model,'hora_salida'); ?>
		<?php echo $form->error($model,'hora_salida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hora_llegada'); ?>
		<?php echo $form->textField($model,'hora_llegada'); ?>
		<?php echo $form->error($model,'hora_llegada'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_solicitud'); ?>
		<?php echo $form->textField($model,'id_solicitud'); ?>
		<?php echo $form->error($model,'id_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_destino'); ?>
		<?php echo $form->textField($model,'id_destino'); ?>
		<?php echo $form->error($model,'id_destino'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->