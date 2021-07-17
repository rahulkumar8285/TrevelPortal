<?php
$this->load->view('template/seller/header');
?>
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Add Cab </h2>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <?php
if(!empty($datasend)){
    echo'<div class="alert alert-success" role="alert">
    '.$datasend.'
  </div>';
}

if(!empty($dataerror)){
    echo'<div class="alert alert-danger" role="alert">
    '.$dataerror.'
  </div>';
}
if(form_error('carnumber')){
    echo '<div class="alert alert-danger" role="alert">
    '.form_error('carnumber').'</div>';
}
?>
        <div class="row">
            <!-- ============================================================== -->
            <!-- validation form -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('Sellerawork/addcab');?>" method="post"
                            enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="carname">Car Name</label>
                                    <input type="text" class="form-control 
                                    <?php
                                    echo (form_error('carname')!=="")?'is-invalid' : '' 
                                    ?>" id="carname" name="carname" value="<?php echo set_value('carname');?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="carmodel">Car Model </label>
                                    <input type="text" class="form-control 
                                <?php
                                echo (form_error('carmodel')!=="")?'is-invalid' : '' 
                                ?>" id="carmodel" name="carmodel" value="<?php echo set_value('carmodel');?>">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="carnumber">Car Number</label>
                                    <input type="text" class="form-control 
                                    <?php
                                    echo (form_error('carnumber')!=="")?'is-invalid' : '' 
                                    ?> text-uppercase" id="carnumber" name="carnumber"
                                        value="<?php echo set_value('carnumber');?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="cartype">Car Type</label>
                                    <select class="form-control form-control-sm" name="cartype" id="cartype">
                                        <option value="0">Hatchback</option>
                                        <option value="1">Sedan</option>
                                        <option value="2">Suv</option>
                                    </select>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="rentcost">Rent Cost</label>
                                    <input type="text" class="form-control 
                                    <?php
                                    echo (form_error('rentcost')!=="")?'is-invalid' : '' 
                                    ?>" id="rentcost" name="rentcost" value="<?php echo set_value('rentcost');?>">
                                </div>
                                <!------->
                                <div class="form-group col-md-3">
                                    <label for="fullinc">Full</label>
                                    <select class="form-control form-control-sm" name="fullinc" id="fullinc">
                                        <option value="0">Without Full</option>
                                        <option value="1">With Full</option>
                                    </select>
                                </div>
                                <!--------->
                                <div class="form-group col-md-3">
                                    <label for="carset">No Seat</label>
                                    <select class="form-control form-control-sm" name="carset" id="carset">
                                        <option value="2">P2</option>
                                        <option value="4">p4</option>
                                        <option value="6">p6</option>
                                        <option value="8">p8</option>
                                    </select>
                                </div>

                                <!---->
                                <div class="form-group col-md-3">
                                    <label for="drivetype">Drive Type</label>
                                    <select class="form-control form-control-sm" name="drivetype" id="drivetype">
                                        <option value="0">Manual</option>
                                        <option value="1">Automatic</option>
                                    </select>
                                </div>
                                <!----->
                            </div>

                            <div class="form-group">
                                <label for="address">Pickup Location</label>
                                <input type="text" class="form-control 
                                <?php
                                echo (form_error('address')!=="")?'is-invalid' : '' 
                                ?>" id="address" placeholder="1234 Main St" value="<?php echo set_value('address');?>"
                                    name="address">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control 
                                <?php
                                echo (form_error('city')!=="")?'is-invalid' : '' 
                                ?>" id="city" name="city" value="<?php echo set_value('city');?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="state">State</label>
                                    <select class="form-control form-control-sm" name="state" id="state"
                                        class="form-control">

                                        <?php
                                    foreach ($row->result() as $data){?>
                                        <option value="<?php echo $data->id ?>">
                                            <?php echo $data->state; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="zip">Zip</label>
                                    <input type="text" class="form-control
                                    <?php echo (form_error('zip')!=="")?'is-invalid':''?>
                                    " id="zip" name="zip" value="<?php echo set_value('zip');?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="carinfo">Car info </label>
                                <textarea class="form-control" id="carinfo" name="carinfo"
                                    value="<?php echo set_value('carinfo'); ?>" rows="3"></textarea>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input
                                   <?php if(!empty($error)){ echo 'is-invalid';} ?>
                                    " id="carrc" name="carrc">
                                        <label class="custom-file-label" for="customFile">Car Rc Pdf AND Doc</label>
                                        <!-- <input type="file" name="adharfile"> -->
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
                                                        <div class="form-group col-3">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input
                                            <?php if(!empty($error)){ echo 'is-invalid';} ?>
                                            " id="carinsurance" name="carinsurance">
                                                                <label class="custom-file-label" for="customFile">Car Insurance Pdf AND Doc</label>

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
                                                        <div class="form-group col-3">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input
                                            <?php if(!empty($error)){ echo 'is-invalid';} ?>
                                            " id="documnet" name="documnet">
                                                                <label class="custom-file-label" for="customFile">Any Document Pdf AND Doc</label>
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
                                                        <div class="form-group col-3">
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input
                                                                <?php if(!empty($error)){ echo 'is-invalid';} ?>" id="carimg" name="carimg">
                                                                <label class="custom-file-label" for="customFile">Car Image Jpg , Png , jpeg</label>
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
                            <button type="submit" class="btn  btn-primary">Add Cab</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end validation form -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
<?php
$this->load->view('template/seller/footer');
?>