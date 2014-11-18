<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>
<h1>Reporte Programación Actividades Diarias</h1>
<?php
	$solicitantes = array();
	$solicitantes['Coordinación de Transporte'] = 'Coordinación de Transporte';
	
	if ($model->isNewRecord)
	{
		$model->hora_salida="8:00 AM";
		$model->hora_llegada="6:00 PM";
	}
?>
<div class="form">

<?php 
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'solicitud-form',
    'type'=>'horizontal',
    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'htmlOptions'=>array('class'=>'well', 'target'=>'_blank'),
	));
?>

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
		
	?>
	
	<div class="control-group">
		<?php echo CHtml::activeLabel($model,'solicitante', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php
		echo $form->dropDownList($model, 'solicitante',
										$solicitantes,
										array('empty' => 'Seleccione...',
										'hint'=>'Nombre del departamento solicitante (requerido)'));
		?>
		<p class="help-block">Filtrar por departamento solicitante</p>
        <?php echo $form->error($model,'fecha_salida'); ?>
        </div> 
    </div>

	<div class="control-group">
		<?php echo CHtml::activeLabel($model,'fecha_salida', array('class'=>'control-label')); ?>
		<div class="controls">
		<span class="add-on"><i class="icon-calendar"></i></span>
        <?php                    
        
        $this->widget('CJuiDatePicker',array(
                'language'=>'es',
                'model'=>$model,                                // Model object
                'attribute'=>'fecha_salida', // Attribute name
                //'mode'=>'datetime',                     // Use "time","date" or "datetime" (default)
                'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					//'minDate'=>'0',
					'changeMonth'=>true,
					'changeYear'=>true,
					'onClose'=>"js: function( selectedDate ) {
							sDate = selectedDate.split('-');
							selectedDate = sDate[2]+'-'+sDate[1]+'-'+sDate[0];
							var dateCheckout = new Date(Date.parse(selectedDate));
							//alert(''+selectedDate);
							dateCheckout.setDate(dateCheckout.getDate() + 1);
							$('#Solicitud_fecha_llegada').datepicker( 'option', 'minDate', dateCheckout);
							$('#Solicitud_fecha_llegada').datepicker( 'setDate', dateCheckout);
					}",
                ),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'size'=>10, 'class'=>'input-small') // HTML options
        ));
        ?>
		<p class="help-block">Filtrar por fecha de salida</p>
        <?php echo $form->error($model,'fecha_salida'); ?>
        </div> 
    </div>

 	<div class="control-group">
		<?php echo CHtml::activeLabel($model,'fecha_llegada', array('class'=>'control-label')); ?>
		
		<div class="controls">
		<span class="add-on"><i class="icon-calendar"></i></span>
        <?php                    
        
        $this->widget('CJuiDatePicker',array(
                'language'=>'es',
                'model'=>$model,                                // Model object
                'attribute'=>'fecha_llegada', // Attribute name
                //'mode'=>'datetime',                     // Use "time","date" or "datetime" (default)
                'options'=>array(
					'dateFormat'=>'dd-mm-yy',
					'changeMonth'=>true,
					'changeYear'=>true,
                ),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'size'=>10, 'class'=>'input-small') // HTML options
        ));                             
        ?> 
		<p class="help-block">Filtrar por fecha de llegada</p>
		<?php echo $form->error($model,'fecha_llegada'); ?>
        </div>
    </div>
	
	<div class="control-group">
		<?php echo CHtml::activeLabel($model,'id_destino', array('class'=>'control-label')); ?>
		<div class="controls">
		<?php echo $form->dropDownList($model, 'id_destino',
										CHtml::listData($model->getListaDestino(),'id','nombre'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el destino para la actividad')
										); ?>
		<p class="help-block">Filtrar por destino</p>
        <?php echo $form->error($model,'id_destino'); ?>
        </div> 
    </div>
	
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Imprimir')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
