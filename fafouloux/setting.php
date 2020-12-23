
<?php include ('header.php');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
    $userid = $_GET['id'];
    $showInfo = $db->prepare("SELECT * FROM users WHERE id =?");
    $showInfo->execute(array($userid));
    $userinfos = $showInfo->fetch();

}


if(isset($_FILES['imageprofile'])AND !empty($_FILES['imageprofile']['name']))
{
    $taillemax=2097152;
    $extensionvalides=array('jpg','jpeg','gif','png');
}

if($_FILES['imageprofile']['size'] <= $taillemax)
    {
        $extensionupload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
        if(in_array($extensionupload,$extensionvalides))
        {
            $chemin="images/avatar/".$_SESSION['id'].".".$extensionupload;
            $resultat=move_uploaded_file($_FILES['imageprofile']['tmp_name'],$chemin);
            if($resultat) {
            $updateavatar = $db->prepare('UPDATE users SET imageprofile = :imageprofile WHERE id = :id');
            $updateavatar->execute(array(
               'imageprofile' => $_SESSION['id'].".".$extensionupload,
               'id' => $_SESSION['id']
               ));
            header('Location: profile.php?id='.$_SESSION['id']);
        }else {
            echo  "Erreur durant l'importation de votre photo de profil";
         }
        } else {
            echo  "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
    } else {
    echo "Votre photo de profil ne doit pas dépasser 2Mo";
}
?>



    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Accueil | Abdessamad</h1>
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
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="corner-ribon blue-ribon">
                                    <i class="fa fa-twitter"></i>
                                </div>
                                <?php
                                echo $userinfos['imageprofil'];
                                    ?>
                                    <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;"
                                         alt="" src="images/avatar<?php echo  $userinfos['imageprofil']; ?>">
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Changer la photo</label></div>
                                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="imageprofile" class="form-control-file"></div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>


        </div><!--end animated-->
    </div><!--end content-->
    <div class="clearfix"></div>


<?php include ('footer.php');?>