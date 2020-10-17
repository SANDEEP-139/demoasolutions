<?php
   $corceid;$clstcrid="";
   $myData= $myModel->select_tim_class($this->getSession('userid'));
   foreach($myData as $cource):
       $corceid=$cource->id;
       $clstcrid=$cource->classteacherid;
       $cl=0;
?>
   <div class="artmhead arradius">
   <?php echo $cource->name;
    if($cource->sec==0){
   ?>
    <i onclick="allertrady('<?php echo $corceid ?>','<?php echo $cource->name ?>','<?php echo $clstcrid ?>','No')" class="fas fa-edit text-dark-pastel-green armgleft"></i>
    <?php } ?>
   </div>
   <div class="artmbody">
   <?php
       if($cource->sec>0){
           $class_id=$corceid;
           $class_name=$cource->name;
           $mySection= $myModel->select_class_section($cource->id);
           foreach($mySection as $section):
               $sectionid=$section->id;
               $clstcrid= $section->classteacherid;
               ?>
                   <div class="artmchldhead arradius">Section : <?php echo $section->name; ?><i onclick="allertrady('<?php echo $class_id ?>','<?php echo '('.$class_name.') Section : '.$section->name ?>','<?php echo $clstcrid ?>','<?php echo $sectionid ?>')" class="fas fa-edit text-black armgleft"></i></div>
               
                   <table class="table display data-table armg10 arcldactive">
                       <thead>
                           <tr>
                               <th>Class Time</th>
                               <th>Monday</th>
                               <th>Tuesday</th>
                               <th>Wednesday</th>
                               <th>Thursday</th>
                               <th>Friday</th>
                               <th>Saturday</th>
                           </tr>
                       </thead>
                       <tbody>
                           <?php
                               $Data= $myModel->select_collage_period($this->getSession('userid'));
                               foreach($Data as $timing):
                                   if($timing->priod_name=="Drink Break" || $timing->priod_name=="Lunch Break"){
                                       echo '<tr><td colspan="7" class="arbreack text-center">'. $timing->priod_name .'</td></tr>';
                                   }
                                   else{
                                       $cource= $myModel->select_table_cource($this->getSession('userid'),$sectionid,$timing->id);
                           ?>
                           <tr>
                               <td class="align-middle"><?php echo $timing->start_time; ?></td>
                               <td>
                                   <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->mo_lecture)){echo '---';}else{echo $cource->mo_lecture;}?></div>
                                   <div class="arwith"><?php if(empty($cource->mo_teacher)){echo '---';}else{echo $cource->mo_teacher;}?>
                                       <?php if(!empty($cource->mo_teacherid)){if($clstcrid==$cource->mo_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                                   </div>
                               </td>
                               <td>
                                   <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->tu_lecture)){echo '---';}else{echo $cource->tu_lecture;}?></div>
                                   <div class="arwith">
                                       <?php if(empty($cource->tu_teacher)){echo '---';}else{echo $cource->tu_teacher;}?>
                                       <?php if(!empty($cource->tu_teacherid)){if($clstcrid==$cource->tu_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                                   </div>
                               </td>
                               <td>
                                   <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->we_lecture)){echo '---';}else{echo $cource->we_lecture;}?></div>
                                   <div class="arwith"><?php if(empty($cource->we_teacher)){echo '---';}else{echo $cource->we_teacher;}?>
                                   <?php if(!empty($cource->we_teacherid)){if($clstcrid==$cource->we_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                                   </div>
                               </td>
                               <td>
                                   <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->th_lecture)){echo '---';}else{echo $cource->th_lecture;}?></div>
                                   <div class="arwith"><?php if(empty($cource->th_teacher)){echo '---';}else{echo $cource->th_teacher;}?>
                                   <?php if(!empty($cource->th_teacherid)){if($clstcrid==$cource->th_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                                   </div>
                               </td>
                               <td>
                                   <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->fr_lecture)){echo '---';}else{echo $cource->fr_lecture;}?></div>
                                   <div class="arwith"><?php if(empty($cource->fr_teacher)){echo '---';}else{echo $cource->fr_teacher;}?>
                                   <?php if(!empty($cource->fr_teacherid)){if($clstcrid==$cource->fr_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                                   </div>
                               </td>
                               <td>
                                   <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->st_lecture)){echo '---';}else{echo $cource->st_lecture;}?></div>
                                   <div class="arwith"><?php if(empty($cource->st_teacher)){echo '---';}else{echo $cource->st_teacher;}?>
                                   <?php if(!empty($cource->st_teacherid)){if($clstcrid==$cource->st_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                                   </div>
                               </td>       
                           </tr>
                           <?php
                                   }
                               endforeach;
                           ?>
                           
                           
                       </tbody>
                   </table>
               <?php
           endforeach;
       }
       else{
   ?>
           <table class="table display data-table armg10">
               <thead>
                   <tr>
                       <th>Class Time</th>
                       <th>Monday</th>
                       <th>Tuesday</th>
                       <th>Wednesday</th>
                       <th>Thursday</th>
                       <th>Friday</th>
                       <th>Saturday</th>
                   </tr>
               </thead>
               <tbody>
                   <?php
                       $Data= $myModel->select_collage_period($this->getSession('userid'));
                       foreach($Data as $timing):
                           if($timing->priod_name=="Drink Break" || $timing->priod_name=="Lunch Break"){
                               echo '<tr><td colspan="7" class="arbreack text-center">'. $timing->priod_name .'</td></tr>';
                           }
                           else{
                               $cource= $myModel->select_table_cource($this->getSession('userid'),$corceid,$timing->id);
                   ?>
                   <tr>
                       <td class="align-middle"><?php echo $timing->start_time; ?></td>
                       <td>
                           <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->mo_lecture)){echo '---';}else{echo $cource->mo_lecture;}?></div>
                           <div class="arwith"><?php if(empty($cource->mo_teacher)){echo '---';}else{echo $cource->mo_teacher;}?>
                               <?php if(!empty($cource->mo_teacherid)){if($clstcrid==$cource->mo_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                           </div>
                       </td>
                       <td>
                           <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->tu_lecture)){echo '---';}else{echo $cource->tu_lecture;}?></div>
                           <div class="arwith">
                               <?php if(empty($cource->tu_teacher)){echo '---';}else{echo $cource->tu_teacher;}?>
                               <?php if(!empty($cource->tu_teacherid)){if($clstcrid==$cource->tu_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                           </div>
                       </td>
                       <td>
                           <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->we_lecture)){echo '---';}else{echo $cource->we_lecture;}?></div>
                           <div class="arwith"><?php if(empty($cource->we_teacher)){echo '---';}else{echo $cource->we_teacher;}?>
                           <?php if(!empty($cource->we_teacherid)){if($clstcrid==$cource->we_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                           </div>
                       </td>
                       <td>
                           <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->th_lecture)){echo '---';}else{echo $cource->th_lecture;}?></div>
                           <div class="arwith"><?php if(empty($cource->th_teacher)){echo '---';}else{echo $cource->th_teacher;}?>
                           <?php if(!empty($cource->th_teacherid)){if($clstcrid==$cource->th_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                           </div>
                       </td>
                       <td>
                           <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->fr_lecture)){echo '---';}else{echo $cource->fr_lecture;}?></div>
                           <div class="arwith"><?php if(empty($cource->fr_teacher)){echo '---';}else{echo $cource->fr_teacher;}?>
                           <?php if(!empty($cource->fr_teacherid)){if($clstcrid==$cource->fr_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                           </div>
                       </td>
                       <td>
                           <div class="arwith font-weight-bold text-light-sea-green"><?php if(empty($cource->st_lecture)){echo '---';}else{echo $cource->st_lecture;}?></div>
                           <div class="arwith"><?php if(empty($cource->st_teacher)){echo '---';}else{echo $cource->st_teacher;}?>
                           <?php if(!empty($cource->st_teacherid)){if($clstcrid==$cource->st_teacherid && $cl==0){$cl=1;echo '<div class="cltcr">C</div>';}} ?>
                           </div>
                       </td>       
                   </tr>
                   <?php
                           }
                       endforeach;
                   ?>
                   
                   
               </tbody>
           </table>
       <?php } ?>
       <div class="arclear"></div>
   </div>
<?php
   endforeach;         
?>