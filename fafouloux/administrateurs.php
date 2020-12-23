<?php include ('header.php');

if(isset($_POST['nom'])){ $nom = $_POST['nom']; }
if (isset($_POST['prenom'])){ $prenom = $_POST['prenom']; }
if (isset($_POST['email'])){ $email = $_POST['email']; }
if (isset($_POST['password'])){ $password = $_POST['password']; }
if (isset($_POST['role_id'])){ $role_id = $_POST['role_id']; }


if(isset($_POST['addAdmin'])){
    if(empty($nom) OR empty($prenom) OR empty($email) OR empty($password)){

        echo '<div class="alert alert-danger" role="alert">
            Il faut remplir tous les champs</div>
         ';
    }

    else{

        $insertData = $db->prepare("INSERT INTO users(nom, prenom, email, password, role_id) VALUES(?,?,?,?,?)");
        $insertData->execute(array($nom,$prenom,$email,$password,$role_id));

        echo "<div class='alert alert-success' role='alert'>
            L'administrateur est ajouté avec succès !</div>
         ";

    }
} //end addAdmin post

// select roles for select element
$selectRole = $db->query('SELECT id,type_role FROM role WHERE id !=3');
$selectRole->execute();
$selectRole->setFetchMode(PDO::FETCH_ASSOC);


// select data foreach table
$verif = $db->query('SELECT nom, prenom, email, role_id, type_role FROM users INNER JOIN role ON users.role_id = role.id WHERE role_id !=3');
$verif->execute();
$verif->setFetchMode(PDO::FETCH_ASSOC);


?>




    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Accueil | Ajouter un administrateur</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="content">
        <!-- Animated -->
        <div class="animated fadeIn row">

            <div class="col-xs-6 col-sm-6">
                <!--form ajouter un eleve-->
                <div class="card">
                    <div class="card-header">Ajout administrateur:</div>
                    <div class="card-body card-block">
                        <form action="/administrateurs.php" method="POST">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="nom" name="nom" placeholder="Nom" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" id="prenom" name="prenom" placeholder="Prénom" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                    <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-gear"></i></div>
                                    <select name="role_id" id="select" class="form-control">
                                        <?php

                                        foreach($selectRole->fetchAll() as $key => $rolevalue) {
                                            echo '
                            
                                    <option value="'.$rolevalue['id'].'">'.$rolevalue['type_role'].'</option>
                                    ';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm" name="addAdmin">Ajouter</button></div>
                        </form>
                        <small>* Un formateur peut avoir accès a tout (pour l'instant)</small><br/>
                        <small>* L'administration peut voir les retards</small>
                    </div>

                </div>
                <!--form ajouter eleve-->
            </div>
            <div class="col-xs-6 col-sm-6">
                <div class="alladmins">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Liste Administrateurs</div>
                        </div>
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                <tr>
                                    <th class="avatar">Avatar</th>
                                    <th>Nom Prénom</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach($verif->fetchAll() as $key => $value) {
                                    echo '
                                <tr>
                                    <td class="avatar">
                                        <div class="round-img">
                                            <a href="#"><img class="rounded-circle" src="images/avatar/user.png" alt=""></a>
                                        </div>
                                    </td>
                                    <td>  <span class="name">'. $value["nom"].'</span> </td>
                                    <td><span>'. $value["email"].'</span></td>
                                    <td>
                                ';
                                    ?>
                                    <?php
                                    if ($value['role_id'] == 2){echo '<span class="badge badge-warning">'. $value["type_role"].'</span>';}
                                    else{echo '<span class="badge badge-danger">'. $value["type_role"].'</span>';}
                                    ?>
                                    <?php
                                    echo'
                                    </td>
                                </tr>
                                ';
                                }
                                ?>


                                </tbody>
                            </table>
                        </div> <!-- /.table-stats -->
                    </div>
                </div>
            </div>

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->

<?php include ('footer.php');?>