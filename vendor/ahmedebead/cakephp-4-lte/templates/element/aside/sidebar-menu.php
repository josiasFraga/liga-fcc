<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item <?php echo $this->getRequest()->getParam('controller') === 'Pages' && $this->getRequest()->getParam('action') === 'display' ? 'menu-open' : ''; ?>">
      <a href="<?php echo $this->Url->build('/'); ?>" class="nav-link">
        <p>Página Inicial</p>
      </a>
    </li>

    <li class="nav-item <?php echo $this->getRequest()->getParam('controller') === 'Patients' ? 'menu-open' : ''; ?>">
      <a href="<?php echo $this->Url->build('/patients'); ?>" class="nav-link">
        <p>Pacientes</p>
      </a>
    </li>

    <li class="nav-item <?php echo $this->getRequest()->getParam('controller') === 'Reports' ? 'menu-open' : ''; ?>">
      <a href="<?php echo $this->Url->build('/reports'); ?>" class="nav-link">
        <p>Relatórios</p>
      </a>
    </li>

    <li class="nav-item <?php echo $this->getRequest()->getParam('controller') === 'Users' ? 'menu-open' : ''; ?>">
      <a href="<?php echo $this->Url->build('/users'); ?>" class="nav-link">
        <p>Usuários</p>
      </a>
    </li>

    <!-- Outros itens do menu aqui -->

  </ul>
</nav>
