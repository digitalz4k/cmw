<nav class="blue">
    <div class="container">
        <div class="nav-wrapper">
            <a href="/cmw" class="brand-logo">Cinemanager</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="fa fa-bars"></i></a>
            <ul class="right hide-on-med-and-down">
            <?php
            if(isset($_SESSION["auth"]) && $_SESSION["auth"] == true) {
            ?>
                <li><a href="?page=movieslist">Liste des films</a></li>
                <li><a href="?page=addmovie">Ajouter un film</a></li>
                <li><a href="?page=logout">Logout</a></li>
            <?php } else { ?>
                <li id="nav-login">
                    <form class="row form-signin">
                        <input type="text" name="login" placeholder="Email or phone number" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="submit" class="btn btn-flat white-text" value="Connect">
                    </form>
                </li>
            <?php } ?>
            </ul>
            <ul class="side-nav" id="mobile-demo">
            <?php
            if(isset($_SESSION["auth"]) && $_SESSION["auth"] == true ) {
            ?>
                <li><a href="?page=movieslist">Liste des films</a></li>
                <li><a href="?page=addmovie">Ajouter un film</a></li>
                <li><a href="?page=logout">Logout</a></li>
            <?php } else { ?>
                <li><a href="?page=login" >Login</a></li>
            <?php } ?>
            </ul>
        </div>
    </div>
 </nav>