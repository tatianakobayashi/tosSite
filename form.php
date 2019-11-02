<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <!-- Css Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- JavaScript Bootstrap -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <link rel="stylesheet" href="css/basic.css">
	<title>Formulário</title>
</head>
<body>
    <form method="POST">
        <div class="form-group">
            <label for="siteName">Site</label>
            <input type="text" name="siteName" class="form-control"/>
        </div>

        <div class="form-group">
            <label for="termUrl">Url do Site</label>
            <input type="text" name="termUrl" class="form-control"/>
        </div>
        <div class="form-group">
            <label for="topic">Tópico</label>
            <input type="text" name="topic" class="form-control"/>
        </div>
        <!--<label for="otherTopic">Outro tópico</label>
        <input type="text" name="otherTopic"/>-->

        <div class="form-group">
            <label for="quote">Trecho do termo em questão</label>
            <textarea type="text" name="quote" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>