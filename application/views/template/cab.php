<?php
$this->load->view('template/header');
// $state = $state->row();
?>

<section class="ftco-section ftco-degree-bg">
    <!----containe---HotelData Show----->
    <?php 
     if($cab->num_rows()>0){
        // $hoteldetails = $hoteldata->row();

        // print_r($hoteldetails);
        ?>
    <div class="container mt-5">
        <div class="row">
            <?php
                   foreach($cab->result() as $value){ ?>
            <div class="col-md-4 ftco-animate">
                <div class="destination">
                    <a href="<?php echo base_url('Home/SingalCab/').$value->cid ;?>"
                        class="img img-2 d-flex justify-content-center align-items-center"
                        style="background-image: url(<?php  echo base_url('uploads/service/cab/').$value->carimg ; ?>);">
                    </a>
                    <div class="text p-3">
                        <div class="d-flex">
                            <div class="one">
                                <h3><a href="<?php echo base_url('Home/SingalCab/').$value->cid ;?> ">
                                        <?php echo $value->carname; ?>
                                    </a></h3>
                                <p class="rate">

                                </p>
                            </div>
                            <div class="two">
                                <span class="price per-price"><?php echo $value->rentcost;  ?></span>
                            </div>
                        </div>
                        <p>
                            <?php echo substr($value->carinfo,0,75).".."; ?>
                        </p>
                        <hr>
                        <p class="bottom-area d-flex">
                            <span><i class="icon-map-o text-Upercase "></i>
                                <?php echo ucwords($value->city); 
                                    foreach ($state->result() as $st){ 
                                        if( $value->state == $st->id ){   
                                            echo " ".$st->state;
                                        }
                                    }
                                    ?>
                            </span>
                            <span class="ml-auto"><a href="<?php echo base_url('Home/SingalCab/').$value->cid ;?> ">Book
                                    Now</a></span>
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
    <h1 class="text-center text-danger mt-5">Not Data </h1>
    <?php }?>

</section>

<?php
$this->load->view('template/footer');
?>