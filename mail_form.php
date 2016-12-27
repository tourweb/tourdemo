<form class="form" method="POST" action="<?php echo $domain;?>mail.php" autocomplete="on">
                          <div class="col-md-12 fc-content">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name" id="destination1" name="name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Country Code" id="destination1" name="c_code" required>
                            </div>
<div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone No." id="destination1" name="phone" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Email-id" id="destination1" name="email" required>
                            </div>
                           
                          </div>
                        
                          <div class="col-md-12 fc-content">
                             <textarea name="message" placeholder="Your Message" rows="5" class="form-control" required></textarea>
                             <input type="hidden" name="city" value="<?php echo $l; ?>" >
                             
                            <button type="submit" class="btn submit-contact"><i class="fa fa-envelope-o"></i>SUBMIT</button>
                            

                          </div>
                        </form>