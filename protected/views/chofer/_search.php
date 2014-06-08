<?php
/* @var $this ChoferController */
/* @var $model Chofer */
/* @var $form CActiveForm */
?>

<div class="wide form">


<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'htmlOptions'=>array('class'=>'well'),
    'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
	));
?>
<!--
	<div class="row">
		<?php //echo $form->label($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cedula'); ?>
		<?php echo $form->textField($model,'cedula',array('size'=>16,'maxlength'=>16)); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->label($model,'id_tipo_chofer'); ?>
		<?php echo $form->textField($model,'id_tipo_chofer'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'id_estatus_chofer'); ?>
		<?php //echo $form->textField($model,'id_estatus_chofer'); ?>
	</div>
-->
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Buscar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
