<?php
/* @var $this DestinoController */
/* @var $model Destino */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'destino-form',
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
	));
?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>

	<?php //echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model, 'nombre', array('class'=>'span3','maxlength'=>256,
								'hint'=>'Nombre del destino (requerido)')); ?>

	
	<?php echo $form->dropDownListRow($model, 'id_tipo_destino',
								CHtml::listData($model->getListaTipoDestino(),'id','tipo'),
								array('empty' => 'Seleccione...',
								'hint'=>'Seleccione el tipo de destino (requerido)')); ?>
	

	<div class="form-actions">
		<?php $submit = $model->isNewRecord ? 'Registrar' : 'Actualizar'; ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$submit)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Limpiar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
