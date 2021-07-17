<?php
$this->load->view('template/header');
  $cabdata = $Cab->row();
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-6">
                <img src="<?php echo base_url('uploads/service/cab/').$cabdata->carimg ;?>" class="img-fluid " />
            </div>
            <div class="col-6" style="font-size:17px">
                <h5><?php echo $cabdata->carname;?></h5>
                <span><?php echo $cabdata->carmodel ;?></span>
                <hr>
                <p><?php echo $cabdata->carinfo; ?></p>
                <?php 
                   foreach($state->result() as $st){
                       if($st->id == $cabdata->state){
                           $state = $st->state;
                           break;
                       }
                   }
                ?>
                <h6>Pickup Location:</h6><?php echo $cabdata->address."<br>".$state." ".$cabdata->zip ; ?>
                <h6>Car information</h6>
                <span><?php if($cabdata->cartype == 0 ){
                    echo "Hatchback";
                }elseif($cabdata->cartype == 1){
                    echo "Sedan";
                }else{
                    echo "Suv";
                } ?></span>
                <span>,No of Seat:- <?php echo $cabdata->carset ;?>,</span>
                <span><?php echo ($cabdata->fullinc == 0)? 'Whitout Full' : 'With Full'; ?></span>
                <span>,<?php echo ($cabdata->drivetype == 0)? 'Manual' : 'Automatic'; ?><br>
                    <h6 class="mt-2">Rent :- <?php echo  $cabdata->rentcost ; ?></h6>
            </div>
        </div>
        <!---booking --form---->
        <div class="container mt-3">
            <h6>Booking Details</h6>
            <div class="row">
                <div class="col-8">

                    <form action="<?php echo base_url('BookingCl/BookingCab');?>" method="post" >
                        <div class="row">
                            <div class="col-6">
                                <input type="text" class="form-control"  name="fullname" id="fullname"   placeholder="First name">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control"  name="mobile"  id="mobile" placeholder="Mobile Number">
                            </div>
                            <div class="col-12 mt-2">
                                <input type="text" class="form-control"  name="email" id="emial"  placeholder=" Email">
                            </div>
                            <input type="hidden" name="tottalfare" id="totalfare"
                                value="<?php echo $cabdata->rentcost; ?>">
                            <div class="col-12 mt-2">
                                <input type="submit" class="btn btn-info" value="Book Now" />
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-4">
                    <ul class="list-group">
                        <li class="list-group-item active">
                            <h6>Total Coust :- <b id="prise"><?php echo $cabdata->rentcost ?> </b></h6>
                        </li>
                        <li class="list-group-item">

                            <form name="FormName">
                                <div class="row">
                                    <div class="col-6">
                                        <small>Enter You Rent Day </small>
                                        <input type="hidden" name="mainprice" id="mainprice"
                                            value="<?php echo $cabdata->rentcost ?>">
                                        <input type="number" name="holdday" id="holdday" id="holdday"
                                            style="width:110px" value="<?php echo set_value('holdday',1);?>" />
                                    </div>
                                    <div class="col-6 mt-2">
                                        <input type="button" class="btn btn-primary" value="Calculate"
                                            onclick="Calculate();" />
                                    </div>
                                </div>
                            </form>

                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>

<?php
$this->load->view('template/footer');
?>