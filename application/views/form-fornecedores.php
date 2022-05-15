<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/nav-admin'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <?php if(isset($fornecedores)): ?>
            <h1 class="mt-4"><?= $titulo ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
            <form action="<?= base_url('')?>index.php/fornecedor/update/<?= $fornecedores['idfornecedor']?>" method="post">
        
        <?php else :?>
            <h1 class="mt-4"><?= $titulo ?></h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard</li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
            <form action="<?= base_url('')?>index.php/fornecedor/store" method="post">
            
        <?php endif ;?>

        <?php if($this->session->flashdata('error')) : ?>
            <p class="alert alert-danger"><?= $this->session->flashdata('error') ?></p>
        <?php endif ?>
        
            
            <div class="card">
                <div class="card-body" style="font-size: 14px;">
                
                    <div class="row">
                        <div class="col-sm-4">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" class="form-control" onkeypress="$(this).mask('00.000.000/0000-00')" name="cnpj" id="cnpj" placeholder="Cnpj" required value="<?= isset($fornecedores) ? $fornecedores['cnpj'] : ''?>">
                        </div>

                        <div class="col-sm">
                        <label for="nome">Razão Social</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Razão Social" required value="<?= isset($fornecedores) ? $fornecedores['nome'] : ''?>">
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-sm">
                        <label for="logradouro">Logradouro</label>
                        <input type="text" class="form-control" name="logradouro" id="logradouro" placeholder="Logradouro" required value="<?= isset($fornecedores) ? $fornecedores['logradouro'] : ''?>">
                        </div>

                        <div class="col-sm-3">
                        <label for="bairro">Bairro</label>
                        <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairro" required value="<?= isset($fornecedores) ? $fornecedores['bairro'] : ''?>">
                        </div>

                        <div class="col-sm-2">
                        <label for="numero">Número</label>
                        <input type="text" class="form-control" name="numero" id="numero" placeholder="Número" required value="<?= isset($fornecedores) ? $fornecedores['numero'] : ''?>">
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-sm">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" name="cidade" id="cidade" placeholder="Cidade" required value="<?= isset($fornecedores) ? $fornecedores['cidade'] : ''?>">
                        </div>

                        <div class="col-sm">
                        <label for="estado">Estado</label>
                        <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado" required value="<?= isset($fornecedores) ? $fornecedores['estado'] : ''?>">
                        </div>

            
                    </div><br>

                    <div class="row">

                        <div class="col-sm-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" class="form-control" onkeypress="$(this).mask('(00) 90000-0000')" name="telefone" id="telefone" placeholder="Telefone" required value="<?= isset($fornecedores) ? $fornecedores['telefone'] : ''?>">
                        </div>

                        <div class="col-sm-4">
                        <label for="status">Situação</label>
                            <select name="status" id="status" class="form-control">
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