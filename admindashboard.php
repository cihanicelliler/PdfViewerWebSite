<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MakeBetter | Dashboard</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <link href="assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <style>
        .overflowTd{
            overflow: auto;
            max-height: 100px !important;
            display: block;
        }
    </style>
</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="assets/img/profile_small.jpg">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?php if (isset($_COOKIE["Loged"])) {
                                    $name = explode("=", $_COOKIE["Loged"]);
                                    $name = str_replace('&status', '', $name[2]);
                                    echo $name;
                                } ?></span>
                            <span class="text-muted text-xs block">Computer Engineer <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="index.php"><i class="fa fa-home"></i> <span class="nav-label">Home Page</span></a>
                </li>
                <li>
                    <a href="admindashboard.php"><i class="fa fa-table"></i> <span class="nav-label">Admin Dashboard</span></a>
                </li>
                <?php if (isset($_COOKIE["Loged"])) {
                $status = explode("=", $_COOKIE["Loged"]);
                if ($status[3] == "Admin") { ?>
                    <li>
                        <a href="usersAdmin.php"><i class="fa fa-user-circle"></i> <span class="nav-label">Users</span>
                        </a>
                    </li><?php }} ?>
                <li>
                    <a href="pdfsAdmin.php"><i class="fa fa-file-pdf-o"></i> <span class="nav-label">PDFs</span></a>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="wrapper wrapper-content animated fadeIn">
            <div class="p-w-md m-t-sm">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">


                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table id="pdfsTable" class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Surname</th>
                                            <th>Student No</th>
                                            <th>Lesson Name</th>
                                            <th>Keywords</th>
                                            <th>Date</th>
                                            <th>Title</th>
                                            <th>Supervisor</th>
                                            <th>Jury Member</th>
                                            <th>Jury Member 2</th>
                                            <th>Summary</th>
                                        </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="assets/js/jquery-3.1.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="assets/js/inspinia.js"></script>
<script src="assets/js/plugins/pace/pace.min.js"></script>

<script src="assets/js/plugins/dataTables/datatables.min.js"></script>
<script src="assets/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        pdfsTable = $('#pdfsTable').DataTable({
            pageLength: 10,
            responsive: true,
            columnDefs: [
                { className: "overflowTd", "targets": [ 10 ] }
            ],
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},
            ],
            ajax: 'api/getPDFs.php',
            columns: [
                {
                    data: "name"
                },
                {
                    data: "surname"
                },
                {
                    data: "student_no"
                },
                {
                    data: "lesson_name"
                },
                {
                    data: "keywords"
                },
                {
                    data: "date"
                },
                {
                    data: "title"
                },
                {
                    data: "supervisor"
                },
                {
                    data: "jury_member"
                },
                {
                    data: "jury_member2"
                },
                {
                    data: "summary"
                }
            ],

        });
    });
</script>
</body>
</html>
