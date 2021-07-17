<?php
$this->load->view('template/header');
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container mt-5">

        <h3>Review your Booking </h3>
        <?php 
               $data = $rooms->row();
               $hodata = $hotel->row();
            //    print_r($rommservice);
              if((!empty($hotel)) && (!empty($data))){ ?>
        <div class="container mt-3">
            <div class="row">
                <div class="col-8">
                    <h6><?php echo $hodata->hotelname ;?></h6>
                    <p><?php echo $hodata->hoteladd."<br>".$hodata->hotelinfo."<br>".$data->hotleinfo ;
                            echo "<br> <h6> Rooms ".$data->norooms." Adoult ".($data->noadults*2)." Child ".$data->nochild."</h6>" ; ?>
                        <br>
                    <h6>Price Includes</h6>
                    </p>
                    <?php 
                 $fc = explode(" ",$data->facilites);
                 $i=0;?>
                    <div class="row">
                        <?php foreach($rommservice as $key=>$value){
                      if($key == $fc[$i]){?>
                        <div class="custom-label ml-1"><?php echo $value; ?> </div>
                        <?php   if($key == end($fc)){
                            break ;
                        }
                                $i++;
                            }
                        }
                ?>
                    </div>
                </div>
                <div class="col-4">
                    <img src="<?php echo base_url('uploads/service/hotels/').$hodata->imgname; ?>" class="img-fluid " />
                </div>

            </div>

            <div class="row mt-2">

                <div class="col-8">
                    <h4 class="mt-2">Booking User Details</h4>
                    <form action="<?php echo base_url('BookingCl/hotelbook');?>" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Full Name</label>
                                <input type="email" class="form-control" id="fullname" name="fullname"
                                    value="<?php echo set_value('fullname'); ?>" placeholder="Enter Full Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Mobile Number</label>
                                <input type="number" class="form-control" id="mobilenumber" name="mobilenumber"
                                    value="<?php echo set_value('mobilenumber'); ?>" placeholder="Mobile Number">
                            </div>

                            <div class="form-group col-12">
                                <label for="inputEmail4">Email </label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo set_value('email'); ?>" placeholder="Email">
                            </div>
                            <input type="hidden" name="mainprice" value="<?php echo $data->mainprice ; ?>">
                            <input type="hidden" name="offer" value="<?php echo $offer ; ?>">
                            <input type="hidden" name="bookid" value="<?php echo $data->rid ; ?>">
                            <input type="hidden" name="hoteid" value="<?php echo $hodata->hid ; ?>">
                        </div>
                </div>
                <div class="col-4">
                    <div class="list-group">
                        <button type="button" class="list-group-item list-group-item-action">
                           <?php echo "Room Coust :- ".$data->mainprice; 
                             if($offer ==1){ echo "<br> You Coupe Valid 20 % Off " ; $finalprice = $data->mainprice - ($data->mainprice*20/100) ; }else{$finalprice = $data->mainprice ;}?>
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">   
                         <?php echo " You Hold Day is ". (!empty($holdday)? $holdday : '1') ;?> 
                        </button>
                        <button type="button" class="list-group-item list-group-item-action">
                            <h6><?php echo "Total Price :- ".(!empty($totalcoust) ? $totalcoust : $finalprice ); ?></h6>
                        </button>   
                        <button type="submit"
                            class="list-group-item list-group-item-action bg-primary text-light text-center">
                            Book Now
                        </button>
                        </form>

                    </div>


                </div>
            </div>

        </div>
        <?php } ?>
    </div>
</section> <!-- .section -->
<?php
$this->load->view('template/footer');
?>