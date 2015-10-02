<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>

<?php
	$solicitantes = array();
	$solicitantes['Coordinación de Transporte'] = 'Coordinación de Transporte';
	$solicitantes['Dirección de Talento Humano'] = 'Dirección de Talento Humano';
	$solicitantes['Dirección General Socioacadémica'] = 'Dirección General Socioacadémica';
	$solicitantes['Dirección de Presupuesto'] = 'Dirección de Presupuesto';
	$solicitantes['Dirección de Servicios Administrativos'] = 'Dirección de Servicios Administrativos';
	$solicitantes['Rectorado'] = 'Rectorado';
	$solicitantes['Vicerrectorado Académico'] = 'Vicerrectorado Académico';
	$solicitantes['Vicerrectorado de Desarrollo Territorial'] = 'Vicerrectorado de Desarrollo Territorial';
	$solicitantes['Secretaría General'] = 'Secretaría General';
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
		echo $form->dropDownListRow($model, 'solicitante',
										$solicitantes,
										array('empty' => 'Seleccione...',
										'hint'=>'Nombre del departamento solicitante (requerido)'));
	
	//echo $form->textFieldRow($model,'solicitante',array('size'=>60,'maxlength'=>256, 'hint'=>'Nombre del departamento solicitante (requerido)')); 
	?>
	
	<?php 	
		echo $form->textFieldRow($model,'responsable',array('size'=>60,'maxlength'=>256, 'hint'=>'Nombres y apellidos de la persona responsable de la solicitud (requerido)')); 
	?>
	
	<div class="control-group">
		<?php echo $form->labelEx($model,'fecha_salida', array('class'=>'control-label')); ?>
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
					'minDate'=>'0',
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
        <span class="add-on"><i class="icon-time"></i></span>
        <?php
		/*$this->widget('CMaskedTextField', array(
				'model' => $model,
				//'value' => $model->isNewRecord ? $model->your_attribute_name : '',
				'attribute' => 'hora_salida',
				'mask' => 'H:M',
				'charMap' => array('H'=>'[1-12]', 'h'=>'[0-]', 'M'=>'[0-5]','h'=>'[0-3]'),
				'htmlOptions' => array('size' => 5, 'class'=>'input-mini')
				)
		);*/
		?>
		<?php
		$this->widget('application.extensions.jui_timepicker.JTimePicker', array(
				'model'=>$model,
				'attribute'=>'hora_salida',
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showPeriod'=>true,
					'showLeadingZero'=>false,
					// Localization
					'hourText'=> 'Hora',             // Define the locale text for "Hours"
					'minuteText'=> 'Minutos',         // Define the locale text for "Minute"
					'amPmText'=>['AM', 'PM'],
					/*'onSelect'=>'js:tpStartSelect',*/
					'onClose'=>"js: function(){ 
						jQuery('#Solicitud_hora_llegada').timepicker('setTime', $('#Solicitud_hora_salida').timepicker('getTime'));
					}"
					//'defaultTime'=>'12:34',       // Define the locale text for periods
					// custom hours and minutes
					/*'hours'=>array(
						'starts'=>'1',                // First displayed hour
						'ends'=>'12',                  // Last displayed hour
					),*/
					/*'minutes'=>array(
						'starts'=>'0',                // First displayed minute
						'ends'=>'55',                 // Last displayed minute
						'interval'=>'5',              // Interval of displayed minutes
						//manual: []                // Optional extra entries for minutes
					),*/
				),
				'htmlOptions'=>array('size' => 5, 'class'=>'input-mini', 'readonly'=>true),
		 ));
?>
		<p class="help-block">Fecha y hora probable de salida (requerido)</p>
        <?php echo $form->error($model,'fecha_salida'); ?>
        </div> 
    </div>
	<?php //echo $form->textFieldRow($model, 'fecha_salida', array('class'=>'input-small', 'prepend'=>'<i class="icon-calendar"></i>')); ?>


 	<div class="control-group">
		<?php echo $form->labelEx($model,'fecha_llegada', array('class'=>'control-label')); ?>
		
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
					'onClose'=>"js: function( selectedDate ) {
							jQuery('#Solicitud_hora_llegada').val(jQuery('#Solicitud_hora_salida').val());
					}",
                ),                     // jquery plugin options
                'htmlOptions'=>array('readonly'=>true, 'size'=>10, 'class'=>'input-small') // HTML options
        ));                             
        ?> 
        <span class="add-on"><i class="icon-time"></i></span>
		<?php
		/*$this->widget('CMaskedTextField', array(
				'model' => $model,
				//'value' => $model->isNewRecord ? $model->your_attribute_name : '',
				'attribute' => 'hora_llegada',
				'mask' => 'hh:mm',
				'charMap' => array('h'=>'[0-23]','m'=>'[0-59]'),
				'htmlOptions' => array('size' => 5, "class"=>'input-mini')
				)
		);*/
		?>
		<?php
		$this->widget('application.extensions.jui_timepicker.JTimePicker', array(
				'model'=>$model,
				'attribute'=>'hora_llegada',
				// additional javascript options for the date picker plugin
				'options'=>array(
					'showPeriod'=>true,
					'showLeadingZero'=>false,
					// Localization
					'hourText'=> 'Hora',             // Define the locale text for "Hours"
					'minuteText'=> 'Minutos',         // Define the locale text for "Minute"
					'amPmText'=>['AM', 'PM'],       // Define the locale text for periods
					'beforeShow'=>'js:tpEndSelect',
					// custom hours and minutes
					/*'hours'=>array(
						'starts'=>'1',                // First displayed hour
						'ends'=>'12',                  // Last displayed hour
					),*/
					/*'minutes'=>array(
						'starts'=>'0',                // First displayed minute
						'ends'=>'55',                 // Last displayed minute
						'interval'=>'5',              // Interval of displayed minutes
						//manual: []                // Optional extra entries for minutes
					),*/
				),
				'htmlOptions'=>array('size' => 5, 'class'=>'input-mini', 'readonly'=>true),
		 ));
?>
		<p class="help-block">Fecha y hora probable de llegada (requerido)</p>
		<?php echo $form->error($model,'fecha_llegada'); ?>
        </div>
    </div>
	<?php //echo $form->textFieldRow($model, 'fecha_llegada', array('class'=>'input-small', 'prepend'=>'<i class="icon-calendar"></i>')); ?>

	
	<?php //echo $form->textFieldRow($model, 'hora_salida', array('class'=>'input-small', 'prepend'=>'<i class="icon-time"></i>')); ?>

	<?php //echo $form->textFieldRow($model, 'hora_llegada', array('class'=>'input-small', 'prepend'=>'<i class="icon-time"></i>')); ?>

	<?php echo $form->textFieldRow($model, 'n_personas', array('class'=>'input-mini','maxlength'=>3,
								'hint'=>'Cantidad de personas que harán uso del transporte (requerido)')); ?>
	
	<?php echo $form->dropDownListRow($model, 'id_destino',
										CHtml::listData($model->getListaDestino(),'id','nombre'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el destino para la actividad')
										); ?>
										
	<?php echo $form->textAreaRow($model,'lugar_encuentro',
								array('rows'=>2, 'cols'=>50, 
								'hint'=>'Lugar de encuentro de los beneficiarios del servicio para la salida')); ?>
	
	<?php echo $form->textAreaRow($model,'lugar_encuentro_llegada',
								array('rows'=>2, 'cols'=>50, 
								'hint'=>'Lugar de encuentro de los beneficiarios del servicio para la llegada')); ?>
	
	<?php echo $form->textAreaRow($model,'motivo',
								array('rows'=>2, 'cols'=>50, 
								'hint'=>'Información adicional relacionada con la solicitud')); ?>
																	
	<?php echo $form->textAreaRow($model,'observaciones',
								array('rows'=>2, 'cols'=>50, 
								'hint'=>'Información adicional relacionada con la solicitud')); ?>
								
	<?php echo $form->textAreaRow($model,'recorrido',
								array('rows'=>2, 'cols'=>50, 
								'hint'=>'Recorrido general a realizar')); ?>
	<?php
	/*if (!$model->isNewRecord):?>
	<?php echo $form->dropDownListRow($model, 'id_estatus_solicitud',
										CHtml::listData($model->getListaEstatusSolicitud(),'id','estatus'),
										array('empty' => 'Seleccione...',
										'hint'=>'Seleccione el estatus de la solicitud')); ?>
	<?php endif; */?>											
<!--	<div class="row">
		<?php //echo $form->labelEx($model,'id_destino'); ?>
		<?php //echo $form->textField($model,'id_destino'); ?>
		<?php //echo $form->error($model,'id_destino'); ?>
	</div> -->

<!--	<div class="row">
		<?php //echo $form->labelEx($model,'id_estatus_solicitud'); ?>
		<?php //echo $form->textField($model,'id_estatus_solicitud'); ?>
		<?php //echo $form->error($model,'id_estatus_solicitud'); ?>
	</div> -->
	
	<div class="form-actions">
		<?php $submit = $model->isNewRecord ? 'Registrar' : 'Actualizar'; ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>$submit)); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Limpiar')); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'link', 
									'label'=>'Cancelar',
									'url'=>array('site/page', 'view'=>'Bienvenida'))); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
