<div class=" col-md-4 col-md-offset-4">
    <form  name="submit" action="/login" class="form" method="post">
        <?php
        //affichage des messages FLASH
        $flashes = getFlash();
        if (count($flashes) > 0) {

            echo"<div class='alert alert-warning' role='alert' style='margin-top:50px'>";
            foreach ($flashes as $message) {
                echo "<p>$message</p>";
            }
            echo "</div>";
        }
        ?>
        <div class="form-group" style="padding-top:30px">
            <label>email</label>
            <input type="text" name="login" class
                   ="form-control" value="<?= $login ?>">

        </div>

        <div class="form-group">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control">

        </div>
        <button class="btn btn-primary" type="submit" name="submit">Valider</button>
    </form>


</div>