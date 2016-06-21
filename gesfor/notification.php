<?php 
    require('head.php');
	require('header.php'); 
	require('classes/utilisateurs.php');
	
?>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Notifications from admin</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    
                </div>
            </div>
            <div class="box-content row">
                <?php include('decision_validation.php');?>        

        </div>
    </div>
</div>


<?php require('footer.php'); ?>

