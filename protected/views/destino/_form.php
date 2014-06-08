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
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'htmlOptions'=>array('class'=>'well'),
	));
?>

	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>
	<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
		'fade'=>true, // use transitions?
        //'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        /*'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),*/
    )); 
	?>
	
	<?php //echo $form->errorSummary($model); ?>

	<?php
	if ($model->isNewRecord):
		echo $form->textFieldRow($model, 'nombre', array('class'=>'span3','maxlength'=>256,
								'hint'=>'Nombre del destino (requerido)')); 
	else:
		echo $form->textFieldRow($model, 'nombre', array('class'=>'span3','maxlength'=>256,
								'hint'=>'Nombre del destino (requerido)',
								'readonly'=>'readonly')); 
	endif;
	?>
	
	
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
