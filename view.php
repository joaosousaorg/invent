<html lang="pt">
<head>
    <title>Inventário - View</title>
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
                <h2>Programas</h2>
                <?php
                    include('connect.php');
                    
                    echo "<table class='table'>
                    <tr>
                        <th scope='col'>Nome</th>
                        <th scope='col'>Versão</th>
                        <th scope='col'>Ações</th>
                    </tr>";
                    $id=$_GET['viewid'];
                    $sql = "SELECT * FROM software WHERE id_comp='$id'";
                    $result = mysqli_query($conn,$sql);

                    if($result){
                        while($row = mysqli_fetch_array($result)) {
                            $id_soft=$row['id_software'];
                            $nome=$row['nome'];
                            $versao=$row['versao'];
                            echo "<tr>";
                            echo "<td>" . $nome . "</td>";
                            echo "<td>" . $versao . "</td>";
                            echo "<td><button type='button' class='btn btn-outline-warning btn-sm' data-bs-toggle='modal' data-bs-target='#edit' data-whatever=".$id_soft." data-whatevernome=".$nome." data-whateverversao=".$versao.">Editar</button></td>";
                            echo "<td><a class='btn btn-danger btn-sm' role='button' href='deletv.php?deletvid=".$id_soft."'>Remover</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                        mysqli_close($conn);
                    }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Modal -->
                <div class="modal fade" id="edit" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Editar Programa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="softedit.php" method="POST">
                                    <input name="id" type="hidden" class="form-control" name="id" id="id-soft">
                                    <label class="form-label">Nome</label>
                                    <input class="form-control" type="text" id="nome" name="nome">
                                    <br>
                                    <label class="form-label">Versão</label>
                                    <input class="form-control" type="text" id="versao" name="versao">
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
    <div class="container pt-4">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
                <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                </a>
                <span class="text-muted">© 2021 Créditos: João Sousa e Pedro Proença</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                <li class="ms-3"><a class="text-muted" href="https://github.com/joaosousaorg/invent.git"><svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/></svg></a></li>
            </ul>
        </footer>
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
            var recipientnome = button.getAttribute('data-whatevernome')
            var recipientversao = button.getAttribute('data-whateverversao')
            // If necessary, you could initiate an AJAX request here
            // and then do the updating in a callback.
            //
            // Update the modal's content.
            var modalTitle = exampleModal.querySelector('.modal-title')
            var inputmodalid = exampleModal.querySelector('.modal-body #id-soft')
            var inputmodalnome = exampleModal.querySelector('.modal-body #nome')
            var inputmodalversao = exampleModal.querySelector('.modal-body #versao')

            modalTitle.textContent = 'A editar: ' + recipientnome
            inputmodalid.value = recipientid
            inputmodalnome.value = recipientnome
            inputmodalversao.value = recipientversao
        })
    </script>
</body>
</html>