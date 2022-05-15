<?php $this->load->view('parts/header'); ?>
<?php $this->load->view('parts/nav-admin'); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"><?= $titulo ?></h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>

            <?php if($this->session->flashdata('sucesso')) : ?>
                <p class="alert alert-success"><?= $this->session->flashdata('sucesso') ?></p>
            <?php endif ?>

            <div class="card">
                <div class="card-body">
        
                    <!-- Navbar Search-->
                    <form action="<?= base_url() ?>index.php/item/pesquisar" method="post" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input class="form-control" name="busca" id="busca" type="text" placeholder="Nome" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form><br><br>
                    <div class="table-responsive-sm">
                    <table class="table">
                        <thead style="text-align: center;">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descrição</th>
                                <th scope="col">Unidade</th>
                                <th scope="col">Saldo</th>
                                <th scope="col">Data Vencimento</th>
                                <th scope="col">Saída</th>
                            </tr>
                        </thead>
                        <tbody style="font-size: 13px; text-align: center;">
                        <?php foreach($itens as $i){?>
                            <?php foreach($produtos as $p){?>
                                <?php foreach($fornecedores as $f){?>
                                    <?php if($i['produto_idproduto'] == $p['idproduto']){?>
                                        <?php if($i['fornecedor_idfornecedor'] == $f['idfornecedor']){?>
                                            <?php $a = strtotime($i ['data_vencimento']);
                                                $date = date('d/m/Y', $a);?>
                                            <tr>
                                                <td><?= $i ['iditem'] ?></td>
                                                <td><?= $p ['nome'] ?></td>
                                                <td><?= $p ['unidade'] ?></td>
                                                <td><?= $i ['qtd'] ?></td>
                                                <td><?= $date ?></td>
                                                <td>
                                                    <a href="<?php base_url()?>saida/edit/<?= $i ['iditem']?>" class="btn btn-primary">
                                                        <i>
                                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                            </svg>
                                                        </i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php }?>
                                    <?php }?>
                                <?php }?>
                            <?php }?>
                        <?php }?>
                        </tbody>
                    </table>
                        </div>
                </div>
            </div>
        </div>
    </main>
<?php $this->load->view('parts/footer'); ?>