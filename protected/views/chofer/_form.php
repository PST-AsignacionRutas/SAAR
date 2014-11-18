<?php
/* @var $this ChoferController */
/* @var $model Chofer */
/* @var $form CActiveForm */
?>

<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'chofer-form',
    'type'=>'horizontal',
    'htmlOptions'=>array('class'=>'well'),
    'enableAjaxValidation'=>true,
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
	
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'cedula', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php
		//if ($model->isNewRecord):
			$this->widget('CMaskedTextField', array(
					'model' => $model,
					//'value' => $model->isNewRecord ? $model->your_attribute_name : '',
					'attribute' => 'cedula',
					'mask' => 'N-MXmmmmm?m',
					'charMap' => array('N'=>'[V,E]','M'=>'[1-9]','X'=>'[0-9]','m'=>'[0-9]'),
					'htmlOptions' => array('class'=>'span2', 'maxlength'=>16)
					)
			);
		
		?>
		<?php echo $form->error($model,'cedula'); ?>
		<p class="help-block">Cédula de identidad del chofer (requerido). Ejm: V-4258228</p>
		<?php 	
			/*else:
				echo $model->cedula;
			endif;*/
		?>
        </div> 
    </div>
    
	<?php echo $form->textFieldRow($model, 'nombre', array('class'=>'span3','maxlength'=>256,
								'hint'=>'Nombres y apellidos del chofer (requerido)')); ?>

	<?php //echo $form->textFieldRow($model, 'cedula', array('class'=>'span2','maxlength'=>16,
								//'hint'=>'Cédula de identidad del chofer (requerido)')); ?>


	<?php echo $form->dropDownListRow($model, 'id_tipo_chofer',
										CHtml::listData($model->getListaTipoChofer(),'id','tipo'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el tipo de chofer (requerido)')); ?>

	<?php echo $form->dropDownListRow($model, 'id_estatus_chofer',
										CHtml::listData($model->getListaEstatusChofer(),'id','estatus'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el estatus del chofer (requerido)')); ?>

	<div class="form-actions">
		<?php $submit = $model->isNewRecord ? 'Registrar' : 'Actualizar'; ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$submit)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Limpiar')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
