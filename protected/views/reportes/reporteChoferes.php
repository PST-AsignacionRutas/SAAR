
<h1>Reporte Listado de Choferes</h1>
<?php
	$solicitantes = array();
	$solicitantes['Coordinación de Transporte'] = 'Coordinación de Transporte';

?>
<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'chofer-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'htmlOptions'=>array('class'=>'well', 'target'=>'_blank'),
	));
?>

	<div class="control-group">
		<?php echo $form->label($model,'nombre', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>256)); ?>
		<p class="help-block">Nombres y apellidos del chofer</p>
        </div> 
    </div>
	
	<div class="control-group">
		<?php echo $form->label($model,'cedula', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->textField($model,'cedula',array('size'=>16,'maxlength'=>16)); ?>
		<p class="help-block">Cédula de identidad del chofer</p>
        </div> 
    </div>

	<div class="control-group">
		<?php echo $form->label($model,'id_tipo_chofer', array('class'=>'control-label')); ?>
		<div class="controls">
			
		<?php
		echo $form->dropDownList($model, 'id_tipo_chofer',
										CHtml::listData($model->getListaTipoChofer(),'id','tipo'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el tipo de chofer'));
		?>
		<p class="help-block">Seleccione el tipo de chofer</p>
        </div> 
    </div>

	<div class="control-group">
		<?php echo $form->label($model,'id_estatus_chofer', array('class'=>'control-label')); ?>
		<div class="controls">
			
		<?php
		echo $form->dropDownList($model, 'id_estatus_chofer',
										CHtml::listData($model->getListaEstatusChofer(),'id','estatus'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el estatus del chofer'));
		?>
		<p class="help-block">Seleccione el estatus del chofer</p>
        </div> 
    </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Imprimir')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 
									'label'=>'Cancelar',
									'url'=>array('site/page', 'view'=>'Bienvenida'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
