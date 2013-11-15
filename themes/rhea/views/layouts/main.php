<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	
	<?php echo Yii::app()->bootstrap->register();?>
	
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<p style="margin:0px;">
  <!-- <div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?>
		</div>
	</div><!-- header -->
  <img src="images/banner_saar.jpg" width="950" height="200" /></p>

	<div>
		<?php /*$this->widget('zii.widgets.CMenu',array(*/
			$this->widget('bootstrap.widgets.TbNavbar', array(
			'brand'=>'SAAR',
			'brandUrl'=>'',
			'type'=>'', // null or 'inverse'
			'collapse'=>true, // requires bootstrap-responsive.css
			'fixed'=>'',
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'items'=>array(
						array('label'=>'Gestionar Solicitudes', 'url'=>array('#'),'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Registrar', 'url'=>array('solicitud/create')),
							array('label'=>'Buscar', 'url'=>array('solicitud/admin')),
						)),						
						array('label'=>'Gestionar Asignaciones', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Registrar', 'url'=>array('/RutaAsignada/create')),
							array('label'=>'Buscar', 'url'=>array('/RutaAsignada/admin')),
						)),
						array('label'=>'Definiciones', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Gestionar Choferes', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
								array('label'=>'Registrar', 'url'=>array('/chofer/create')),
								array('label'=>'Buscar', 'url'=>array('/chofer/admin')),
							)),
							array('label'=>'Gestionar Vehículos', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
								array('label'=>'Registrar', 'url'=>array('/vehiculo/create')),
								array('label'=>'Buscar', 'url'=>array('/vehiculo/admin')),
							)),
							array('label'=>'Gestionar Destinos', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
								array('label'=>'Registrar', 'url'=>array('/destino/create')),
								array('label'=>'Buscar', 'url'=>array('/destino/admin')),
							)),
							/*"---",
							array('label'=>'Gestionar Tipo de Choferes', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
								array('label'=>'Registrar', 'url'=>array('/destino/create')),
								array('label'=>'Buscar', 'url'=>array('/destino/admin')),
							)),
							array('label'=>'Gestionar Estatus de Choferes', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
								array('label'=>'Registrar', 'url'=>array('/destino/create')),
								array('label'=>'Buscar', 'url'=>array('/destino/admin')),
							)),*/
						)),
						array('label'=>'Reportes', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Solicitudes de transporte', 'url'=>array('')),
							array('label'=>'Asignación de rutas estudiantiles', 'url'=>array('')),
							array('label'=>'Asignación de actividades diarias', 'url'=>array('')),
							array('label'=>'Asignación de transporte permanente', 'url'=>array('')),
						)),
						array('label'=>'','icon'=>'icon-cog','url'=>array('#'), 'linkOptions' => array('title'=>'Ajustes de Seguridad', 'rel'=>'tooltip'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Gestionar usuarios', 'url'=>array(''),'items'=>array(
								array('label'=>'Registrar', 'url'=>array('')),
								array('label'=>'Buscar', 'url'=>array('')),
							)),
							array('label'=>'Respaldos', 'url'=>array('')),
						)),
						array('label'=>'Ingresar', 'icon'=>'icon-circle-arrow-right','url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'', 'icon'=>'icon-question-sign','linkOptions' => array('title'=>'Ayuda de SAAR', 'rel'=>'tooltip'),'url'=>array('#'),'items'=>array(
							array('label'=>'Ayuda de SAAR', 'url'=>array('')),
							array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
						)),						
						array('label'=>'('.Yii::app()->user->name.')', 'icon'=>'icon-off', 'linkOptions' => array('title'=>'Salir de SAAR', 'rel'=>'tooltip'),'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),			
					),
				),
			),
		)); ?>
	<?php if(isset($this->breadcrumbs)):?>
		<?php /*$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
			'homeLink'=>''
		)); */?><!-- breadcrumbs -->
	<?php endif?>

	<div id="main-content" style="box-shadow: none; border: 0px; background: none; margin: 0px;">
		<?php echo $content; ?>
	</div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> SAAR<br/>
		Software Libre (GPL3)<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
