<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/nav-admin'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <?php if(isset($itens)): ?>
            <h1 class="mt-4"><?= $titulo ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
            <form action="<?= base_url('')?>index.php/entrada/update/<?= $itens['iditem']?>" method="post">
        
        <?php else :?>
            <h1 class="mt-4"><?= $titulo ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
            <form action="<?= base_url('')?>index.php//store" method="post" enctype="multipart/form-data">
            
        <?php endif ;?>

        <?php if($this->session->flashdata('error')) : ?>
            <p class="alert alert-danger"><?= $this->session->flashdata('error') ?></p>
        <?php endif ?>
        
            
            <div class="card">
                <div class="card-body" style="font-size: 14px;">

                    <div class="row">
                        <div class="col-sm">
                            <label for="qtd_despachado">Quantidade</label>
                            <input type="text" class="form-control" name="qtd_despachado" id="qtd_despachado" placeholder="Quantidade">
                        </div>

                    </div><br>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
    </main>
<?php $this->load->view('parts/footer'); ?>