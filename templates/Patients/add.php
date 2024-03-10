<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header with-border">
          <h3 class="card-title"><?php echo __('Form'); ?></h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <?php echo $this->Form->create($patient, ['role' => 'form']); ?>
          <div class="card-body">
            <?php
              echo $this->Form->control('name', ['placeholder' => 'Digite o nome completo do paciente']);
              echo $this->Form->control('address', ['placeholder' => 'Exemplo: Rua Barão do Upacaraí, 9999']);
              echo $this->Form->control('neighborhood', ['placeholder' => 'Digite o bairro do paciente']);
              echo $this->Localization->generateBasicLocation('col-md-6 col-xs-12', $patient->city, 'cities', false, 'select2bs4', $patient->state);
              echo $this->Form->control('phone', ['placeholder' => 'Digite o telefone do paciente', 'class' => 'form-control phone']);
              echo $this->Form->control('birth_date', [
                'empty' => true,
                'class' => 'w-100'
              ]);
              
              echo $this->Form->control('marital_status', [
                'type' => 'select',
                'options' => [
                    null => 'Não Definido',
                    'Casado' => 'Casado',
                    'Solterio' => 'Solterio',
                    'Divorciado' => 'Divorciado',
                    'Viúvo' => 'Viúvo'
                ],
                'empty' => '(Escolha uma opção)',  // Isso é opcional, mas é útil se você deseja adicionar um placeholder
              ]);
              echo $this->Form->control('identity_number');
              echo $this->Form->control('home_type');
              echo $this->Form->control('workplace');
              echo $this->Form->control('family_income', ['class' => 'form-control price', 'type' => "text"]);
              echo $this->Form->control('doctor');
              echo $this->Form->control('health_card_number');
              echo $this->Form->control('lfcc_date', [
                'empty' => true,
                'class' => 'w-100'
              ]);
              echo $this->Form->control('affected_organ');
              echo $this->Form->control('date_of_death', [
                'empty' => true,
                'class' => 'w-100'
              ]);
            ?>
          </div>
          <!-- /.card-body -->

        <?php echo $this->Form->submit(__('Submit')); ?>

        <?php echo $this->Form->end(); ?>
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
</section>

<?php
$this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js', ['block' => true]);
$this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js', ['block' => true]);

$this->Html->scriptBlock("
    $(document).ready(function(){
        $('input.phone').mask('(00) 00000-0000');
        $('input.cpf').mask('000.000.000-00');
        $('input.postal-code').mask('00000-000');
        $('input.price').mask('#.##0,00', {reverse: true});
    });
", ['block' => true]);
?>
