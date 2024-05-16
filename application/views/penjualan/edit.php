<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome in our Website</title>
    <link rel="stylesheet" href="
        <?PHP echo base_url('assets/css/themes/default/jquery.mobile-1.4.5.min.css');?> ">
    <link rel="stylesheet" href="
        <?PHP echo base_url('assets/_assets/css/jqm-demos.css');?> ">
	<link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<script src="
        <?PHP echo base_url('assets/js/jquery.js');?>"></script>
    <script src="
        <?PHP echo base_url('assets/_assets/js/index.js');?>"></script>
    <script src="
        <?PHP echo base_url('assets/js/jquery.mobile-1.4.5.min.js');?> "></script>
</head>
<body>
<div data-role="page" class="jqm-demos ui-responsive-panel" id="panel-responsive-page1" data-title="Panel responsive page">

    <div data-role="header">
        <h1>Edit Data Barang</h1>
        <a href="#nav-panel" data-icon="bars" data-iconpos="notext">Menu</a>
        <a href="#add-form" data-icon="user" data-iconpos="notext">Login</a>
    </div><!-- /header -->

    <div role="main" class="ui-content jqm-content jqm-fullwidth">
    <?php foreach ($data as $dt);?>

    	<h1
            style="text-align: center;
                   font-weight:bold; 
                   text-transform: uppercase;">Edit Data Customer</h1>

        <p></p>
		<div data-demo-html="#panel-responsive-page1" style="justify-content: center;">
        <form class="userform" method="post" action="<?php echo base_url('index.php/C_customer/Update')?>">

            <label for="name">Nama Customer:</label>
            <input type="hidden" value="<?php echo $dt->id;?>" name="id">
            <input type="text" name="nama_lengkap" id="nama_lengkap" value="<?php echo $dt->nama_lengkap;?>">
            <label for="name">Telp Customer:</label>
            <input type="text" name="telp" id="telp" value="<?php echo $dt->telp;?>">
            <label for="name">Alamat Customer:</label>
            <input type="text" name="alamat" id="alamat" value="<?php echo $dt->alamat;?>">

            <div class="ui-grid-a" style="justify-content: center;">
                <div class="ui-block-a"><a href="<?php echo base_url('index.php/C_customer/lihat');?>" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-mini">Lihat</a></div><br>
                <!-- untuk proses hapus masih kurang scriptnya  $dt->id, fungsinya ini utk mengaetahui ID data yang dihapus
                    dan selanjutnya sama fungsi hapus yg ada dicontroller akan ditangkap dengan variabel 
                 $id = $this->uri->segment(3); -->  
                <div class="ui-block-a"><a href="<?php echo base_url('index.php/C_customer/Hapus/').$dt->id;?>" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-mini">Hapus</a></div><br>
                <div class="ui-block-a"><input type="submit" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-mini" value="Simpan"></div>
            </div>
            </form>
        </div><!--/demo-html -->

        <br>
        <br>
        <br>
        <br>
        <br>

        <a href="../" data-rel="back" data-ajax="false" class="ui-btn ui-shadow ui-corner-all ui-mini ui-btn-inline ui-icon-carat-l ui-btn-icon-left ui-alt-icon ui-nodisc-icon">Back</a>

	</div><!-- /content -->

	<div data-role="panel" data-display="push" data-theme="b" id="nav-panel">
        <?PHP $this->load->view('side_menu') ;?>

	</div><!-- /panel -->

	<div data-role="panel" data-position="right" data-display="reveal" data-theme="a" id="add-form">

        <form class="userform" method="post" action="">

        	<h2>Login Admin</h2>

            <label for="Username">Username</label>
            <input type="text" name="username" id="username" value="" data-clear-btn="true" data-mini="true">
            <label for="Password">Password</label>
            <input type="text" name="password" id="password" value="" data-clear-btn="true" data-mini="true">

            <div class="ui-grid-a">
                <div class="ui-block-a"><a href="#" data-rel="close" class="ui-btn ui-shadow ui-corner-all ui-btn-b ui-mini">Batal</a></div><br>
                <div class="ui-block-a"><input type="submit" class="ui-btn ui-shadow ui-corner-all ui-btn-a ui-mini" value="Login"></div>   
			</div>
        </form>

	</div><!-- /panel -->

</div><!-- /page -->

<div data-role="page" id="panel-responsive-page2">

    <div data-role="header">
        <h1>Landing page</h1>
    </div><!-- /header -->

    <div role="main" class="ui-content jqm-content">

        <p>This is just a landing page.</p>

        <a href="#panel-responsive-page1" class="ui-btn ui-shadow ui-corner-all ui-btn-inline ui-mini ui-icon-back ui-btn-icon-left">Back</a>

    </div><!-- /content -->

</div><!-- /page -->

</body>
</html>
