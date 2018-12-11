<!--Main layout-->
<main class="pt-5" style="background-image: url(<?php echo base_url(); ?>assets/vendor/img/bac-icons.png);">
    <div class="container">

        <!--Section: Post-->
        <section class="">

            <!--Grid row-->
            <div class="row ">

                <!--Grid column-->

                <div class="col-md-12 mx-auto py-4">
                    <div class="card">
                        <div class="card-header font-weight-bold bg-white">Diagnostic Orders</div>
                        <div class="card-body table-responsive">
                            <table id="dtBasicExample" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="th-sm">S.NO
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Tests
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Reports attachment
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($order_list) && count($order_list)>0){ ?>
                                    <?php $cnt=1;foreach($order_list as $lis){ ?>
                                    <tr>
                                        <td>
                                            <?php echo $cnt; ?>
                                        </td>
                                        <td>
                                            <?php echo isset($lis['test_name'])?$lis['test_name']:''; ?>
                                        </td>
                                        <td>
                                            <?php if($lis['report_file']!=''){
											$report_url=$this->config->item('reports_url');
											?>
                                            <a target="_blank" href="<?php echo $report_url.'assets/reportfiles/'.$lis['report_file']; ?>">Download</a>
                                            <?php }  ?>
                                        </td>

                                    </tr>
                                    <?php $cnt++;} ?>
                                    <?php } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->
            </div>

        </section>
        <!--Section: Post-->

    </div>
</main>
<br />
<br />
<!--Main layout-->
<script>
    $("#dtBasicExample").DataTable({
        "order": [
            [7, "desc"]
        ]
    });
</script>