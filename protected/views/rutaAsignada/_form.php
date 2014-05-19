<?php
/* @var $this RutaAsignadaController */
/* @var $model RutaAsignada */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'ruta-asignada-form',
    'htmlOptions'=>array('class'=>'well'),
	));
?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

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

	<div class="form-actions">
		<?php $submit = $model->isNewRecord ? 'Registrar' : 'Guardar'; ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$submit)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Limpiar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
