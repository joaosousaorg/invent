<html lang="pt">
<head>
    <title>Inventário</title>
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
                    <a class="nav-link" href="abat.php">Abatidos</a>
                    <a class="nav-link" href="top.php">Top 10</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container pt-4">
        <div class="row">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="insert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Inserir Computador</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="form.php" method="POST">
                                    <label class="form-label">Marca</label>
                                    <input class="form-control" type="text" name="marca">
                                    <br>
                                    <label class="form-label">Modelo</label>
                                    <input class="form-control" type="text" name="modelo">
                                    <br>
                                    <label class="form-label">Sistema Operativo</label>
                                    <input class="form-control" type="text" name="so">
                                    <br>
                                    <button class="btn btn-primary" type="submit" name="submit">Inserir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="soft" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Inserir Programa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="softform.php" method="POST">
                                    <label class="form-label" for="compselect">Computador</label>
                                    <select class="form-select" id="compselect" name="comp" required>
                                        <?php
                                            include('connect.php');
                                            $sql = "SELECT * FROM comp ORDER BY id_comp";
                                            $result = mysqli_query($conn,$sql);
                                            while($sel = mysqli_fetch_row($result)){
                                                $id_c=$sel[0];
                                                $nome=$sel[1];
                                                $mod=$sel[2];
                                                echo "<option value='$id_c'>$nome $mod</option>";
                                            }
                                            mysqli_close($conn);
                                        ?>
                                    </select>
                                    <br>
                                    <label class="form-label">Nome</label>
                                    <input class="form-control" type="text" name="nome" required>
                                    <br>
                                    <label class="form-label">Versão</label>
                                    <input class="form-control" type="text" name="versao" required>
                                    <br>
                                    <button class="btn btn-primary" type="submit" name="submit">Inserir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Computadores</h2>
                <button type='button' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insert">Inserir Computador</button>
                <button type='button' class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#soft">Inserir Programa</button>
                <?php
                    include('connect.php');
                    echo "<table class='table'>
                    <tr>
                        <th scope='col'>Marca</th>
                        <th scope='col'>Modelo</th>
                        <th scope='col'>Sistema Operativo</th>
                        <th scope='col'>Ações</th>
                    </tr>";
                    $sql = "SELECT * FROM comp";
                    $result = mysqli_query($conn,$sql);

                    if($result){
                        while($row = mysqli_fetch_array($result)) {
                            $id=$row['id_comp'];
                            $marca=$row['marca'];
                            $modelo=$row['modelo'];
                            $so=$row['so'];
                            echo "<tr>";
                            echo "<td>" . $marca . "</td>";
                            echo "<td>" . $modelo . "</td>"; 
                            echo "<td>" . $so . "</td>";
                            echo "<td><a class='btn btn-outline-primary btn-sm' role='button' href='view.php?viewid=".$id."'>Ver</a></td>";
                            echo "<td><button type='button' class='btn btn-outline-warning btn-sm' data-bs-toggle='modal' data-bs-target='#edit' data-whatever=".$id." data-whatevermarca=".$marca." data-whatevermodelo=".$modelo." data-whateverso=".$so.">Editar</button></td>";
                            echo "<td><a class='btn btn-outline-danger btn-sm' role='button' href='abatform.php?abatid=".$id."'>Abater</a></td>";
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
        <div class="row">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="edit" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Editar Computador</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="edit.php" method="POST">
                                    <input name="id" type="hidden" class="form-control" name="id" id="id-comp">
                                    <label class="form-label">Marca</label>
                                    <input class="form-control" type="text" id="marca" name="marca">
                                    <br>
                                    <label class="form-label">Modelo</label>
                                    <input class="form-control" type="text" id="modelo" name="modelo">
                                    <br>
                                    <label class="form-label">Sistema Operativo</label>
                                    <input class="form-control" type="text" id="so" name="so">
                                    <br>
                                    <button class="btn btn-primary" type="submit" name="submit">Editar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var exampleModal = document.getElementById('edit')
        exampleModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            var button = event.relatedTarget
            // Extract info from data-bs-* attributes
            var recipientid = button.getAttribute('data-whatever')
            var recipientmarca = button.getAttribute('data-whatevermarca')
            var recipientmodelo = button.getAttribute('data-whatevermodelo')
            var recipientso = button.getAttribute('data-whateverso')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var inputmodalid = exampleModal.querySelector('.modal-body #id-comp')
            var inputmodalma = exampleModal.querySelector('.modal-body #marca')
            var inputmodalmo = exampleModal.querySelector('.modal-body #modelo')
            var inputmodalso = exampleModal.querySelector('.modal-body #so')

            modalTitle.textContent = 'A editar: ' + recipientmarca
            inputmodalid.value = recipientid
            inputmodalma.value = recipientmarca
            inputmodalmo.value = recipientmodelo
            inputmodalso.value = recipientso
        })
    </script>
</body>
</html>