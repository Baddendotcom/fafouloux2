<?php include ('header.php');


if(isset($_POST['nom'])){ $nom = $_POST['nom'];}
if (isset($_POST['prenom'])){$prenom = $_POST['prenom'];}
if (isset($_POST['id_pole_emploi'])){$id_pole_emploi = $_POST['id_pole_emploi'];}
if (isset($_POST['adresse'])){$adresse = $_POST['adresse'];}
if (isset($_POST['telephone'])){$telephone = $_POST['telephone'];}
if (isset($_POST['email'])){$email = $_POST['email'];}
if (isset($_POST['password'])){$password = $_POST['password'];}


if(isset($_POST['ajoutereleve'])){

    if(empty($nom) OR empty($prenom) OR empty($id_pole_emploi) OR empty($adresse) OR empty($telephone) OR empty($email) OR empty($password)){
        echo '<div class="alert alert-danger" role="alert">
            Il faut remplir tous les champs</div>
         ';
    }
    else{

        $insertData = $db->prepare("INSERT INTO users(nom, prenom, email, password, role_id) VALUES(?,?,?,?,?)");
        $insertData->execute(array($nom,$prenom,$email,$password,3));
        $db->lastInsertId();

        $insertEleve = $db->prepare("INSERT INTO eleves(id_pole_emploi, telephone, adresse, users_id, imageprofil) VALUES(?,?,?,?,?)");
        $insertEleve->execute(array($id_pole_emploi,$telephone,$adresse,$db->lastInsertId(),"admin.jpg"));

        echo "<div class='alert alert-success' role='alert'>
            L'élève est ajouté avec succès !</div>
         ";

    }



}



?>




    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>Accueil | Ajouter un élève</h1>
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

            <!--form ajouter un eleve-->
            <div class="card">
                <div class="card-header">Ajout élève:</div>
                <div class="card-body card-block">
                    <form action="/ajouteleve.php" method="POST">
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
                                <div class="input-group-addon"><i class="fa fa-bookmark"></i></div>
                                <input type="text" id="id_pole_emploi" name="id_pole_emploi" placeholder="N° Pole emploi" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-home"></i></div>
                                <input type="text" id="adresse" name="adresse" placeholder="Adresse" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                <input type="text" id="telephone" name="telephone" placeholder="Telephone" class="form-control" required>
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
                        <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm" name="ajoutereleve">Ajouter</button></div>
                    </form>
                </div>
            </div>
            <!--form ajouter eleve-->

            <div class="clearfix"></div>

        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <div class="clearfix"></div>
    </div>
    <!-- /#right-panel -->

<?php include ('footer.php');?>