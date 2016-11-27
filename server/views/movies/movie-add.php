<?php
require_once("server/components/sql/request.php");

$user_id = $_SESSION["user"][0]["user_id"];
//$library_id = $_SESSION["library"][0]["library_id"];
$library_id = 1;

function get_categories ()
{
    $sql = "SHOW COLUMNS FROM movies LIKE ?;";
    $params = array("category");

    $req = db_request($sql, $params);

    if($req["nb"] > 0) {
    
        $res = $req["res"][0];
        
        if($res['Field'] == "category")
        {            
            $types=$res['Type'];
            $beginStr=strpos($types,"(")+1;
            $endStr=strpos($types,")");
            $types=substr($types,$beginStr,$endStr-$beginStr);
            $types=str_replace("'","",$types);
            $types=split(',',$types);
            // Response
            return $types;
        } else {             
            echo "Categories not found.";
        }
        
    } else {
        header("HTTP/1.0 404 Not Found");
        die("List of categories empty.");
    }
}
?>
<h2>Add new movie</h2>
<div class="addLoader"></div>
<form id="add_new_movie" data-user-id="<?php echo $user_id; ?>" data-library-id="<?php echo $library_id; ?>">
    <div class="add-error"></div>
    <div class="input-field">
        <label for="title">title</label>
        <input type="text" name="title" id="title" placeholder="Movie title"/>
    </div>
    <div class="input-field">
        <label for="director">Director</label>
        <input type="text" name="director" id="director" placeholder="Movie director" />
    </div>
    <div class="input-field">
        <label for="producer" id="producer">Producteur</label>
        <input type="text" name="producer" placeholder="Movie producer" />
    </div>
    <div class="input-field">
        <label for="actors">Acteurs</label>
        <input type="text" name="actors" id="actors" placeholder="Movie actors"/>
    </div>
    <div class="input-field">
        <textarea name="storyline" id="storyline" class="materialize-textarea"></textarea>
        <label for="storyline">Movie storyline</label>
    </div>
    <div class="input-field">
        <label for="video">Trailer</label>
        <input type="text" name="video" id="video" placeholder="Youtube Video URL" />
    </div>
    <div class="input-field">
        <select name="category">
            <option value="" disabled selected>Select movie category</option>
            <?php 
            $categories = get_categories();
            foreach ($categories as $category) {
                echo '<option value="'.$category.'">'.$category.'</option>';
            }
            ?>
        </select>
        <label>Category</label>
    </div>
    <div class="input-field">
        <select name="year_of_prod">
            <option value="" disabled selected>Select year of production</option>
            <?php 
                for($i=2016;$i>=1970;$i--) {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <label>Year</label>
    </div>
    <div class="input-field">
        <select name="movie_langue">
            <option value="" disabled selected>Select language</option>
            <option value="français">French</option>
            <option value="allemand">German</option>
            <option value="anglais">English</option>
            <option value="portugais">Portuguese</option>
            <option value="espagnol">Spanish</option>
        </select>
        <label>Language</label>
    </div>
    
    <input type="submit" value="Submit" class="waves-effect waves-teal btn-flat btn-large teal white-text"/>
</form>