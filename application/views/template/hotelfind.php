<?php
$this->load->view('template/header');
?>

<section class="ftco-section ftco-degree-bg">
    <!----searching ---Form --->
    <div class="container mt-5">
        <div class="row">
            <form action="<?php echo base_url('BookingCl/HotelFind') ?>" method="POST">
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control
                        <?php echo (form_error('city')!=="")?'is-invalid' : '' 
                                ?>" id="city" name="city" value="<?php echo set_value('city');?>" placeholder="City">
                    </div>
                    <div class="col">
                        <select class="custom-select mr-sm-2" id="state" name="state">
                            <option selected>Choose State</option>
                            <?php  foreach ($state->result() as $st){ ?>
                            <option <?php   echo set_select('state', $st->id);?> value="<?php echo $st->id;?>">
                                <?php  echo $st->state; ?> </option>
                            <?php }?>
                        </select>

                    </div>
                    <div class="col">
                        <input type="date" class="form-control" id="checkin" value="<?php echo set_value('checkin'); ?>"
                            name="checkin" placeholder="Email">
                    </div>
                    <div class="col">
                        <input type="date" class="form-control" id="checkout" name="checkout"
                            value="<?php echo set_value('checkout'); ?>" placeholder="Email">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!----containe---HotelData Show----->
   <?php 
     if(!empty($hoteldata)){
        // $hoteldetails = $hoteldata->row();

        // print_r($hoteldetails);
        ?>
    <div class="container mt-5">
        <div class="row">
            <?php
                   foreach($hoteldata->result() as $value){ ?>
            <div class="col-md-4 ftco-animate">
                <div class="destination">
                    <a href="<?php echo base_url('Home/hotelsingle/').$value->hid;?>"
                        class="img img-2 d-flex justify-content-center align-items-center"
                        style="background-image: url(<?php echo base_url('uploads/service/hotels/').$value->imgname ; ?>);">
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="hotel-single.html">
                                        <?php echo $value->hotelname; ?>
                                    </a></h3>
                                <p class="rate">

                                </p>
                            </div>
                            <!-- <div class="two">
                                <span class="price per-price">5999/-</span>
                            </div> -->
                        </div>
                        <p>
                            <?php echo substr($value->hotelinfo,0,75).".."; ?>
                        </p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o text-Upercase "></i> <?php echo ucwords($value->city); ?> </span>
                            <span class="ml-auto"><a href="#">Book Now</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
        <!-- <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <li><a href="#">&lt;</a></li>
                        <li class="active"><span>1</span></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&gt;</a></li>
                    </ul>
                </div>
            </div>
        </div> -->
    </div>
   <?php }else{?>
       <h1 class="text-center text-danger mt-5" >Not Data </h1>
  <?php }?>

</section>

<?php
$this->load->view('template/footer');
?>