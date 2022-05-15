<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/nav-admin'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <?php if(isset($produtos)): ?>
            <h1 class="mt-4"><?= $titulo ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
            <form action="<?= base_url('')?>index.php/produto/update/<?= $produtos['idproduto']?>" method="post">
        
        <?php else :?>
            <h1 class="mt-4"><?= $titulo ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
            <form action="<?= base_url('')?>index.php/produto/store" method="post">
            
        <?php endif ;?>

        <?php if($this->session->flashdata('error')) : ?>
            <p class="alert alert-danger"><?= $this->session->flashdata('error') ?></p>
        <?php endif ?>
        
            
            <div class="card">
                <div class="card-body" style="font-size: 14px;">
                
                    <div class="row">
                        <div class="col-sm">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome" required value="<?= isset($produtos) ? $produtos['nome'] : ''?>">
                        </div>

                        <div class="col-sm-4">
                        <label for="unidade">Unidade de Medida</label>
                        <input type="text" class="form-control" name="unidade" id="unidade" placeholder="Unidade de Medida" required value="<?= isset($produtos) ? $produtos['unidade'] : ''?>">
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="status">Situação</label>
                                <select name="status" id="status" class="form-control" required value="<?= isset($produtos) ? $produtos['status'] : ''?>">
                                <option selected>...</option>
                                <option  value="1">Ativo</option>
                                <option  value="2">Inativo</option> 
                                </select>
                        </div>
                    </div><br>

                    <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div><br>
    </main>
<?php $this->load->view('parts/footer'); ?>