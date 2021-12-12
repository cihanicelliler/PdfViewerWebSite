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

    <link href="assets/css/plugins/dropzone/basic.css" rel="stylesheet">
    <link href="assets/css/plugins/dropzone/dropzone.css" rel="stylesheet">

    <link href="assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

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
                    <a href="admindashboard.php"><i class="fa fa-table"></i> <span
                                class="nav-label">Admin Dashboard</span></a>
                </li>
                <?php if (isset($_COOKIE["Loged"])) {
                    $status = explode("=", $_COOKIE["Loged"]);
                    if ($status[3] == "Admin") { ?>
                        <li>
                            <a href="usersAdmin.php"><i class="fa fa-user-circle"></i> <span
                                        class="nav-label">Users</span>
                            </a>
                        </li><?php }
                } ?>
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
                            <div class="ibox-title">
                                <h5>Upload PDF File</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="wrapper wrapper-content animated fadeIn">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="ibox">
                                                <form action="#" class="dropzone" id="dropzoneForm">
                                                    <div class="fallback">
                                                        <input name="file" type="file"/>
                                                    </div>

                                                    <button class="btn btn-primary m-t-n-xs btn-block"
                                                            type="submit"><strong>Upload File</strong></button>

                                                </form>
                                                <div class="ibox-content border-sbottom">
                                                    <h4>PDF.js</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center pdf-toolbar">

                                        <div class="btn-group">
                                            <button id="prev" class="btn btn-white"><i
                                                        class="fa fa-long-arrow-left"></i> <span
                                                        class="d-none d-sm-inline">Previous</span></button>
                                            <button id="next" class="btn btn-white"><i
                                                        class="fa fa-long-arrow-right"></i> <span
                                                        class="d-none d-sm-inline">Next</span></button>
                                            <button id="zoomin" class="btn btn-white"><i class="fa fa-search-minus"></i>
                                                <span class="d-none d-sm-inline">Zoom In</span></button>
                                            <button id="zoomout" class="btn btn-white"><i class="fa fa-search-plus"></i>
                                                <span class="d-none d-sm-inline">Zoom Out</span></button>
                                            <button id="zoomfit" class="btn btn-white"> 100%</button>
                                            <span class="btn btn-white hidden-xs">Page: </span>

                                            <div class="input-group">
                                                <input type="text" class="form-control" id="page_num">

                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-white" id="page_count">/ 22
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="text-center m-t-md">
                                        <canvas id="the-canvas"
                                                class="pdfcanvas border-left-right border-top-bottom b-r-md"></canvas>
                                    </div>


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

<script src="assets/js/plugins/dropzone/dropzone.js"></script>

<script src="assets/js/plugins/sweetalert/sweetalert.min.js"></script>

<script src="assets/js/plugins/pdfjs/pdf.js"></script>
<script>

    var url = '';

    function getValues() {
        var formData = new FormData();
        formData.append('pdf', $('#dropzoneForm')[0].dropzone.getAcceptedFiles()[0]);
        return formData;
    }

    function parsePDF(text) {
        text = text.split(' ')
        countJuryMember = 0
        cleanArray = text.filter((value) => value);
        for (var i = 0; i < cleanArray.length; i++) {
            if (cleanArray[i] == "................................................") {
                countJuryMember++;
            }
        }
        let index = cleanArray.indexOf("Soyadı:")
        let name = cleanArray[index + 1];
        let surname = cleanArray[index + 2];
        let secondIndex = cleanArray.indexOf("Danışman,")
        let supervisor = ""
        for (var i = secondIndex - 3; i < secondIndex; i++) {
            supervisor = supervisor + " " + cleanArray[i]
        }
        index = cleanArray.indexOf("................................................")
        secondIndex = cleanArray.indexOf("Jüri", index + 1)
        let juryMember = ""
        for (var i = index + 1; i < secondIndex; i++) {
            juryMember = juryMember + " " + cleanArray[i]
        }
        let juryMember2 = ""
        if (countJuryMember == 3) {
            index = cleanArray.indexOf("................................................", secondIndex + 1)
            secondIndex = cleanArray.indexOf("Jüri", index + 1)
            for (var i = index + 1; i < secondIndex; i++) {
                juryMember2 = juryMember2 + " " + cleanArray[i]
            }
        }
        index = cleanArray.indexOf("No:")
        let studentNo = cleanArray[index + 1]
        index = cleanArray.indexOf("BÖLÜMÜ")
        let lessonName = cleanArray[index + 1] + ' ' + cleanArray[index + 2]
        index = cleanArray.lastIndexOf("ÖZET")
        secondIndex = cleanArray.indexOf("Anahtar")
        let summary = ""
        for (var i = index; i < secondIndex; i++) {
            summary = summary + " " + cleanArray[i]
        }
        let thirdIndex = cleanArray.lastIndexOf("GİRİŞ")
        let keywords = ""
        for (var i = secondIndex; i < thirdIndex; i++) {
            keywords = keywords + " " + cleanArray[i]
        }
        index = cleanArray.indexOf("Tarih:")
        let date = cleanArray[index + 1]
        index = cleanArray.indexOf("PROJESİ")
        secondIndex = cleanArray.indexOf("PROJESİ", 9)
        let title = ""
        for (var i = index + 1; i < secondIndex + 1; i++) {
            title = title + " " + cleanArray[i]
        }
        let values = {};
        values['name'] = name;
        values['surname'] = surname;
        values['studentNo'] = studentNo;
        values['lessonName'] = lessonName;
        values['summary'] = summary;
        values['keywords'] = keywords;
        values['date'] = date;
        values['title'] = title;
        values['supervisor'] = supervisor;
        values['juryMember'] = juryMember;
        values['juryMember2'] = juryMember2;
        addPDFtoDatabase(values)
    }

    function addPDFtoDatabase(values) {
        $.ajax({
            type: "POST",
            url: "api/uploadPDFValues.php",
            data: {
                name: values['name'],
                surname: values['surname'],
                studentNo: values['studentNo'],
                lessonName: values['lessonName'],
                summary: values['summary'],
                keywords: values['keywords'],
                date: values['date'],
                title: values['title'],
                supervisor: values['supervisor'],
                juryMember: values['juryMember'],
                juryMember2: values['juryMember2'],
            },
            success: function (response) {
                swal({
                    title: "Operation Successful!",
                    text: "You added PDF values to the database successfully!",
                    type: "success"
                });
            }
        });
    }

    $(document).on('submit', '#dropzoneForm', function (e) {
        e.preventDefault();
        e.stopPropagation();

        $.ajax({
            method: 'POST',
            url: "api/uploadPDF.php",
            data: getValues(),
            processData: false, // required for FormData with jQuery
            contentType: false, // required for FormData with jQuery
            success: function (response) {
                url = `./pdf/${response}`;
                PDFJS.getDocument(url).then(function (pdfDoc_) {
                    pdfDoc = pdfDoc_;
                    var documentPagesNumber = pdfDoc.numPages;
                    document.getElementById('page_count').textContent = '/ ' + documentPagesNumber;

                    $('#page_num').on('change', function () {
                        var pageNumber = Number($(this).val());

                        if (pageNumber > 0 && pageNumber <= documentPagesNumber) {
                            queueRenderPage(pageNumber, scale);
                        }

                    });
                    renderPage(pageNum, scale);
                    gettext(`./pdf/${response}`).then(function (text) {
                            parsePDF(text)
                        },
                        function (reason) {
                            console.error(reason);
                        });

                });
            }
        });
    });

    var pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 1.5,
        zoomRange = 0.25,
        canvas = document.getElementById('the-canvas'),
        ctx = canvas.getContext('2d');


    function gettext(pdfUrl) {
        var pdf = pdfjsDistBuildPdf.getDocument(pdfUrl);
        return pdf.then(function (pdf) {
            var maxPages = pdf.pdfInfo.numPages;
            var countPromises = [];
            for (var j = 1; j <= maxPages; j++) {
                var page = pdf.getPage(j);

                var txt = "";
                countPromises.push(page.then(function (page) {
                    var textContent = page.getTextContent();
                    return textContent.then(function (text) {
                        return text.items.map(function (s) {
                            return s.str;
                        }).join('');
                    });
                }));
            }
            return Promise.all(countPromises).then(function (texts) {
                return texts.join('');
            });
        });
    }


    function renderPage(num, scale) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function (page) {
            var viewport = page.getViewport(scale);
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);
            // Wait for rendering to finish
            renderTask.promise.then(function () {
                pageRendering = false;
                if (pageNumPending !== null) {
                    // New page rendering is pending
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });
        document.getElementById('page_num').value = num;
    }

    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num, scale);
        }
    }

    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        var scale = pdfDoc.scale;
        queueRenderPage(pageNum, scale);
    }

    document.getElementById('prev').addEventListener('click', onPrevPage);

    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
            return;
        }
        pageNum++;
        var scale = pdfDoc.scale;
        queueRenderPage(pageNum, scale);
    }

    document.getElementById('next').addEventListener('click', onNextPage);

    function onZoomIn() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale += zoomRange;
        var num = pageNum;
        renderPage(num, scale)
    }

    document.getElementById('zoomin').addEventListener('click', onZoomIn);

    function onZoomOut() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale -= zoomRange;
        var num = pageNum;
        queueRenderPage(num, scale);
    }

    document.getElementById('zoomout').addEventListener('click', onZoomOut);

    function onZoomFit() {
        if (scale >= pdfDoc.scale) {
            return;
        }
        scale = 1;
        var num = pageNum;
        queueRenderPage(num, scale);
    }

    document.getElementById('zoomfit').addEventListener('click', onZoomFit);

</script>
</body>
</html>
