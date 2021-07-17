<?php
$this->load->view('template/admin/header');
?>
<!DOCTYPE html>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Seller Datatable</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li> -->
                        <a href="<?php echo base_url().'AdminLogin/Logout'?>">Logout</a>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <!-- <div class="card-header">
                Seller Datatable
            </div> -->
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th> ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Document</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $num =1;
                                foreach ($data->result() as $row):?>
                        <tr>
                            <td><?php echo $num ?></td>
                            <td><?php echo $row->id ?></td>
                            <td><?php echo $row->fullname;?></td>
                            <td><?php echo $row->email;?></td>
                            <td><?php echo $row->number;?></td>
                            <td>
                                <a href="<?php echo base_url().'uploads/sellerdetails/'.$row->adharfile.' ' ; ?>"
                                    target="_blank">AdharFile,</a>
                                <a href="<?php echo base_url().'uploads/sellerdetails/'.$row->penfile.' ' ; ?>"
                                    target="_blank">PenFile,</a>
                                <a href="<?php echo base_url().'uploads/sellerdetails/'.$row->bankfile.' ' ; ?>"
                                    target="_blank">BankFile,</a>
                                <a href="<?php echo base_url().'uploads/sellerdetails/'.$row->profile.' ' ; ?>"
                                    target="_blank">ProFile</a>

                            </td>
                            <td>

                                <?php 
                                        if($row->status == 0){?>
                                <button type="button" class="btn btn-outline-danger" data-bs-target="#activeacountmodel"
                                    data-bs-toggle="modal" onclick="activeac(this);" data-id="<?php echo $row->id;?>">
                                    Inactive
                                </button>

                                <?php }
                                        else{ ?>
                                <button type="button" class="btn btn-outline-success" data-bs-target="#deactivemodel"
                                    data-bs-toggle="modal" onclick="deactive(this);" data-id="<?php echo $row->id;?>">
                                    Active
                                </button>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php 
                                $num++;
                            endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
<!------model------>
<div class="modal fade" id="activeacountmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Seller
                    Request
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Add this seller To Travel Potal packag
                    Person send a mail to user and than user login
                    add package total chareges 30% off month Selling ..
                    are you sure to add this person And send Mail to seller
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?php echo base_url('AdminLogin/status');?>" method="POST" id="form-delete-user">
                    <input type="hidden" name="deleteid" value="">
                    <input type="submit" class="btn btn-primary ml-1" value="Active">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    </input>
                </form>
            </div>

        </div>
    </div>
</div>
<!--------------model---close--->
<!-----deactiveac----->
<div class="modal fade" id="deactivemodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Seller
                    Request
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>
                    Deactive This Acount
                </p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?php echo base_url('AdminLogin/status');?>" method="POST" id="deactiveform">
                    <input type="hidden" name="deleteid" value="">
                    <input type="submit" class="btn btn-primary ml-1" value="Deactive">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    </input>
                </form>
            </div>

        </div>
    </div>
</div>
<!----------model-----close---->


<?php
$this->load->view('template/admin/footer')
?>