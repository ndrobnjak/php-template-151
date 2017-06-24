<div id="header">
    <div>
        <h1>Film-Verwaltung</h1>
    </div>

    <div id="nav">
        <a class="nav_link" href="/">Home</a>
        <?php
        if(isset($_SESSION["username"])){
            if($_SESSION["Ist_Admin"] === 1){
                echo '<a class="nav_link" href="/add-filme">Add Film</a>';                
            }
            if($_SESSION["Ist_Admin"] === 0){
            	echo '<a class="nav_link" href="/filme">Film</a>';
            }
            
        }
        ?>
        <?php
        if(isset($_SESSION["username"])){
            echo '<a class="nav_link" href="/logout">Logout</a>';
            echo '<a class="nav_link" href="/filme">Filme</a>';
        }
        else{
            echo '<a class="nav_link" href="/login">Login</a>';
            echo '<a class="nav_link" href="/register">Register</a>';
        }
        ?>


    </div>
</div>