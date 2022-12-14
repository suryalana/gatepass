<!DOCTYPE html>
<html lang="en">

<head>
  <title>GATEPASS APPLICATION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- header tamplate -->
  <meta name="description" content="Updates and statistics" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="canonical" href="https://keenthemes.com/metronic" />
  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Page Vendors Styles(used by this page)-->
  <link href="<?php echo prefix_url; ?>assets/assetstamplate/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Page Vendors Styles-->
  <!--begin::Global Theme Styles(used by all pages)-->
  <link href="<?php echo prefix_url; ?>assets/assetstamplate/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo prefix_url; ?>assets/assetstamplate/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo prefix_url; ?>assets/assetstamplate/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
  <!--end::Global Theme Styles-->
  <!--begin::Layout Themes(used by all pages)-->
  <!--end::Layout Themes-->
  <link rel="shortcut icon" href="<?php echo prefix_url; ?>assets/assetstamplate/assets/media/logos/logocitra.png" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <!--begin::Page Vendors Styles(used by this page)-->
  <!-- <link href="/metronic/theme/html/demo2/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css?v=7.2.9" rel="stylesheet" type="text/css"> -->
  <!--end::Page Vendors Styles-->
  <!--begin::Global Theme Styles(used by all pages)-->
  <!-- <link href="/metronic/theme/html/demo2/dist/assets/plugins/global/plugins.bundle.css?v=7.2.9" rel="stylesheet" type="text/css">
  <link href="/metronic/theme/html/demo2/dist/assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.2.9" rel="stylesheet" type="text/css">
  <link href="/metronic/theme/html/demo2/dist/assets/css/style.bundle.css?v=7.2.9" rel="stylesheet" type="text/css"> -->
  <!--end::Global Theme Styles-->
  <!--begin::Layout Themes(used by all pages)-->
  <!--end::Layout Themes-->
  <!-- <link rel="shortcut icon" href="/metronic/theme/html/demo2/dist/assets/media/logos/favicon.ico"> -->
  <!-- Hotjar Tracking Code for keenthemes.com -->
</head>


<body id="kt_body" style="background-image: url(assets/assetstamplate/assets/media/bg/bg-9.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">
      <!--begin::Wrapper-->
      <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
        <!--begin::Header-->
        <div id="kt_header" class="header header-fixed">
          <!--begin::Container-->
          <div class="container d-flex align-items-stretch justify-content-between">
            <!--begin::Left-->
            <div class="d-flex align-items-stretch mr-3">
              <div class="dropdown">
                <a href="<?php echo prefix_url; ?>Dashboard" class=" btn btn-info" role="button">Dashboard</a>
                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Gatepass Aplication
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li class="menu-item" aria-haspopup="true">
                    <a href="<?php echo prefix_url; ?>gatepass" class=" menu-link">
                      <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                      </i>
                      <span class="menu-text">GATEPASS FORM</span>
                    </a>
                  </li>

                  <li><a href="<?php echo prefix_url; ?>app">GATEPASS EMPLOYEE</a></li>
                  <li><a href="<?php echo prefix_url; ?>remark">GATEPASS APPROVE MANAGER</a></li>
                  <li><a href="<?php echo prefix_url; ?>remarkhrd">GATEPASS REPORT HR</a></li>
                </ul>
                <a href="<?php echo prefix_url; ?>login/logout" class="btn btn-danger">SIGN OUT</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- <body>
  <br>
  <div class="container">
    <a href="<?php echo prefix_url; ?>Dashboard" class="btn btn-primary">DASHBOARD</a>
    <a href="<?php echo prefix_url; ?>app" class="btn btn-primary">DATA EMPLOYEE</a>
    <a href="<?php echo prefix_url; ?>gatepass" class="btn btn-primary">GATEPASS FORM</a>
    <a href="<?php echo prefix_url; ?>gatepass/remark" class="btn btn-primary">REMARK EDIT</a>
    <a href="<?php echo prefix_url; ?>gatepass/remarkhrd" class="btn btn-primary">HRD GATEPASS REPORT</a>

    <?php if ($level_session == '1') : ?>
      <a href="<?php echo prefix_url; ?>gatepass" class="btn btn-primary">GATEPASS FORM</a>
      <a href="<?php echo prefix_url; ?>gatepass/remark" class="btn btn-primary">REMARK EDIT</a>
      <a href="<?php echo prefix_url; ?>gatepass/remarkhrd" class="btn btn-primary">HRD GATEPASS REPORT</a>
    <?php endif; ?>

    <?php if ($level_session == '2') : ?>
      <a href="<?php echo prefix_url; ?>gatepass/remark" class="btn btn-primary">REMARK EDIT</a>
    <?php endif; ?>
    <a href="<?php echo prefix_url; ?>login/logout" class="btn btn-danger">SIGN OUT</a>
  </div>
</body> -->