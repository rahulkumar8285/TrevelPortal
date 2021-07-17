<?php
$this->load->view('template/header');
?>
<section class="ftco-section ftco-degree-bg">
    <div class="container mt-5  mb-5">
        <?php
if(form_error('number')){
    echo '<div class="alert alert-danger" role="alert">
    '.form_error('number').'This number already registered'.'</div>';
}
if(form_error('email')){
    echo '<div class="alert alert-danger" role="alert">
    '.form_error('email').'This email Already use '.'</div>';
}

?>

        <form action="<?php echo base_url('vandar_cl');?>" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fullname">Full Name</label>
                    <input type="text" class="form-control 
                 <?php
                  echo (form_error('fullname')!=="")?'is-invalid' : '' 
                 ?>" id="fullname" name="fullname" value="<?php echo set_value('fullname');?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile </label>
                    <input type="number" class="form-control 
                 <?php
                  echo (form_error('number')!=="")?'is-invalid' : '' 
                 ?>" id="number" name="number" value="<?php echo set_value('number');?>">

                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control 
                 <?php
                  echo (form_error('email')!=="")?'is-invalid' : '' 
                 ?>" name="email" value="<?php echo set_value('email');?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" class="form-control 
                 <?php
                  echo (form_error('password')!=="")?'is-invalid' : '' 
                 ?>" id="password" name="password" value="<?php echo set_value('password');?>">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control 
                 <?php
                  echo (form_error('address')!=="")?'is-invalid' : '' 
                 ?>" id="address" placeholder="House no A22 Ex. " value="<?php echo set_value('address');?>" name="address">
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
                    <select class="form-control" name="state" id="state" class="form-control">

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

            <div class="form-row">
                <div class="form-group col-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input
                    <?php if(!empty($error)){ echo 'is-invalid';} ?>
                     " id="adharfile" name="adharfile">
                        <label class="custom-file-label" for="customFile">Adhar File</label>
                        <!-- <input type="file" name="adharfile"> -->
                        <smal class="text-danger"><?php 
                    
                    if(!empty($allfilereq)){
                        echo $allfilereq;  
                    }
                    if(!empty($error)){
                        echo $error;
                        if($filename =='adharfile'){ 
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
                    " id="penfile" name="penfile">
                        <label class="custom-file-label" for="customFile">pen File</label>

                        <smal class="text-danger"><?php 
                    if(!empty($allfilereq)){
                        echo $allfilereq;  
                    }
                    if(!empty($error)){
                        echo $error;
                        if($filename =='penfile'){ 
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
                    " id="bankfile" name="bankfile">
                        <label class="custom-file-label" for="customFile">Bank Details</label>
                        <smal class="text-danger"><?php 
                    if(!empty($allfilereq)){
                        echo $allfilereq;  
                    }
                    if(!empty($error)){
                        echo $error;
                        if($filename =='bankfile'){ 
                        echo $filename."file Must PDF AND DOC" ;
                        }
                    }
                    ?></smal>
                    </div>
                </div>
                <div class="form-group col-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input
                    <?php if(!empty($error)){ echo 'is-invalid';} ?>" id="profile" name="profile">
                        <label class="custom-file-label" for="customFile">Profile</label>
                        <smal class="text-danger"><?php 
                    if(!empty($allfilereq)){
                        echo $allfilereq;  
                    }
                    if(!empty($error)){
                        echo $error;
                        if($filename =='profile'){ 
                        echo $filename."file Must PDF AND DOC" ;
                        }
                    }
                    ?></smal>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                </div>
            </div>
            <button type="submit" class="btn  btn-primary">Sign in</button>
        </form>
    </div>
</section>
<script>
document.getElementById('state').value = "<?php echo set_value('state'); ?>";
</script>
<?php
$this->load->view('template/footer');
?>