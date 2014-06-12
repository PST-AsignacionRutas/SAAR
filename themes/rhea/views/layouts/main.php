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
			'brandUrl'=>array('/site/page', 'view'=>'about'),
			'type'=>'', // null or 'inverse'
			'collapse'=>true, // requires bootstrap-responsive.css
			'fixed'=>'',
			'items'=>array(
				array(
					'class'=>'bootstrap.widgets.TbMenu',
					'items'=>array(
						array('label'=>'Definiciones', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Gestionar Choferes', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
								array('label'=>'Registrar', 'url'=>array('/chofer/create')),
								array('label'=>'Modificar', 'url'=>array('/chofer/admin', 'action'=>'Modificar')),
								array('label'=>'Consultar', 'url'=>array('/chofer/admin', 'action'=>'Consultar')),
								array('label'=>'Eliminar', 'url'=>array('/chofer/admin', 'action'=>'Eliminar')),
							)),
							array('label'=>'Gestionar Vehículos', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
								array('label'=>'Registrar', 'url'=>array('/vehiculo/create')),
								array('label'=>'Modificar', 'url'=>array('/vehiculo/admin', 'action'=>'Modificar')),
								array('label'=>'Consultar', 'url'=>array('/vehiculo/admin', 'action'=>'Consultar')),
								array('label'=>'Eliminar', 'url'=>array('/vehiculo/admin', 'action'=>'Eliminar')),
							)),
							array('label'=>'Gestionar Destinos', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
								array('label'=>'Registrar', 'url'=>array('/destino/create')),
								array('label'=>'Modificar', 'url'=>array('/destino/admin', 'action'=>'Modificar')),
								array('label'=>'Consultar', 'url'=>array('/destino/admin', 'action'=>'Consultar')),
								array('label'=>'Eliminar', 'url'=>array('/destino/admin', 'action'=>'Eliminar')),
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
						array('label'=>'Gestionar Solicitudes', 'url'=>array('#'),'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Registrar', 'url'=>array('solicitud/create')),
							array('label'=>'Modificar', 'url'=>array('/solicitud/admin', 'action'=>'Modificar')),
							array('label'=>'Consultar', 'url'=>array('/solicitud/admin', 'action'=>'Consultar')),
						)),						
						array('label'=>'Gestionar Asignaciones', 'url'=>array('/chofer/index'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Registrar', /*'url'=>array('/RutaAsignada/listasolicitudes'),*/ 'items'=>array(
								array('label'=>'Actividad diaria', 'url'=>array('/RutaAsignada/listasolicitudes')),
								array('label'=>'Ruta estudiantil', 'url'=>array('/RutaAsignada/asignarrutaestudiantil')),
							)),
							array('label'=>'Modificar', /*'url'=>array('/RutaAsignada/admin')),*/ 'items'=>array(
								array('label'=>'Actividad diaria', 'url'=>array('/RutaAsignada/listasolicitudesmodificar')),
								array('label'=>'Ruta estudiantil', 'url'=>array('/RutaAsignada/listarutaestudiantilmodificar')),
							)),
						)),
						array('label'=>'Reportes', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Solicitudes de transporte', 'url'=>array('/reportes/reportesolicitudestransporte')),
							array('label'=>'Planificación de rutas estudiantiles', 'url'=>array('/reportes/reporteplanificacionrutasestudiantiles')),
							array('label'=>'Programación de actividades diarias', 'url'=>array('/reportes/reporteprogramacionactividadesdiarias')),
							//array('label'=>'Asignación de transporte permanente', 'url'=>array('')),
						)),
						array('label'=>'','icon'=>'icon-cog','url'=>array('#'), 'linkOptions' => array('title'=>'Ajustes de Seguridad', 'rel'=>'tooltip'), 'visible'=>!Yii::app()->user->isGuest,'items'=>array(
							array('label'=>'Gestionar usuarios', 'url'=>array(''),'items'=>array(
								array('label'=>'Registrar Usuario', 'url'=>array('/cruge/ui/usermanagementcreate')),
								array('label'=>'Administrar Usuarios', 'url'=>array('/cruge/ui/usermanagementadmin')),
								array('label'=>'Administrar Roles', 'url'=>array('/cruge/ui/rbaclistroles')),
								array('label'=>'Asignar Rol a Usuario', 'url'=>array('/cruge/ui/rbacusersassignments'))
							)),
							array('label'=>'Respaldos', 'url'=>array('')),
						)),
						array('label'=>'Autenticar', 'icon'=>'icon-circle-arrow-right','url'=>array('/cruge/ui/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'', 'icon'=>'icon-question-sign','linkOptions' => array('title'=>'Ayuda de SAAR', 'rel'=>'tooltip'),'url'=>array('#'),'items'=>array(
							array('label'=>'Ayuda de SAAR', 'url'=>array('')),
							array('label'=>'Acerca de', 'url'=>array('/site/page', 'view'=>'about')),
						)),						
						array('label'=>'('.Yii::app()->user->name.')', 'icon'=>'icon-off', 'linkOptions' => array('title'=>'Salir de SAAR', 'rel'=>'tooltip'),'url'=>Yii::app()->user->ui->logoutUrl, 'visible'=>!Yii::app()->user->isGuest),			
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
<?php echo Yii::app()->user->ui->displayErrorConsole(); ?>
</body>
</html>
