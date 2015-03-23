<section class="content-header">
  <h1>
    <?= $title ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="/cake_auto_admin"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="/cake_auto_admin/<?= $model ?>"><?= $model ?></a></li>
    <li class="active"><?= $title ?></li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-12">
      <!-- general form elements -->
      <?= $this->Flash->render(); ?>
      <div class="box box-primary">
        <!-- form start -->
          <?= $this->Form->create($record, [
                'novalidate' => true
          ]) ?>
          <?php
          $myTemplates = [
              'inputContainer' => '<div class="form-group">{{content}}</div>',
              'input' => '<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}>',
              'checkboxWrapper' => '<div class="checkbox"><label>{{input}} {{label}}</label></div>',
              'select' => '<div class="col-xs-2"><select class="form-control">{{content}}</select></div>',
              'datetimeContainer' => '<div class="form-group">{{content}}</div>'
          ];
          $this->Form->templates($myTemplates);
          ?>

          <div class="box-body">
              <?php
              foreach ($fields as $key => $value) {
                  $params = [];
                  if (in_array($value['type'], ['datetime', 'date'])) {
                      $params['minYear'] = $defaultconfig['fields']['datetime'][$key]['minYear'];
                      $params['maxYear'] = $defaultconfig['fields']['datetime'][$key]['maxYear'];
                      $params['dateFormat'] = $defaultconfig['fields']['datetime'][$key]['dateFormat'];
                  }

                  if (isset($defaultconfig['fields']['password'][$key]) && $defaultconfig['fields']['password'][$key]) {
                      $params['type'] = 'password';
                  } elseif (in_array($value['type'], ['string', 'integer', 'float'])) {
                      $params['type'] = 'text';
                  }

                  echo $this->Form->input($key, $params);

              }
              ?>
          </div><!-- /.box-body -->

          <div class="box-footer">
            <?= $this->Form->button('Save', ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
            <?= $this->Html->link('Cancel', ['controller' => 'Admin', 'action' => $model]) ?>

          </div>
        <?= $this->Form->end() ?>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section>
