<?php
if($_POST)
{
        
	$first_name = trim($_POST['first_name']);
	$amount = trim($_POST['amount']);
        $cat_promo = trim($_POST['cat_promo']);
        if($first_name=="XMAS10")
        {
            if($cat_promo==2)
            {
                $amount=(0.90*$amount);
            }
           
        }
        else{
            $amount=$amount;
        }
        ?>
                     <center><div class="form-group col-md-12">
                       <h3 class="btn btn-success btn-lg">Total Package Price</h3>
                     </div>
                     <div class="form-group col-md-12">
                      
               <div class="myPrice " id="tot">USD $ <?php echo $amount; ?></div>
             </div>
               <div class="form-group col-md-12">
              <input type="submit" class="btn btn-primary btn-lg" value="Make Full Payment" name="btnbook" >
               </div>
              <div class="form-group col-md-12">
             <button class="btn btn-warning" style="border-radius: 23px;">OR</button>
              </div>
             <div class="form-group col-md-12">
               <div class="myPrice" id="half">USD $ <?php echo $half=$amount*(20/100); ?></div>
             </div>
            
               <div class="form-group col-md-12">
                <input type="submit" class="btn btn-primary btn-lg" value="Pay Only 20% Now" name="btnhalf">
                <input type="hidden" name="amount" value="<?php echo $amount; ?>" >
                <input type="hidden" name="half" value="<?php echo $half; ?>" >
              </div>
                         
              </center>
<?php
}
?>