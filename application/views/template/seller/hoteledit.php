<?php
$this->load->view('template/seller/header');
?>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Edit Hotel </h2>
                </div>
            </div>
        </div>
        <?php
            $data = $user->row();
            // print_r($user);
            if(!empty($succuss)){
                echo '<div class="alert alert-success" role="alert">
                '.$succuss.'</div>';  
            }
            if(!empty($error)){
                echo '<div class="alert alert-danger" role="alert">
                '.$error.'</div>';  
            }
            if(!empty($imgselect)){
                echo '<div class="alert alert-danger" role="alert">
                '.$imgselect.'</div>';  
            }
            if(!empty($imgerro)){
                echo '<div class="alert alert-danger" role="alert">
                '.$imgerro.'select only pdf,jpg and jpeg'.'</div>';  
            }
            if(!empty($adminerror)){
                echo '<div class="alert alert-danger" role="alert">
                '.$adminerror.'select only pdf,jpg and jpeg'.'</div>';  
            }
            if(!empty($adminerror)){
                echo '<div class="alert alert-danger" role="alert">
                '.$adminerror.'select only pdf,jpg and jpeg'.'</div>';  
            }
            if(form_error('hotelid')){
                echo '<div class="alert alert-danger" role="alert">
                '.form_error('hotelid').'</div>';  
            }
            
        ?>
        <!---->
        <div class="row">
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('Sellerawork/updateHotel');?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-row">
                                <!----->
                                <input name="edid" type="hidden" value="<?php echo $data->hid;?>">
                                <div class="form-group col-md-6">
                                    <label for="hotelname">Hotel Name</label>
                                    <input type="text" class="form-control 
                                    <?php
                                    echo (form_error('hotelname')!=="")?'is-invalid' : '' 
                                    ?>" id="hotelname" name="hotelname"
                                        value="<?php echo set_value('hotelname',$data->hotelname);?>">
                                </div>
                                <!----->
                                <div class="form-group col-md-3">
                                    <label for="hotelid">Hotel ID</label>
                                    <input type="text" class="form-control 
                                <?php
                                echo (form_error('hotelid')!=="")?'is-invalid' : '' 
                                ?>" id="hotelid" name="hotelid"
                                        value="<?php echo set_value('hotelid',$data->hotelid);?>">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="hotelconnum">Hotel Contact Number</label>
                                    <input type="text" class="form-control 
                                    <?php
                                    echo (form_error('hotelconnum')!=="")?'is-invalid' : '' 
                                    ?> text-uppercase" id="hotelconnum" name="hotelconnum"
                                        value="<?php echo set_value('hotelconnum',$data->hotelconnum);?>">
                                </div>
                            </div>

                            <div class="form-row ">
                                <!-----javascript--->
                                <div class="form-group col-md-12">
                                    <label for="facilites">Hotel Facility</label><br>
                                    <?php
                                    $fac = explode(",",$data->facilites);
                                    $i=0;
                                    foreach ($Facilities as $index=> $value){?>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="facilites[]"
                                            <?php echo set_checkbox('facilites', $index) ?>
                                            value="<?php echo $index; ?>" <?php if($i<count($fac)){
                                               if($index == $fac[$i]){
                                                   echo "checked";
                                                   $i++;
                                               }
                                            }?>><span class="custom-control-label"><?php echo $value; ?></span>
                                    </label>
                                    <?php  } ?>
                                </div>
                            </div>
                            <!---location--box-->
                            <!----testing--->


                            <!----->


                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="hoteladd">Hotel Address</label>
                                    <input type="text" class="form-control 
                                <?php
                                echo (form_error('hoteladd')!=="")?'is-invalid' : '' 
                                ?>" id="hoteladd" placeholder="Hotel Address "
                                        value="<?php echo set_value('hoteladd',$data->hoteladd);?>" name="hoteladd">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nearlandmark">Near Land Mark</label>
                                    <input type="text" class="form-control 
                                <?php
                                echo (form_error('nearlandmark')!=="")?'is-invalid' : '' 
                                ?>" id="nearlandmark" placeholder="Landmark "
                                        value="<?php echo set_value('nearlandmark',$data->nearlandmark);?>"
                                        name="nearlandmark">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control 
                                <?php
                                echo (form_error('city')!=="")?'is-invalid' : '' 
                                ?>" id="city" name="city" value="<?php echo set_value('city',$data->city);?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="state">State</label>
                                    <select class="form-control form-control-sm" name="state" id="state"
                                        class="form-control">
                                        <?php
                                        foreach ($row->result() as $st){
                                            $selectd = ($data->state == $st->id)? true: false; ?>
                                        <option <?php   echo set_select('state',$st->id,$selectd);?>
                                            value="<?php echo $st->id ?>">
                                            <?php echo $st->state; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control
                                    <?php echo (form_error('zip')!=="")?'is-invalid':''?>
                                    " id="zip" name="zip" value="<?php echo set_value('zip',$data->zip);?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="hotelinfo">Hotel Info </label>
                                <textarea class="form-control" id="hotelinfo" name="hotelinfo" rows="4">
                                <?php echo set_value('hotelinfo',$data->hotelinfo); ?>
                                </textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input
                                        <?php echo (!empty($imgselect) || !empty($imgerro))?'is-invalid' : '' ?>
                                         " id="hotlimg" name="hotlimg" cols="80" wrap="virtual">
                                        <label class="custom-file-label" for="customFile"> Select Hotel image</label>
                                        <a href="" class="pt-2"><?php echo $data->imgname ?></a>
                                    </div>
                                </div>
                                <div class="form-group col-9">
                                    <div class="custom-file ">
                                        <input type="file" class="custom-file-input
                                        <?php echo (!empty($imgselect) || !empty($imgerro))?'is-invalid' : '' ?>
                                        " id="hotmullimg" name="hotmullimg[]" multiple>
                                        <label class="custom-file-label" for="customFile">
                                            Select Multipel Images </label>
                                        <?php if(!empty($data->img0)){?>
                                        <a href="<?php echo base_url('uploads/service/hotels/rooms/').$data->img0?>" target="_blank" ><?php echo $data->img1;?>,</a>
                                        <?php }if(!empty($data->img1)){?>
                                        <a href="<?php echo base_url('uploads/service/hotels/rooms/').$data->img1?>" target="_blank" ><?php echo $data->img1;?>,</a>
                                        <?php } if(!empty($data->img2)){?>
                                        <a href="<?php echo base_url('uploads/service/hotels/rooms/').$data->img2?>" target="_blank" ><?php echo $data->img2;?>,</a>
                                        <?php } ?>
                                        <?php if(!empty($data->img3)){?>
                                        <a href="<?php echo base_url('uploads/service/hotels/rooms/').$data->img3?>" target="_blank" ><?php echo $data->img3;?>,</a>
                                        <?php } if(!empty($data->img4)){?>
                                        <a href="<?php echo base_url('uploads/service/hotels/rooms/').$data->img4?>" target="_blank" ><?php echo $data->img3;?>,</a>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                            <button type="file" class="btn  btn-primary">Edit Hotel</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end validation form -->
            <!-- ============================================================== -->
        </div>
        <!----->


    </div>
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
    <?php
$this->load->view('template/seller/footer');
?>