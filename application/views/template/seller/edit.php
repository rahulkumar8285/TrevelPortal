<?php $this->load->view('template/seller/header');
 $data=$row->row();
//  print_r($row);
//  print_r($state);
?>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!---------->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Edit Cab</h5>
                <div class="card-body">
                    <!--------->
                    <?php
                    if(!empty($unknown)){
                        echo'<div class="alert alert-danger" role="alert">
                             '.$unknown.'
                            </div>';
                    }
                    if(!empty($Success)){
                        echo'<div class="alert alert-success" role="alert">
                             '.$Success.'
                            </div>';
                    }
                    ?>
                    <form action="<?php echo base_url('Sellerawork/update');?>" method="post"
                        enctype="multipart/form-data">

                        <input type="hidden" name="edid" value="<?php echo $data->cid;?>">
                        <div class="row">
                            <div class="col-4">
                                <img src="<?php echo base_url('uploads/service/cab/').$data->carimg ;?>"
                                    style="height:280px;width: 355px;">
                                <div class="form-group mt-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input
                                        <?php if(!empty($error)){ echo 'is-invalid';} ?>" id="carimg" name="carimg">
                                        <label class="custom-file-label" for="customFile">Change Image</label>

                                        <smal class="text-danger"><?php 
                                        if(!empty($allfilereq)){
                                            echo $allfilereq;  
                                        }
                                        if(!empty($error)){
                                            echo $error;
                                            if($filename =='carimg'){ 
                                            echo $filename."file Must PDF AND DOC" ;
                                            }
                                        }
                                        ?></smal>
                                    </div>

                                </div>

                            </div>
                            <!------->
                            <div class="col-8">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="carname">Car Name</label>
                                        <input type="text" class="form-control 
                                    <?php
                                    echo (form_error('carname')!=="")?'is-invalid' : '' 
                                    ?>" id="carname" name="carname"
                                            value="<?php echo set_value('carname',$data->carname);?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="carmodel">Car Model </label>
                                        <input type="text" class="form-control 
                                    <?php
                                    echo (form_error('carmodel')!=="")?'is-invalid' : '' 
                                    ?>" id="carmodel" name="carmodel"
                                            value="<?php echo set_value('carmodel',$data->carmodel);?>">

                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="carnumber">Car Number</label>
                                        <input type="text" class="form-control 
                                    <?php
                                    echo (form_error('carnumber')!=="")?'is-invalid' : '' 
                                    ?> text-uppercase" id="carnumber" name="carnumber"
                                            value="<?php echo set_value('carnumber',$data->carnumber);?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="rentcost">Rent Cost</label>
                                        <input type="text" class="form-control 
                                    <?php
                                    echo (form_error('rentcost')!=="")?'is-invalid' : '' 
                                    ?>" id="rentcost" name="rentcost"
                                            value="<?php echo set_value('rentcost',$data->rentcost);?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="cartype">Car Type</label>
                                        <select class="form-control form-control-sm" name="cartype" id="cartype">
                                            <!---old select value this-->
                                            <option <?php echo set_select('cartype',0);?> value="0"
                                                <?php echo ($data->cartype == 0)? 'selected' : ' '; ?>>Hatchback
                                            </option>
                                            <option <?php echo set_select('cartype',1);?> value="1"
                                                <?php echo ($data->cartype == 1)? 'selected' : ' '; ?>>Sedan</option>
                                            <option <?php echo set_select('cartype',2);?> value="2"
                                                <?php echo ($data->cartype == 2)? 'selected' : ' '; ?>>Suv</option>
                                            <!------>
                                        </select>
                                    </div>
                                    <!------->
                                    <div class="form-group col-md-4">
                                        <label for="fullinc">Full</label>
                                        <select class="form-control form-control-sm" name="fullinc" id="fullinc">
                                            <option <?php echo set_select('fullinc',0);?> value="0"
                                                <?php echo ($data->fullinc == 0)? 'selected' : ' '; ?>>Without Full
                                            </option>
                                            <option <?php echo set_select('fullinc',1);?> value="1">
                                                <?php echo ($data->fullinc == 1)? 'selected' : ' '; ?> With Full
                                            </option>
                                        </select>
                                    </div>
                                    <!------->
                                    <div class="form-group col-md-4">
                                        <label for="carset">No Seat</label>
                                        <select class="form-control form-control-sm" name="carset" id="carset">
                                            <option <?php echo set_select('carset',2);?> value="2"
                                                <?php echo ($data->carset == 2)? 'selected' : ' '; ?>>P2</option>
                                            <option <?php echo set_select('carset',4);?> value="4"
                                                <?php echo ($data->carset == 4)? 'selected' : ' '; ?>>p4</option>
                                            <option <?php echo set_select('carset',6);?> value="6"
                                                <?php echo ($data->carset == 6)? 'selected' : ' '; ?>>p6</option>
                                            <option <?php echo set_select('carset',8);?> value="8"
                                                <?php echo ($data->carset == 8)? 'selected' : ' '; ?>>p8</option>
                                        </select>
                                    </div>
                                    <!------->
                                    <div class="form-group col-md-4">
                                        <label for="drivetype">Drive Type</label>
                                        <select class="form-control form-control-sm" name="drivetype" id="drivetype">
                                            <option <?php echo set_select('drivetype',0);?> value="0"
                                                <?php echo ($data->carset == 0)? 'selected' : ' '; ?>>Manual</option>
                                            <option <?php echo set_select('drivetype',1);?> value="1"
                                                <?php echo ($data->carset == 1)? 'selected' : ' '; ?>>Automatic

                                        </select>
                                    </div>
                                    <!------->
                                </div>
                            </div>
                            <!----col---8--->
                            <div class="col-12 pt-3">
                                <div class="form-group">
                                    <label for="address">Pickup Location</label>
                                    <input type="text" class="form-control 
                                <?php
                                echo (form_error('address')!=="")?'is-invalid' : '' 
                                ?>" id="address" value="<?php echo $data->address;?>" name="address">
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control 
                                <?php
                                echo (form_error('city')!=="")?'is-invalid' : '' 
                                ?>" id="city" name="city" value="<?php echo $data->city?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="state">State</label>
                                        <select class="form-control form-control-sm" name="state" id="state"
                                            class="form-control">
                                            <?php
                                    foreach ($state->result() as $st){
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
                                    " id="zip" name="zip" value="<?php echo $data->zip?>">
                                    </div>

                                </div>
                                <!------>
                                <div class="form-group">
                                    <label for="carinfo">Car info </label>
                                    <textarea class="form-control" id="carinfo" name="carinfo" rows="3">
                                    <?php echo $data->carinfo ;?>
                                    </textarea>
                                </div>
                                <!--------->
                            </div>
                            <!----->
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="form-group col-4">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input mb-2
                                <?php if(!empty($error)){ echo 'is-invalid';} ?>
                                " id="carrc" name="carrc">
                                            <label class="custom-file-label" for="customFile">Car Rc</label>
                                            <!-- <input type="file" name="adharfile"> -->
                                        
                                            <a href="<?php echo base_url('uploads/service/cab/').$data->carrc;?>" target="_blank" >
                                             <?php echo $data->carrc; ?>
                                            </a>

                                            <smal class="text-danger"><?php 
                    
                                if(!empty($allfilereq)){
                                    echo $allfilereq;  
                                }
                                if(!empty($error)){
                                    echo $error;
                                    if($filename =='carrc'){ 
                                    echo $filename."file Must PDF AND DOC" ;
                                    }
                                }
                    
                               ?></smal>
                                        </div>
                                    </div>
                                    <div class="form-group col-4">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input mb-2
                                    <?php if(!empty($error)){ echo 'is-invalid';} ?>
                                    " id="carinsurance" name="carinsurance">
                                            <label class="custom-file-label" for="customFile">Car Insurance</label>
                                            <a href="<?php echo base_url('uploads/service/cab/').$data->carinsurance;?>" target="_blank" >
                                             <?php echo $data->carinsurance; ?>
                                            </a>
                                            <smal class="text-danger"><?php 
                                    if(!empty($allfilereq)){
                                        echo $allfilereq;  
                                    }
                                    if(!empty($error)){
                                        echo $error;
                                        if($filename =='carinsurance'){ 
                                        echo $filename."file Must PDF AND DOC" ;
                                        }
                                    }
                                    ?></smal>
                                        </div>
                                    </div>

                                    <div class="form-group col-4">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input mb-2
                                        <?php if(!empty($error)){ echo 'is-invalid';} ?>
                                        " id="documnet" name="documnet">
                                            <label class="custom-file-label" for="customFile">Any Document</label>
                                            <a href="<?php echo base_url('uploads/service/cab/').$data->documnet;?>" target="_blank" >
                                             <?php echo $data->documnet; ?>
                                            </a>
                                            <smal class="text-danger"><?php 
                                        if(!empty($allfilereq)){
                                            echo $allfilereq;  
                                        }
                                        if(!empty($error)){
                                            echo $error;
                                            if($filename =='documnet'){ 
                                            echo $filename."file Must PDF AND DOC" ;
                                            }
                                        }
                                        ?></smal>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----->
                            <div class="col-12">
                                <button type="submit" class="btn  btn-primary">Eddit </button>
                            </div>
                        </div>
                    </form>
                    <!-------->
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('template/seller/footer');?>