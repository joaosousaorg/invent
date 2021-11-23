<html lang="pt">
<head>
    <title>Inventário - Abatidos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Inventário</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="abat.php">Abatidos</a>
                    <a class="nav-link" href="top.php">Top 10</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Computadores Abatidos</h2>
                <?php   
                    #$q = $_GET['q'];
                    include('connect.php');

                    #$sql="SELECT piloto.nome, piloto.sigla, participa.pontos FROM piloto JOIN participa ON participa.id_piloto = piloto.id_piloto WHERE sigla = '".$q."' ORDER BY participa.pontos ASC" ;
                    echo "<table class='table'>
                    <tr>
                        <th scope='col'>Marca</th>
                        <th scope='col'>Modelo</th>
                        <th scope='col'>Sistema Operativo</th>
                        <th scope='col'>Ações</th>
                    </tr>";
                    $sql = "SELECT * FROM comp INNER JOIN comp_abat ON comp.id_abat = comp_abat.id_abat";
                    $result = mysqli_query($conn,$sql);

                    if($result){
                        while($row = mysqli_fetch_array($result)) {
                            $id=$row['id_abat'];
                            $marca=$row['marca'];
                            $modelo=$row['modelo'];
                            $so=$row['so'];
                            echo "<tr>";
                            echo "<td>" . $marca . "</td>";
                            echo "<td>" . $modelo . "</td>"; 
                            echo "<td>" . $so . "</td>";
                            echo "<td><a class='btn btn-outline-primary btn-sm' role='button' href='view.php'>Ver</a></td>";
                            echo "<td><a class='btn btn-danger btn-sm' role='button' href='delet.php?deletid=".$id."'>Remover</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        mysqli_close($conn);
                    }
                ?>
            </div>
            <!--data-whatever=".$id."-->
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>