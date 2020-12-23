<?php include ('header.php');




// select data retards
$verif = $db->query('SELECT nom,prenom,id_eleve,motif,heure_retard,formateur_id FROM retards
                            INNER JOIN users ON users.id = retards.id_eleve ORDER BY heure_retard DESC');
$verif->execute();
$verif->setFetchMode(PDO::FETCH_ASSOC);



?>


    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Accueil | tous les retards</h1>
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
            <!--liste eleve-->
            <div class="row allretards">
                <div class="col-lg-12">
                 <div class="card">
                        <div class="card-header">
                            <div class="card-title">Liste retards</div>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="avatar">Avatar</th>
                                    <th>Nom Prénom</th>
                                    <th>Date heure retard</th>
                                    <th>Motif</th>
                                    <th>Formateur</th>
                                </tr>
                                </thead>
                                <tbody>
                            <?php

                            foreach($verif->fetchAll() as $key => $value) {
                                $userId = $value['formateur_id'];
                                $selectFormateurQuery = $db->query('SELECT nom,prenom FROM users INNER JOIN retards ON users.id="'.$userId.'"')->fetchAll()[$key];
                                echo '
                                <tr>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="images/avatar/user.png" alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">' . $value["nom"] . ' ' . $value["prenom"] . '</span> </td>
                                    <td><span>' . $value["heure_retard"] . '</span></td>
                                    <td><span>' . $value["motif"] . '</span></td>
                                   <td><span>'.$selectFormateurQuery['prenom'].' '.$selectFormateurQuery['nom'].'</span></td>
                                </tr>
                                   ';
                                /*echo '<pre>';
                                var_dump( $selectFormateurQuery );
                                echo '</pre>';*/
                            }
                            ?>
                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
            </div>
            </div>
            <!--liste eleve-->

            <div class="clearfix"></div>

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>


<?php include ('footer.php');?>