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
                    <h2 class="pageheader-title">Add Rooms</h2>
                </div>
            </div>
        </div>
        <!------------form start------------>
        <?php
        
        if(!empty(form_error('hotleinfo'))){?>
        <div class="alert alert-danger" role="alert">
            Fild The Hotel Details Box !
        </div>
        <?php
         }
         if(!empty($error)){?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ; ?>
        </div>
        <?php }
        if(!empty($success)){?>
        <div class="alert alert-success" role="alert">
            <?php echo $success ; ?>
        </div>
        <?php }?>
        <div class="row">
            <!-- ============================================================== -->
            <!-- validation form -->
            <?php 
             $edit = $eddata->row();
            ?>
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="<?php echo base_url('VendrRooms/Update');?>" method="post">
                            <div class="row">
                                <input type="hidden" name="edid" value="<?php echo $edit->rid; ?>">
                                <div class="col-6">
                                    <label for="roomtype">Select Room Type</label>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" name="roomtype" id="roomtype">
                                            <?php 
                                           foreach( $Roomtype as $index=>$rt){
                                            $selectd = ($edit->roomtype == $index)? true: false; ?>
                                            <option <?php   echo set_select('state',$edit->roomtype ,$selectd);?>
                                                value="<?php echo $index?>">
                                                <?php echo $rt ?></option>
                                            <?php  }
                                          ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <label for="norooms"> Rooms</label>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" name="norooms" id="norooms">
                                            <?php for($i=1;$i<=5;$i++){
                                               $selectd = ($edit->norooms == $i)? true: false; ?>
                                            <option <?php echo set_select('norooms',$edit->norooms,$selectd);?>
                                                value="<?php echo $i;?>">
                                                <?php echo "Room".$i; ?></option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <label for="noadults">No Of Adults</label>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" name="noadults" id="noadults">
                                            <option
                                                <?php  $selectd = ($edit->noadults ==1)? true: false;  echo set_select('noadults',$edit->noadults,$selectd);?>
                                                value="1">Adoult 2</option>
                                            <option
                                                <?php  $selectd = ($edit->noadults ==2)? true: false;  echo set_select('noadults',$edit->noadults,$selectd);?>
                                                value="2">Adoult 4</option>
                                            <option
                                                <?php  $selectd = ($edit->noadults ==3)? true: false;  echo set_select('noadults',$edit->noadults,$selectd);?>
                                                value="3">Adoult 6</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <label for="nochild">No Of Child</label>
                                    <div class="form-group">
                                        <select class="form-control form-control-sm" name="nochild" id="nochild">
                                            <?php for($i=1;$i<=6;$i++){
                                               $selectd = ($edit->nochild == $i)? true: false; ?>
                                            <option <?php echo set_select('norooms',$edit->norooms,$selectd);?>
                                                value="<?php echo $i;?>">
                                                <?php echo "Child".$i; ?></option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-12">
                                    <label for="facilites">Hotel Facility</label><br>
                                    <?php
                                    $fc = explode(" ",$edit->facilites);
                                    $i=0;
                                   foreach ($service as $index=> $value){ ?>
                                    <label class="custom-control custom-checkbox custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" name="facilites[]"
                                            <?php echo set_checkbox('facilites', $index) ?> value="<?php echo $index;?>" <?php 
                                            if($index<count($fc)){
                                                if($index == $fc[$i]){
                                                  echo 'checked';
                                                  $i++;
                                                }
                                            }
                                            ?>>
                                        <span class="custom-control-label"><?php echo $value; ?></span>
                                    </label>
                                    <?php  } ?>
                                </div>

                                <div class="form-group col-md-12 ">
                                    <label for="hotleinfo">Hotel Information</label>
                                    <textarea class="form-control 
                                    <?php echo (!form_error('hotleinfo')? '' :'is-invalid'); ?>
                                    " id="hotleinfo" name="hotleinfo"
                                        value="" rows="5  ">
                                       <?php echo set_value('hotleinfo',$edit->hotleinfo);?>
                                        </textarea>
                                </div>

                                <div class="form-group col-md-12 ">
                                    <label for="selecthotel">Select Hotel</label>
                                    <select class="form-control form-control-sm" name="selecthotel" id="selecthotel">
                                        <?php 
                                           foreach( $data->result() as $rt){
                                            $selectd = ($edit->selecthotel == $rt->hid)? true: false; ?>
                                        <option <?php echo set_select('selecthotel',$rt->hid,$selectd) ?>
                                            value="<?php echo $rt->hid; ?>">
                                            <?php echo $rt->hotelname ;?> </option>
                                        <?php } ?>

                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="demoprice" class="col-form-label">Demo Price</label>
                                    <input id="demoprice" type="text" class="form-control
                                    <?php
                                    echo (form_error('demoprice')!=="")?'is-invalid' : '' 
                                    ?>" id="demoprice" name="demoprice"
                                        value="<?php echo set_value('demoprice',$edit->demoprice);?>">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="mainprice" class="col-form-label">Main Price</label>
                                    <input id="mainprice" type="text" class="form-control
                                   <?php echo (form_error('mainprice')!=="")?'is-invalid' : '' 
                                    ?>" id="mainprice" name="mainprice"
                                        value="<?php echo set_value('mainprice',$edit->mainprice);?>">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputText3" class="col-form-label">Any Coden Code</label>
                                    <input id="copecode" type="text" class="form-control text-uppercase
                                    <?php echo (form_error('copecode')!=="")?'is-invalid' : '' 
                                    ?>" id="copecode" name="copecode"
                                        value="<?php echo set_value('copecode',$edit->copecode);?>">

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputText3" class="col-form-label">Status</label>
                                    <select class="form-control form-control-sm" name="status" id="status">
                                        <option <?php  
                                        $selectd = ($edit->status ==1)? true: false; 
                                         echo set_select('status',$edit->noadults,$selectd);?> value="1">Public
                                        </option>
                                        <option <?php  
                                        $selectd = ($edit->status ==0)? true: false; 
                                         echo set_select('status',$edit->noadults,$selectd);?> value="0">Draf</option>
                                    </select>
                                </div>
                                <button type="Submit" class="btn  btn-primary">Edit Room</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end validation form -->
            <!-- ============================================================== -->
        </div>

        <!----form---end---->
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
    </div>
</div>

<?php
$this->load->view('template/seller/footer')
?>