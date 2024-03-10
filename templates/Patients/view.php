<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-solid">
        <div class="card-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="card-title"><?php echo __('Information'); ?></h3>
          <div class="card-tools">
            <button class="btn btn-default btn-sm" id="printButton">
              <i class="fa fa-print"></i> <?php echo __('Print'); ?>
            </button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" id="printContent">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($patient->name) ?></dd>

            <dt scope="row"><?= __('Address') ?></dt>
            <dd><?= h($patient->address) ?></dd>

            <dt scope="row"><?= __('Neighborhood') ?></dt>
            <dd><?= h($patient->neighborhood) ?></dd>

            <dt scope="row"><?= __('City') ?></dt>
            <dd><?= h($patient->city) ?></dd>

            <dt scope="row"><?= __('State') ?></dt>
            <dd><?= h($patient->state) ?></dd>

            <dt scope="row"><?= __('Phone') ?></dt>
            <dd><?= h($patient->phone) ?></dd>

            <dt scope="row"><?= __('Marital Status') ?></dt>
            <dd><?= h($patient->marital_status) ?></dd>

            <dt scope="row"><?= __('Identity Number') ?></dt>
            <dd><?= h($patient->identity_number) ?></dd>

            <dt scope="row"><?= __('Home Type') ?></dt>
            <dd><?= h($patient->home_type) ?></dd>

            <dt scope="row"><?= __('Workplace') ?></dt>
            <dd><?= h($patient->workplace) ?></dd>

            <dt scope="row"><?= __('Doctor') ?></dt>
            <dd><?= h($patient->doctor) ?></dd>

            <dt scope="row"><?= __('Health Card Number') ?></dt>
            <dd><?= h($patient->health_card_number) ?></dd>

            <dt scope="row"><?= __('Affected Organ') ?></dt>
            <dd><?= h($patient->affected_organ) ?></dd>

            <dt scope="row"><?= __('Family Income') ?></dt>
            <dd>R$ <?= number_format($patient->family_income,2,',','.') ?></dd>

            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($patient->created) ?></dd>

            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($patient->modified) ?></dd>

            <dt scope="row"><?= __('Birth Date') ?></dt>
            <dd><?= h($patient->birth_date) ?></dd>

            <dt scope="row"><?= __('Lfcc Date') ?></dt>
            <dd><?= h($patient->lfcc_date) ?></dd>


          </dl>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.getElementById("printButton").addEventListener("click", function() {
    var content = document.getElementById("printContent").innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = content;
    window.print();
    document.body.innerHTML = originalContent;
  });
</script>

<?= $this->Html->css('admin/view_patient.css') ?>