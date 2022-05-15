<?php

function permissionUser(){

	$ci = get_instance();
	$loggedUser = $ci->session->userdata('logged_user');
	if(!$loggedUser){
		$ci->session->set_flashdata('danger', 'Você precisa estar logado para acessar esta página');
		redirect('login');
	}
	return $loggedUser;
}

function permissionAdm(){

	$ci = get_instance();
	$loggedAdm = $ci->session->userdata('logged_adm');
	if(!$loggedAdm){
		$ci->session->set_flashdata('danger', 'Você precisa estar logado para acessar esta página');
		redirect('login');
	}
	return $loggedAdm;
}