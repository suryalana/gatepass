<div class="container">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="text-primary text-uppercase mb-1"></h1>
    </div>
    <div class="alert alert-info">
        <h4>
            <center><strong>-- GATE PASS --</strong>
        </h4>
        </center>

        <br>
        <div class="row">

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Date</div>
                                <div class="h3 mb-0 font-weight-bold text-primary text-uppercase mb-1"><?php $today = date("l d-m-Y");
                                                                                                        echo $today; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-5x text-primary text-uppercase mb-1"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <!--begin::Mixed Widget 10-->
                <div class="card card-custom gutter-b" style="height: 150px">
                    <!--begin::Body-->
                    <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
                        <div class="mr-2">
                            <h3 class="font-weight-bolder">Create Form Gatepass</h3>
                        </div>
                        <a href="<?php echo prefix_url; ?>gatepass" class="btn btn-primary font-weight-bold py-3 px-6">Start Now</a>
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Mixed Widget 10-->
            </div>
        </div>

    </div>
</div>