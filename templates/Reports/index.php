<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Relatório de Óbitos</h3>

          <div class="card-tools">
            <button id="printButton" class="btn btn-primary">Print</button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="table-responsive" id="printContent">
            <?php echo $this->Form->create(null, ['role' => 'form']); ?>
            <div class="form-row align-items-center mb-3">
              <div class="col-auto">
                <?= $this->Form->input('start_date', ['type' => 'date', 'class' => 'form-control', 'label' => 'Data Inicial', 'value' => $data_inicial]) ?>
              </div>
              <div class="col-auto">
                <?= $this->Form->input('end_date', ['type' => 'date', 'class' => 'form-control', 'label' => 'Data Final', 'value' => $data_final]) ?>
              </div>
              <div class="col-auto">
                <br />
                <?= $this->Form->button(__('Filter'), ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
              </div>
            </div>
            <?= $this->Form->end() ?>

            <div id="print_this">
                <?php foreach ($monthlyTotals as $monthYear => $monthlyTotal): ?>
                <?php setlocale(LC_TIME, 'pt_BR.utf-8', 'portuguese.utf-8'); ?>
                <h4><?= ucfirst(strftime('%B %Y', strtotime($monthYear))) ?></h4>
                <?php setlocale(LC_TIME, ''); ?>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Data do Óbito</th>
                            <!-- Add more table headers as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($patients as $patient): ?>
                            <?php if ($patient->date_of_death->format('Y-m') === $monthYear): ?>
                                <tr>
                                    <td><?= h($patient->name) ?></td>
                                    <td><?= $patient->date_of_death != null ? h($patient->date_of_death->format('d/m/Y')): "" ?></td>
                                    <!-- Add more table cells as needed -->
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <p class="mt-3 text-right">Subtotal de Óbitos: <?= $monthlyTotal ?></p>
                <?php endforeach; ?>
              <p class="mt-3">Total de Óbitos: <?= $totalDeaths ?></p>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
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
