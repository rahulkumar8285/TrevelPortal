<?php
$this->load->view('template/header');
?>
<!-- <div class="hero-wrap js-fullheight" style="background-image: url('images/bg_5.jpg');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
            data-scrollax-parent="true">
            <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span
                        class="mr-2"><a href="index.html">Home</a></span> <span>Hotel</span></p>
                <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Hotels</h1>
            </div>
        </div>
    </div>
</div> -->


<section class="ftco-section ftco-degree-bg">
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-3 sidebar">
                <div class="sidebar-wrap bg-light ftco-animate">
                    <h3 class="heading mb-4">Find City</h3>
                    <form action="#">
                        <div class="fields">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Destination, City">
                            </div>
                            <div class="form-group">
                                <div class="select-wrap one-third">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control" placeholder="Keyword search">
                                        <option value="">Select Location</option>
                                        <option value="">San Francisco USA</option>
                                        <option value="">Berlin Germany</option>
                                        <option value="">Lodon United Kingdom</option>
                                        <option value="">Paris Italy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" id="checkin_date" class="form-control" placeholder="Date from">
                            </div>
                            <div class="form-group">
                                <input type="text" id="checkin_date" class="form-control" placeholder="Date to">
                            </div>
                            <div class="form-group">
                                <div class="range-slider">
                                    <span>
                                        <input type="number" value="25000" min="0" max="120000" /> -
                                        <input type="number" value="50000" min="0" max="120000" />
                                    </span>
                                    <input value="1000" min="0" max="120000" step="500" type="range" />
                                    <input value="50000" min="0" max="120000" step="500" type="range" />
                                    </svg>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    <?php
                   foreach($hoteldetails->result()as $value){ ?>
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
                                    <div class="two">
                                        <span class="price per-price">5999/-</span>
                                    </div>
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
                <div class="row mt-5">
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
                </div>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section> <!-- .section -->
<?php
$this->load->view('template/footer');
?>