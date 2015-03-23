<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CakeAutoAdmin | Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <?= $this->Html->css('CakeAutoAdmin.bootstrap.min') ?>
    <!-- FontAwesome 4.3.0 -->
    <?= $this->Html->css('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') ?>
    <!-- Ionicons 2.0.0 -->
    <?= $this->Html->css('//code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css') ?>
    <!-- Theme style -->
    <?= $this->Html->css('CakeAutoAdmin.AdminLTE.min') ?>
    <?= $this->Html->css('CakeAutoAdmin.skins/skin-blue') ?>
    <!-- iCheck -->
    <?= $this->Html->css('CakeAutoAdmin./plugins/iCheck/flat/blue') ?>
    <!-- Morris chart -->
    <?= $this->Html->css('CakeAutoAdmin./plugins/morris/morris') ?>
    <!-- jvectormap -->
    <?= $this->Html->css('CakeAutoAdmin./plugins/jvectormap/jquery-jvectormap-1.2.2') ?>
    <!-- Date Picker -->
    <?= $this->Html->css('CakeAutoAdmin./plugins/datepicker/datepicker3') ?>
    <!-- Daterange picker -->
    <?= $this->Html->css('CakeAutoAdmin./plugins/daterangepicker/daterangepicker-bs3') ?>
    <!-- bootstrap wysihtml5 - text editor -->
    <?= $this->Html->css('CakeAutoAdmin./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">
    <div class="wrapper">
      <?= $this->element('header') ?>
      <?= $this->element('sidebar') ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?= $this->fetch('content') ?>
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <strong>AdminLTE 2.0 Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. <b>Version</b> 2.0
        </div>
        <strong>CakeAutoAdmin Copyright &copy; 2015 <a href="http://github.com/karljakober">Karl Jakober</a></strong>
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/jQuery/jQuery-2.1.3.min') ?>
    <!-- jQuery UI 1.11.2 -->
    <?= $this->Html->script('//code.jquery.com/ui/1.11.2/jquery-ui.min.js') ?>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <?= $this->Html->script('CakeAutoAdmin.bootstrap.min') ?>
    <!-- Morris.js charts -->
    <?= $this->Html->script('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js') ?>
    <?= $this->Html->script('CakeAutoAdmin./plugins/morris/morris.min') ?>
    <!-- Sparkline -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/sparkline/jquery.sparkline.min') ?>
    <!-- jvectormap -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/jvectormap/jquery-jvectormap-1.2.2.min') ?>
    <?= $this->Html->script('CakeAutoAdmin./plugins/jvectormap/jquery-jvectormap-world-mill-en') ?>
    <!-- jQuery Knob Chart -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/knob/jquery.knob') ?>
    <!-- daterangepicker -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/daterangepicker/daterangepicker') ?>
    <!-- datepicker -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/datepicker/bootstrap-datepicker') ?>
    <!-- Bootstrap WYSIHTML5 -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min') ?>
    <!-- iCheck -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/iCheck/icheck.min') ?>
    <!-- Slimscroll -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/slimScroll/jquery.slimscroll.min') ?>
    <!-- FastClick -->
    <?= $this->Html->script('CakeAutoAdmin./plugins/fastclick/fastclick.min') ?>
    <!-- AdminLTE App -->
    <?= $this->Html->script('CakeAutoAdmin.app.min') ?>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <?= $this->Html->script('CakeAutoAdmin.pages/dashboard') ?>
    <!-- AdminLTE for demo purposes -->
    <?= $this->Html->script('CakeAutoAdmin.demo') ?>

  </body>
</html>
