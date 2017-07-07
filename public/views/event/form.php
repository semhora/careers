<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>

    <body>

        <form action="/admin/event/save" method="post" enctype="multipart/form-data">
            Nome:
            <input type="text" value="" name="name" required=""/>

            <br>
            Descrição:
            <input type="text" value="" name="description" required=""/>

            <br>
            Local:
            <input type="text" value="" name="locality" required=""/>

            <br>
            Horario de inicio:
            <input type="time" value="" name="startHour" required=""/>

            <br>
            imagem:
            <input type="file" value="" name="img" required=""/>

            <br>
            Status:
            <label><input type="radio" value="1" name="status" required=""/> Ativo</label>
            <label><input type="radio" value="0" name="status" required=""/> Inativo</label>

            <br>
            <input type="submit" value="Salvar" />
        </form>

    </body>
</html>