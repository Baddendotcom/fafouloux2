<?php include ('header.php');



if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $userid = $_GET['id'];
    $showInfo = $db->prepare("SELECT * FROM users WHERE id =?");
    $showInfo->execute(array($userid));
    $userinfos = $showInfo->fetch();

    // INNER JOIN eleves ON users.id = eleves.users_id
    $showInfo2 = $db->prepare('SELECT * FROM eleves WHERE users_id=?');
    $showInfo2->execute(array($userid));
    $userinfos2 = $showInfo2->fetch();

//select total retard
    $totalRetards = $db->prepare("SELECT COUNT(*) FROM retards WHERE eleve_id=?");
    $totalRetards->execute(array($userid));
    $userTotal = $totalRetards->fetch();

 }
else{
    header("Location: index.php");

}




?>



    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Accueil |<?php echo $userinfos['nom'] .' '. $userinfos['prenom']; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="content">

        <!-- Animated -->
        <div class="animated fadeIn">
            <div class="profil">
                <div class="feed-box text-center">
                    <section class="card">
                        <div class="card-body">
                            <div class="corner-ribon blue-ribon">
                                <i class="fa fa-twitter"></i>
                            </div>
                            <a href="#">
                                <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="images/admin.jpg">
                            </a>
                            <h2><?php echo $userinfos['nom'] .' '. $userinfos['prenom']; ?></h2>
                            <div class="email text-sm-center"><i class="fa fa-envelope"></i> <?php echo $userinfos['email'];?></div>
                            <div class="tel text-sm-center"><i class="fa fa-phone"></i> <?php echo $userinfos2['telephone'];?></div>
                            <div class="poleem text-sm-center"><i class="fa fa-bookmark"></i> <?php echo $userinfos2['id_pole_emploi'];?></div>
                            <div class="adresse text-sm-center"><i class="fa fa-home"></i> <?php echo $userinfos2['adresse'];?></div>
                        </div>
                    </section>
                </div>
            </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="ti-alarm-clock "></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"><?php echo $userTotal['id'];?></span></div>
                                            <div class="stat-heading">Retards</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="ti-calendar "></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">3435</span></div>
                                            <div class="stat-heading">Demi-journées</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-browser"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">349</span></div>
                                            <div class="stat-heading">Journées</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>


                <!--///////////////////////// calendar-->
                <div class="retardscalendar">
                    <div class="card">
                        <div class="card-header">Suivi</div>
                        <div class="card-body">
                            <!-- <h4 class="box-title">Chandler</h4> -->
                            <div class="calender-cont widget-calender">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
                <!--///////////////////////// end calendar-->
        </div><!--end animated-->
    </div><!--end content-->
    <div class="clearfix"></div>


<?php include ('footer.php');?>


