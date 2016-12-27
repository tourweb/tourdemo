<div class="row">
             <div class="col-md-12">
              <div class="col-md-3">
               <div class="page-title pull-left">
                    <h2 class="title-about">Start Planning</h2>
                </div>
                </div>
                <div class="col-md-9 col-sm-3" style="padding-top: 10px;">
                <form class="form-inline" action="" method="post">
                  <div class="form-group col-md-4 col-sm-4">
                        <?php
                          $obj=new clscity();
                          $a=$obj->disp_rec();
                          if(count($a)>0)
                               echo "<select class='form-control' name=location id=room required style='width:100%'>";
                             echo  "<option value=''>Choose your City</option>";
                          for($i=0;$i<count($a);$i++)
                          {
                          if($a[$i][0]==$cityid)
                          {
if($a[$i][0]==0)
                                                        {
                                                      echo "";
                                                         }
else{                            
echo "<option value=".$a[$i][0]." selected >".$a[$i][1]."</option>"; }
                          }
                          else{
                          if($a[$i][0]==0)
                                                        {
                                                      echo "";
                                                         }
else{                            
                            echo "<option value=".$a[$i][0].">".$a[$i][1]."</option>"; }
                          }
                                
                        
                      }
                      ?>   
                      </select>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                       <?php
                            $obj=new clscat();
                            $arr=$obj->disp_rec();
                            if(count($arr)>0)
                                 echo "<select id=adults class=form-control name=category style='width:100%'>";
                              
                            for($j=0;$j<count($arr);$j++)
                            {   
                               if($arr[$j][0]==$catid)
                          {
                          echo "<option value=".$arr[$j][0]." selected >".$arr[$j][1]."</option>";
                        }
                        else
                        {
                            echo "<option value=".$arr[$j][0]." >".$arr[$j][1]."</option>";
                        }
                        }
                        ?>    
                      </select>
                  </div>
                  <div class="form-group col-md-4 col-sm-4">
                  <center>
                    <input type="submit" class="btn btn-primary" name="search" value="Search Tours" style="width:80%"></center>
                </div>
                </form>
              </div>
             </div>
          </div>