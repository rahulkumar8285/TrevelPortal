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
                    <h2 class="pageheader-title">Hotel Data</h2>
                </div>
            </div>
        </div>
        <?php
    //    echo $this->session->userdata('seller');
    //   print_r($row);
     
      ?>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header"> Table</h5>
                    <?php
                   if($row->num_rows()>0){?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Room Type</th>
                                        <th>No Of Rooms</th>
                                        <th>No Of Adoult</th>
                                        <th>No Of Child</th>
                                        <th>Rent Price</th>
                                        <th>Copen Code</th>
                                        <th>Status</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                     foreach($row->result() as $data ){?>
                                    <tr>
                                        <td><?php echo $data->rid ; ?></td>
                                        <td><?php   
                                                 foreach($Roomtype as$index => $rt){
                                                     if($index == $data->roomtype){
                                                         echo $rt;
                                                         break;
                                                     }
                                                 }
                                             ?></td>
                                        <td><?php echo"Rooms ".$data->norooms; ?></td>
                                        <td><?php echo "Aboults ".$data->noadults*2 ; ?></td>
                                        <td><?php echo "Child ".$data->nochild ; ?></td>
                                        <td><?php echo $data->mainprice ; ?></td>
                                        <td><?php echo strtoupper($data->copecode) ; ?></td>
                                        <td><?php 
                                         if($data->status==1){?>
                                            <span class="mr-2"><span class="badge-dot badge-success"></span>
                                                Pubilc</span>
                                            <?php }else{?>
                                            <span class="mr-2"><span class="badge-dot badge-danger"></span> Draf</span>
                                            <?php }?>
                                        <td>
                                            <a
                                                href="<?php echo base_url('VendrRooms/Edit/').$data->rid ;?>">Edit,</a>
                                            <?php // echo base_url('Sellerawork/Delete/').$data->cid ;?>
                                            <a data-toggle="modal" href="#exampleModalCenter"
                                                onclick="deletedata(this);" data-id="<?php echo $data->rid;?>">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                    <?php  }else{
                        
                       
                        ?>

                    <div class="alert alert-danger" role="alert">
                        You Dont Have Any Cab Data !
                    </div>

                    <?php } ?>

                </div>
            </div>

            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>
        <!----mode--->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Delete Cab</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        are you sure delete this cab this is final delete not record this cab data!
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <form action="<?php echo base_url('VendrRooms/delete');?>" method="post">
                            <input type="text" id="did" name="did" value />
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
$this->load->view('template/seller/footer')
?>