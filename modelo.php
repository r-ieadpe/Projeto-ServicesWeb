<?php require_once "servico.php";

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="cover">
        <div class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>Feramed<span class="text-danger">xi</span></span></a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active">
                            <a href="#">Início</a>
                        </li>
                        <li>
                            <a href="#">Sobre</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="background-image-fixed cover-image" style="background-image : url('http://purl.pt/26900/2/images/background.jpg')"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <?php

                            if(isset($_GET['id'])){
                                $id = $_GET['id'];
                                $arrayList = getArray(1,$id);
                               
                        ?>
                        <div class="panel-heading">
                            <h3 class="panel-title">Modelos do dominio</h3></div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <?php foreach ($arrayList as $dom) {?>
                                    <a href="<?php echo "topicos.php?id=".$dom["@Ontology#id"];?>"><li class="list-group-item"><?php echo $dom["@Ontology#id"]." - ".$dom["@Ontology#label"]."<br>";?></li></a>
                                <?php }?>
                            </ul>
                            <?php
                                }else{
                                   echo "<p>ID não informado</p>"; 
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>