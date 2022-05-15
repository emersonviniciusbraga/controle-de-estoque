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
            <form action="<?= base_url('')?>index.php/entrada/store" method="post" enctype="multipart/form-data">
            
        <?php endif ;?>

        <?php if($this->session->flashdata('error')) : ?>
            <p class="alert alert-danger"><?= $this->session->flashdata('error') ?></p>
        <?php endif ?>
        
            
            <div class="card">
                <div class="card-body" style="font-size: 14px;">
                
                    <div class="row">
                        <div class="col-sm">
                            <label for="fornecedor_idfornecedor">Fornecedor</label>
                            <select name="fornecedor_idfornecedor" id="fornecedor_idfornecedor" class="form-control">
                            <option selected>...</option>
                            <?php foreach($fornecedores as $f){?>
                                <option  value="<?= $f ['idfornecedor'] ?>"><?= $f ['nome'] ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-sm">
                            <label for="produto_idproduto">Produto</label>
                            <select name="produto_idproduto" id="produto_idproduto" class="form-control">
                            <option selected>...</option>
                            <?php foreach($produtos as $p){?>
                                <option  value="<?= $p ['idproduto'] ?>"><?= $p ['nome'] ?></option>
                                <?php }?>
                            </select>
                        </div>
                        
                    </div><br>

                    <div class="row">
                        <div class="col-sm">
                            <label for="qtd">Quantidade Recebida</label>
                            <input type="text" class="form-control" name="qtd" id="qtd" placeholder="Quantidade" required value="<?= isset($itens) ? $itens['qtd'] : ''?>">
                        </div>

                        <div class="col-sm">
                            <label for="data_vencimento">Data Vencimento</label>
                            <input type="date" class="form-control" name="data_vencimento" id="data_vencimento" placeholder="Data Vencimento" required value="<?= isset($itens) ? $itens['data_vencimento'] : ''?>">
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="nf">Nota Fiscal</label>
                            <input type="file" class="form-control-file" required name="nf">
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
    </main>
<?php $this->load->view('parts/footer'); ?>