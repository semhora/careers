<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>

        <form action="/auth/authenticate" method="post">

            Usuário:
            <input type="text" value="" name="user" required=""/>

            <br>
            Senha:
            <input type="password" value="" name="pass" required=""/>

            <br>
            <input type="submit" value="Entrar" />
        </form>

    </body>
</html>