<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-off">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo $title; ?></title>
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
		<link href="assets/css/material-icons.css" rel="stylesheet" >
		<link href="assets/css/material-dashboard.min.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-select.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
		<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
    	<script src="assets/js/custom.js" type="text/javascript" ></script>
		<script src="assets/js/plugins/bootstrap-notify.js"></script>
		<?php
			date_default_timezone_set('Asia/Kolkata');
            error_reporting(E_ERROR | E_PARSE);
			if($table){
		?>
				<link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css"/>
				<script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
		<?php

			}

		?>
	</head>