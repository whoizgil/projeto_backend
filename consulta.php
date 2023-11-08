<?php
include('banco_de_dados/conexaosql.php');
session_start();

if (!isset($_SESSION['login']) || !isset($_SESSION['2fa']) || $_SESSION['2fa'] !== true) {
    header("Location: erro_login.php");
    exit();
}

if ($_SESSION['tipo'] == 'c') {
    header('location:erro_voltar.php');
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Buscar o status atual do usuário
    $stmt = $mysqli->prepare('SELECT statuses FROM usuario WHERE nome = ?');
    $stmt->bind_param('s', $_POST['nome']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $statusAtual = $row['statuses'];

    // Atualizar o status com base no status atual
    if ($statusAtual == 1) {
        $stmt = $mysqli->prepare('UPDATE usuario SET statuses = "2" WHERE nome = ?');
    } else {
        $stmt = $mysqli->prepare('UPDATE usuario SET statuses = "1" WHERE nome = ?');
    }
    $stmt->bind_param('s', $_POST['nome']);
    $stmt->execute();

    header("Location: consulta.php");
    exit();
}


$query = 'SELECT u.login, u.nome, u.celular, u.tel_fixo, u.statuses, t.tipo_desc, s.statuses_desc FROM usuario u INNER JOIN tipo t ON u.tipo = t.tipo INNER JOIN statuses s ON u.statuses = s.statuses WHERE u.tipo = "c"';


$stmt = $mysqli->query($query);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Usuários</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Onest">
    <style>
        * {
            font-family: 'Onest', sans-serif;
        }

        body {
            -webkit-font-smoothing: antialiased;
            margin: 0;

        }


        /* Table Styles */

        .table-wrapper {
            margin: 110px 70px 70px;
            box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
        }

        .fl-table {
            border-radius: 5px;
            font-size: 12px;
            font-weight: normal;
            border: none;
            border-collapse: collapse;
            width: 100%;
            max-width: 100%;
            white-space: nowrap;
            background-color: white;
        }

        .fl-table td,
        .fl-table th {
            text-align: center;
            padding: 8px;
        }

        .fl-table td {
            border-right: 1px solid #f8f8f8;
            font-size: 12px;
        }

        .fl-table thead th {
            color: #ffffff;
            background: #9b1313;
        }


        .fl-table thead th:nth-child(odd) {
            color: #ffffff;
            background: #324960;
        }

        .fl-table tr:nth-child(even) {
            background: #F8F8F8;
        }

        .myButton {
            box-shadow: 0px 4px 14px -7px #276873;
            background: linear-gradient(to bottom, #9b1313 5%, #9b1313 100%);
            background-color: #9b1313;
            border-radius: 21px;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 12px;
            font-weight: bold;
            padding: 6px 8px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #3d768a;
            border: none;
        }

        .myButton:hover {
            background: linear-gradient(to bottom, #9b1313 5%, #9b1313 100%);
            background-color: #9b1313;
        }

        .myButton:active {
            position: relative;
            top: 1px;
        }


        /* Responsive */

        @media (max-width: 767px) {
            .fl-table {
                display: block;
                width: 100%;
            }

            .table-wrapper:before {
                display: block;
                text-align: right;
                font-size: 11px;
                color: white;
                padding: 0 0 10px;
            }

            .fl-table thead,
            .fl-table tbody,
            .fl-table thead th {
                display: block;
            }

            .fl-table thead th:last-child {
                border-bottom: none;
            }

            .fl-table thead {
                float: left;
            }

            .fl-table tbody {
                width: auto;
                position: relative;
                overflow-x: auto;
            }

            .fl-table td,
            .fl-table th {
                padding: 20px .625em .625em .625em;
                height: 60px;
                vertical-align: middle;
                box-sizing: border-box;
                overflow-x: hidden;
                overflow-y: auto;
                width: 120px;
                font-size: 13px;
                text-overflow: ellipsis;
            }

            .fl-table thead th {
                text-align: left;
                border-bottom: 1px solid #f7f7f9;
            }

            .fl-table tbody tr {
                display: table-cell;
            }

            .fl-table tbody tr:nth-child(odd) {
                background: none;
            }

            .fl-table tr:nth-child(even) {
                background: transparent;
            }

            .fl-table tr td:nth-child(odd) {
                background: #F8F8F8;
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tr td:nth-child(even) {
                border-right: 1px solid #E6E4E4;
            }

            .fl-table tbody td {
                display: block;
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="navbar">
        <?php include_once('navbar_main.php'); ?>
    </div>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Login</th>
                    <th>Nome</th>
                    <th>Celular</th>
                    <th>Telefone Fixo</th>
                    <th>Tipo</th>
                    <th>Status</th>
                    <th>Opção</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $stmt->fetch_assoc()) : ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['login']); ?></td>
                        <td><?php echo htmlspecialchars($row['nome']); ?></td>
                        <td><?php echo htmlspecialchars($row['celular']); ?></td>
                        <td><?php echo htmlspecialchars($row['tel_fixo']); ?></td>
                        <td><?php echo htmlspecialchars($row['tipo_desc']); ?></td>
                        <td><?php echo htmlspecialchars($row['statuses_desc']); ?></td>
                        <td>
                            <form method="post" action="">
                                <?php if ($row['statuses'] == 1) : ?>

                                    <input type="hidden" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>">
                                    <input class="myButton" type="submit" value="Desativar">
                                <?php else : ?>
                                    <input type="hidden" name="nome" value="<?php echo htmlspecialchars($row['nome']); ?>">
                                    <input class="myButton" type="submit" value="Ativar">

                                <?php endif; ?>
                            </form>



                        </td>
                    </tr>
                <?php endwhile; ?>
            <tbody>
        </table>
    </div>

    <div class="footer" style="margin-top: 265px;">
        <?php include_once('footer.php'); ?>
    </div>
</body>

</html>