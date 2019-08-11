
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url().'assets/image/scm/small_logo.png' ?>">
    <title>Selamat Datang Domino's</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url() ?>assets/eksternal/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?= base_url() ?>assets/eksternal/css/colors/blue.css" id="theme" rel="stylesheet">

    <script src="<?= base_url().'source/include/additional.js'?>"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>

    <style>
        .topbar{
            background-color:#2d3236 !important;
        }

        .page-wrapper{
            background-image:url(<?= base_url() ?>assets/image/scm/pattern.png)
        }
    </style>

</head>

<body class="fix-header card-no-border logo-center">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header">
                    <a class="navbar-brand">
                    <!-- Logo icon -->
                    <b>
                        <img src="<?= base_url() ?>assets/image/scm/small_logo.png" style="width:40px;" alt="homepage" class="light-logo animated flip" />
                    </b>
                    <span>   
                        <img src="<?= base_url() ?>assets/image/scm/logo_name.png " style="width:150px;" class="light-logo" alt="homepage" /></span> 
                    </a>
                </div>
                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li> 
                    </ul>
                    
                    <ul class="navbar-nav my-lg-0">
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-message"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox scale-up">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                      
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
                                <ul>
                                    <li>
                                        <div class="drop-title">You have 4 new messages</div>
                                    </li>
                                    
                                </ul>
                            </div>
                        </li>
                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?= base_url() ?>assets/image/scm/user1.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="<?= base_url() ?>assets/image/scm/user1.png" alt="user"></div>
                                            <div class="u-text">
                                                <h4 id="user"></h4>
                                                <p class="text-muted">varun@gmail.com</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a class="btn btn-link"><i class="ti-settings text-success"></i> Change Password</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a class="btn btn-link" id="btn_logout"><i class="fa fa-power-off text-danger"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
       
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">PERSONAL</li>
                        <li>
                            <a class="has-arrow animated bounceInRight" href="#/dashboard"><i class="ti-layout-grid2 text-info"></i><span class="hide-menu"> Dashboard </span></a>
                        </li>
                        <li>
                            <a class="has-arrow animated bounceInRight" style="animation-delay:0.1s" href="#/order" ><i class="fas fa-cart-plus text-danger"></i><span class="hide-menu"> Order </span></a>
                        </li>
                        <li>
                            <a class="has-arrow animated bounceInRight" style="animation-delay:0.2s" href="#/invoice" ><i class="fas fa-file-invoice-dollar text-warning"></i><span class="hide-menu"> Invoice </span></a>
                        </li>
                        <li>
                            <a class="has-arrow animated bounceInRight" style="animation-delay:0.3s" href="#/payment" ><i class="fas fa-money-bill-alt text-success"></i><span class="hide-menu"> Payment </span></a>
                        </li>
                        <li>
                            <a class="has-arrow animated bounceInRight" style="animation-delay:0.4s" href="#/shipping" ><i class="fas fa-box-open text-info"></i><span class="hide-menu"> Shipping </span></a>
                        </li>
                        <li>
                            <a class="has-arrow animated bounceInRight" style="animation-delay:0.5s" href="#/recap_hutang" ><i class="fas fa-paste text-danger"></i><span class="hide-menu"> Recap AP </span></a>
                        </li>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
       
        <div class="page-wrapper" id="content">
         
            <div class="right-sidebar">
                <div class="slimscrollright">
                    <div class="rpanel-title" style="background-color:#2d3236"> User Information <span><i class="ti-close right-side-toggle"></i></span></div>
                    <div class="r-panel-body">
                        <table class="table">
                            <tr>
                                <td><i class="fas fa-user text-info"></i></td>
                                <td>Yugi Setiawan</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-star text-warning"></i></td>
                                <td> Yugi Setiawan</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-star text-warning"></i></td>
                                <td>Yugi Setiawan</td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-star text-warning"></i></td>
                                <td>Yugi Setiawan</td>
                            </tr>
                        </table>
                        <button class="btn btn-success btn-sm" type="button" id="btn_gpass">Change Password</button>
                    </div>
                </div>
            </div>
            </div>
            
           
            <footer class="footer">
                Made by <i class="ti-heart text-danger"></i> Ulfiah
            </footer>
        
        </div>
       
    </div>
    
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url() ?>assets/eksternal/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url() ?>assets/eksternal/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url() ?>assets/eksternal/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?= base_url() ?>assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?= base_url() ?>assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url() ?>assets/eksternal/js/custom.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?= base_url() ?>assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script>
    var TOKEN_EXT = JSON.parse(localStorage.getItem('TOKEN_EXT'))
    console.log(TOKEN_EXT);
    
        function load_content(link) {
            $.get(`<?= base_url().'extern/'?>${link}`,function(response){

            $('#content').html(response);
            });
        }
        $(document).ready(function () {

            const Toast = Swal.mixin({
                      toast: true,
                      position:'bottom-end',
                      showConfirmButton: false,
                      timer: 2500
                    });

            var link_desc = `<?= base_url().'ext/Auth/whoAmI' ?>`
            $.ajax({
                url: link_desc,
                type: "GET",
                dataType: "JSON",
                // data: "data",
                beforeSend:function(xhr){
                    xhr.setRequestHeader("Authorization", "Basic " + btoa(USERNAME + ":" + PASSWORD))
                    xhr.setRequestHeader("SCM-INT-KEY",TOKEN_EXT.token)
                },
                success: function (response) {
                    localStorage.setItem('DATA_EXT',JSON.stringify(response))
                    console.log(TOKEN_EXT.token);
                    

                     $('#user').text(response.data.nama_pic)
                },
                error:function(){

                }
                
            });


            // Ajax Logout
            $('#btn_logout').on('click',function(){

                Swal.fire({
                title: 'Logout ?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya logout !'
                }).then((result) => {
                if (result.value) {
                    
                    localStorage.removeItem('TOKEN_EXT')
                    localStorage.removeItem('DATA_EXT')
                    window.location.replace(`<?= base_url().'' ?>`)
                    
                }
                })
               
            })


            var link;
                // Load with URL
                if (location.hash) {
                link = location.hash.substr(2);
                load_content(link);
                }else {
                location.hash ='#/dashboard';
                }

                // load with navigasi
                $(window).on('hashchange',function(){
                link = location.hash.substr(2);
                load_content(link);
            });
            
        });
    </script>
</body>

</html>
