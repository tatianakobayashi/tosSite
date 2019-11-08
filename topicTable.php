<?php require_once("header.php"); ?>
	<title>Lista de Tópicos</title>
</head>
<body>
<?php require_once("navbar.php"); 
require_once("connect.php");
require_once("issue-database.php"); ?> 

    <table class="table">
        <thead>
            <th>Site</th>
            <th>Url</th>
            <th>Tópico</th>
            <th>Trecho</th>
            <th>Número de edições</th>
            <th>Editar</th>
        </thead>
        <tbody>
            <?php 
                $issues = getAllIssues($connection);
                foreach($issues as $issue) :
            ?>
            <tr>

            <td><?= $issue->getSiteName() ?></td>
            <td><?= $issue->getTosUrl() ?></td>
            <td><?= $issue->getTopic() ?></td>
            <td><?= $issue->getQuote() ?></td>
            <td><?= $issue->getEdits() ?></td>
            <td>
                <form action="form.php" method="post">
                    <input type="hidden" name="id" value="<?=$issue->getId()?>" />
                    <input type="hidden" name="action" value="edit" />
                    <button class="btn btn-danger" action="submit">Editar</button>
                </form>
            </td>
            </tr>
            <?php
                endforeach
            ?>
        </tbody>
    </table>
</body>
</html>
