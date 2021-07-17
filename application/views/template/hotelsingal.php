<?php
$this->load->view('template/header');                             
$value = $data->row();
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container mt-5">

        <div class="col-md-12 ftco-animate">
            <div class="single-slider owl-carousel">
                <?php 
                            if(!empty($value->img0)){?>
                <div class="item">
                    <div class="hotel-img"
                        style="background-image: url(<?php echo base_url('uploads/service/hotels/rooms/').$value->img0 ;?>);">
                    </div>
                </div>
                <?php }
                             if(!empty($value->img1)){?>
                <div class="item">
                    <div class="hotel-img"
                        style="background-image: url(<?php echo base_url('uploads/service/hotels/rooms/').$value->img1 ;?>);">
                    </div>
                </div>
                <?php }
                             if(!empty($value->img2)){?>
                <div class="item">
                    <div class="hotel-img"
                        style="background-image: url(<?php echo base_url('uploads/service/hotels/rooms/').$value->img2 ;?>);">
                    </div>
                </div>
                <?php } 
                            if(!empty($value->img3)){?>
                <div class="item">
                    <div class="hotel-img"
                        style="background-image: url(<?php echo base_url('uploads/service/hotels/rooms/').$value->img3 ;?>);">
                    </div>
                </div>
                <?php } 
                            if(!empty($value->img4)){?>
                <div class="item">
                    <div class="hotel-img"
                        style="background-image: url(<?php echo base_url('uploads/service/hotels/rooms/').$value->img4 ;?>);">
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
        <div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
            <span>Our Best hotels &amp; Rooms</span>
            <h2><?php echo $value->hotelname,$value->city; ?></h2>
            <p class="rate mb-5">
                <span class="loc"><a href="#"><i class="icon-map"></i>
                        <?php echo $value->hoteladd ; ?>
                    </a></span>
                <!-- <span class="star">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star-o"></i>
                                8 Rating</span>  -->
            </p>
            <h4>Facilities</h4>
            <div class="row">
                <?php
                            $fc =  explode(" ,",$value->facilites);
                            $i=0;
                            foreach($facilites as $index=>$value){ 
                              if($index ==$fc[$i]){?>
                <div class="custom-label m-1">
                    <?php echo $value; ?>
                </div>
                <?php
                            if($index == end($fc)){break;}
                            $i++;}
                         } ?>
            </div>
            <!----room--div-->
            <?php
                        // print_r($rooms);
                         if($rooms->num_rows()>0){
                            $roomdata =  $rooms->result(); ?>
            <div class="container mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:15%">Room Type</th>


                            <th style="width:70%">Information</th>

                            <th style="width:15%">Book Now</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                    
                                    foreach($roomdata as $Data){  
                                if($Data->status == 1){?>

                        <tr>
                            <td><?php 
                                            foreach($Roomtype as $key=>$value){
                                                if($key == $Data->roomtype){
                                                   echo $value;
                                                }
                                            }
                                        ?></td>
                            <td>
                                <?php
                                                //    $arr =  explode(" ",$Data->facilites);
                                                //    $co=0; 
                                                //    foreach($roomservice as $key=>$data){
                                                //    if($key = $arr[$key]){
                                                //        echo $data;
                                                //        if($key == end($arr)){
                                                //            break;
                                                //        }
                                                //    }
                                                //    }
                                                   echo "<br>".$Data->norooms." Rooms, ";
                                                   echo $Data->noadults*2," Adults, "; 
                                                   echo $Data->nochild." Childs <br>";  
                                                    echo $Data->hotleinfo; ?>

                            </td>
                            <td>
                                <h6><del><?php echo $Data->demoprice; ?></del></h6>
                                <h4><?php echo $Data->mainprice; ?></h4>

                                <form action=" <?php echo base_url('BookingCl/BookingRoom'); ?>" method="POST">
                                    <input type="hidden" name="bookid" value="<?php echo $Data->rid ;?>">
                                    <input type="hidden" name="hoteid" value="<?php echo $Data->selecthotel ;?>">
                                    <?php if(!empty($Data->copecode)){ ?>
                                    <small>Use Copen Code Off 20%</small>
                                    <label class="form-check-label" for="defaultCheck1">
                                        <?php echo $Data->copecode;?>
                                    </label>
                                    <input class="form-check-input ml-2" type="checkbox" value="1" name="Offer">
                                    <input type="hidden" name="mainprice" value="<?php echo $Data->mainprice;?>">
                                    <?php } ?>
                                    <input type="submit" class="btn btn-primary mt-2" value="Book" />
                                </form>


                            </td>

                        </tr>


                        <?php }
                          } ?>
                    </tbody>
                </table>
            </div>
            <?php  }
            else{?>
               <h2 class="text-center mt-2" > No Rooms Available </h2>
          <?php   }?>
            <!----roomdiv--cls--->
        </div>
        <!----div--close--->
        <!-- <div class="col-md-12 hotel-single ftco-animate mb-5 mt-5">
                        <h4 class="mb-4">Related Hotels</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="destination">
                                    <a href="hotel-single.html" class="img img-2"
                                        style="background-image: url(images/hotel-1.jpg);"></a>
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
                                                <p class="rate">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-o"></i>
                                                    <span>8 Rating</span>
                                                </p>
                                            </div>
                                            <div class="two">
                                                <span class="price per-price">$40<br><small>/night</small></span>
                                            </div>
                                        </div>
                                        <p>Far far away, behind the word mountains, far from the countries</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span><i class="icon-map-o"></i> Miami, Fl</span>
                                            <span class="ml-auto"><a href="#">Book Now</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="destination">
                                    <a href="hotel-single.html" class="img img-2"
                                        style="background-image: url(images/hotel-2.jpg);"></a>
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
                                                <p class="rate">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-o"></i>
                                                    <span>8 Rating</span>
                                                </p>
                                            </div>
                                            <div class="two">
                                                <span class="price per-price">$40<br><small>/night</small></span>
                                            </div>
                                        </div>
                                        <p>Far far away, behind the word mountains, far from the countries</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span><i class="icon-map-o"></i> Miami, Fl</span>
                                            <span class="ml-auto"><a href="#">Book Now</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="destination">
                                    <a href="hotel-single.html" class="img img-2"
                                        style="background-image: url(images/hotel-3.jpg);"></a>
                                    <div class="text p-3">
                                        <div class="d-flex">
                                            <div class="one">
                                                <h3><a href="hotel-single.html">Hotel, Italy</a></h3>
                                                <p class="rate">
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star"></i>
                                                    <i class="icon-star-o"></i>
                                                    <span>8 Rating</span>
                                                </p>
                                            </div>
                                            <div class="two">
                                                <span class="price per-price">$40<br><small>/night</small></span>
                                            </div>
                                        </div>
                                        <p>Far far away, behind the word mountains, far from the countries</p>
                                        <hr>
                                        <p class="bottom-area d-flex">
                                            <span><i class="icon-map-o"></i> Miami, Fl</span>
                                            <span class="ml-auto"><a href="#">Book Now</a></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
    </div>
</section> <!-- .section -->
<?php
$this->load->view('template/footer');
?>