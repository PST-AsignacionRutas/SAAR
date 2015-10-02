<?php
/* @var $this RutaAsignadaController */
/* @var $model RutaAsignada */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'htmlOptions'=>array('class'=>'well'),
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

<?php if (!isset($cancelar) || $cancelar != true):?>
	<div class="row">
		<?php echo $form->label($model,'fecha_salida'); ?>
		<?php echo $form->textField($model,'fecha_salida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_llegada'); ?>
		<?php echo $form->textField($model,'fecha_llegada'); ?>
	</div>
<?php endif;?>
	
	<div class="row">
		<?php echo $form->label($model,'responsable'); ?>
		<?php echo $form->textField($model,'responsable'); ?>
	</div>
	
<!--
	<div class="row">
		<?php echo $form->label($model,'hora_salida'); ?>
		<?php echo $form->textField($model,'hora_salida'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hora_llegada'); ?>
		<?php echo $form->textField($model,'hora_llegada'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'id_solicitud'); ?>
		<?php //echo $form->textField($model,'id_solicitud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_destino'); ?>
		<?php echo $form->textField($model,'id_destino'); ?>
	</div>
-->	

<!--
	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>
-->
<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Buscar')); ?>
	</div>
<?php $this->endWidget(); ?>

</div><!-- search-form -->
