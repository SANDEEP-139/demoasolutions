
        </div>
        <!-- Page Area End Here -->
    </div>
    
    <?php linkJquery("js/jquery-3.3.1.min.js") ?>
    <?php linkJquery("js/plugins.js") ?>
    <?php linkJquery("js/popper.min.js") ?>
    <?php linkJquery("js/bootstrap.min.js") ?>
    <?php linkJquery("js/jquery.counterup.min.js") ?>
    <?php linkJquery("js/moment.min.js") ?>
    <?php linkJquery("js/jquery.waypoints.min.js") ?>
    <?php linkJquery("js/jquery.scrollUp.min.js") ?>
    <?php linkJquery("js/fullcalendar.min.js") ?>
    <?php linkJquery("js/Chart.min.js") ?>
    <?php linkJquery("js/main.js") ?>
    <?php 
    $curl=$_SERVER['REQUEST_URI'];
    $checks  = ['registration','save_student','profile_update','mapping_data_update','photo_update','contact_update','student_id_generate','guardian_id_generate','profile_update_random'];
    if($this->multi_strpos($curl, $checks) !== false){
        linkJquery("js/select2.min.js");
        linkJquery("js/datepicker.min.js");
        linkJquery("js/jquery.scrollUp.min.js");
    }
    $checks  = ['registration_list','enquiry_list'];
    if($this->multi_strpos($curl, $checks) !== false){
        linkJquery("js/jquery.dataTables.min.js");
    }
    ?>
</body>
</html>