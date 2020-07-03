<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Proddi <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Prodi <?php echo form_error('nama_prodi') ?></label>
            <input type="text" class="form-control" name="nama_prodi" id="nama_prodi" placeholder="Nama Prodi" value="<?php echo $nama_prodi; ?>" />
        </div>
	    <input type="hidden" name="no" value="<?php echo $no; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('proddi') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>