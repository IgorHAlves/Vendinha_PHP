<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
        integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../src/css/styles.css">
    <title>Front</title>
</head>


<body>
    <nav id="sidebar">
        <div id="sidebar_content">
            <!-- Usuario info -->
            <div id=user>
                <img src="../src/images/avatar.jpg" id="user_avatar" alt="Avatar">

                <p id="user_infos">
                    <span class="item-description">
                        Igor Alves
                    </span>
                    <span class="item-description">
                        Desenvolvedor
                    </span>
                </p>
            </div>

            <!-- Itens Laterais  -->
            <ul id="side_items">
                <li class="side-item active">
                    <a href="#">
                        <i class="fa-solid fa-users"></i>
                        <span class="item-description">Clientes</span>
                    </a>
                </li>

                <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-chart-line"></i>
                        <span class="item-description">Dashboard</span>
                    </a>

                </li>

                <li class="side-item">
                    <a href="../index.html">
                        <i class="fa-solid fa-box"></i>
                        <span class="item-description">Produtos</span>
                    </a>
                </li>

                <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-image"></i>
                        <span class="item-description">Imagens</span>
                    </a>
                </li>

                <li class="side-item">
                    <a href="#">
                        <i class="fa-solid fa-gear"></i>
                        <span class="item-description">Imagens</span>
                    </a>
                </li>
            </ul>
            <button id="open_btn">
                <i id="open_btn_icon" class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

        <div id="logout">
            <button id="logout_btn">
                <i class="fa-solid fa-right-from-bracket"></i>
                <span class="item-description">Logout</span>
            </button>
        </div>

    </nav>

    <main>
        <h1>Clientes</h1>
        <!-- <button id="open_dialog" class='btn btn-outline-primary'>Cadastrar</button> -->
        <button type="button" class="btn" id="open_dialog" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@mdo">Novo</button>

        <!-- dialog -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="form" method="post" action="Cadastro_Cliente.php">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nome:</label>
                                <input type="text" class="form-control" id="recipient-name" name="Nome">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">CPF:</label>
                                <input type="text" class="form-control" id="recipient-name" name="CPF">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Telefone:</label>
                                <input type="text" class="form-control" id="recipient-name" name="Telefone">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">Voltar</button>
                        <button type="submit" class="btn">Cadastrar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        include('Mensagem.php');
        ?>

<form method="GET" class="d-flex">
    <input 
        type="text" 
        class="form-control mb-2 busca" 
        placeholder="Nome cliente" 
        id="recipient-name" 
        name="busca" 
        value="<?php echo htmlspecialchars(isset($_GET['busca']) ? $_GET['busca'] : ''); ?>"
    >
    <button type="submit" class="btn btn-primary">Buscar</button>
</form>
        
        <table class="table rounded">
           <thead>
               <tr>
               <th scope="col">#</th>
               <th scope="col">Nome</th>
               <th scope="col">CPF</th>
               <th scope="col">Endereco</th>
               </tr>
           </thead>
           <tbody>
            <?php
            
              require("../conecta.php");
              $busca = isset($_GET['busca']) ? $_GET['busca'] : '';
              if($busca != '')
              {
                $sql_code = "SELECT * FROM Clientes WHERE Clientes.Nome like '%$busca%'";

              }else{
                $sql_code = "SELECT * FROM Clientes";
              }

              $sql_query = $conn->query($sql_code) or die("Erro ao consultar " . $conn->error);

              while($dados = $sql_query->fetch_assoc())
              {
                echo  "<tr>";
                echo "<th scope='row'>" . htmlspecialchars($dados['id']) . "</th>";
                echo  "<td>" . htmlspecialchars($dados['nome']) . "</td>";
                echo  "<td>" . htmlspecialchars($dados['cpf']) . "</td>";
                echo  "<td>" . htmlspecialchars($dados['endereco']) . "</td>";
                echo  "</tr>";
            }
            ?>
           </tbody>
        </table>

    </main>
    <script src="../src/javascript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>

</html>