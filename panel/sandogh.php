<?php include "inc/onload.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>مدیریت صندوق</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <section id="container" class="">
        <?php include "header.php";?>
    <?php include "menu.php"; ?>
        <section id="main-content">
            <section class="wrapper">
                <!-- page start-->
                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Dynamic Table
                         
                            </header>
                            <table class="table table-striped border-top" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width: 8px;">
                                            <input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>Username</th>
                                        <th class="hidden-phone">Email</th>
                                        <th class="hidden-phone">Points</th>
                                        <th class="hidden-phone">Joined</th>
                                        <th class="hidden-phone"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>Jhone doe</td>
                                        <td class="hidden-phone"><a href="mailto:jhone-doe@gmail.com">jhone-doe@gmail.com</a></td>
                                        <td class="hidden-phone">10</td>
                                        <td class="center hidden-phone">02.03.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>gada</td>
                                        <td class="hidden-phone"><a href="mailto:gada-lal@gmail.com">gada-lal@gmail.com</a></td>
                                        <td class="hidden-phone">34</td>
                                        <td class="center hidden-phone">08.03.2013</td>
                                        <td class="hidden-phone"><span class="label label-warning">Suspended</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>soa bal</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@yahoo.com">soa bal@yahoo.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">1.12.2013</td>
                                        <td class="hidden-phone"><span class="label label-danger">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>ram sag</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">soa bal@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">7.2.2013</td>
                                        <td class="hidden-phone"><span class="label label-info">Blocked</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>durlab</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">test@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">03.07.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>durlab</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">05.04.2013</td>
                                        <td class="hidden-phone"><span class="label label-danger">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>sumon</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">05.04.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>bombi</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">05.04.2013</td>
                                        <td class="hidden-phone"><span class="label label-danger">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>ABC ho</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">05.04.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>test</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">05.04.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>soa bal</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">soa bal@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">03.07.2013</td>
                                        <td class="hidden-phone"><span class="label label-info">Blocked</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>test</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">test@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">03.07.2013</td>
                                        <td class="hidden-phone"><span class="label label-danger">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>goop</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">05.04.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>sumon</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">01.07.2013</td>
                                        <td class="hidden-phone"><span class="label label-info">Blocked</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>woeri</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">09.10.2013</td>
                                        <td class="hidden-phone"><span class="label label-danger">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>soa bal</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">soa bal@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">9.12.2013</td>
                                        <td class="hidden-phone"><span class="label label-info">Blocked</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>woeri</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">test@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">14.12.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>uirer</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">13.11.2013</td>
                                        <td class="hidden-phone"><span class="label label-warning">Suspended</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>samsu</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">17.11.2013</td>
                                        <td class="hidden-phone"><span class="label label-danger">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>dipsdf</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">05.04.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>soa bal</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">soa bal@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">03.07.2013</td>
                                        <td class="hidden-phone"><span class="label label-info">Blocked</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>hilor</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">test@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">03.07.2013</td>
                                        <td class="hidden-phone"><span class="label label-danger">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>test</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">19.12.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>botu</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">17.12.2013</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                    <tr class="odd gradeX">
                                        <td>
                                            <input type="checkbox" class="checkboxes" value="1" /></td>
                                        <td>sumon</td>
                                        <td class="hidden-phone"><a href="mailto:soa bal@gmail.com">lorem-ip@gmail.com</a></td>
                                        <td class="hidden-phone">33</td>
                                        <td class="center hidden-phone">15.11.2011</td>
                                        <td class="hidden-phone"><span class="label label-success">Approved</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </section>
                    </div>
             
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page only-->
    <script src="js/dynamic-table.js"></script>


</body>
</html>
