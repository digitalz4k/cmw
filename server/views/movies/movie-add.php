<h2>Ajouter un film</h2>
<div class="addLoader"></div>
<form id="add_new_movie">
    <div class="add-error"></div>
    <div class="input-field">
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="movie_titre" placeholder="Titre du film...."/>
    </div>
    <div class="input-field">
        <label for="real">Réalisateur</label>
        <input type="text" name="real" id="movie_real" placeholder="Réalisateur du film..." />
    </div>
    <div class="input-field">
        <label for="prod">Producteur</label>
        <input type="text" name="prod" id="movie_prod" placeholder="Producteur du film..." />
    </div>
    <div class="input-field">
        <label for="actors">Acteurs</label>
        <input type="text" name="actors" id="movie_actors" placeholder="Acteurs du film..."/>
    </div>
    <div class="input-field">
        <textarea name="synop" id="movie_synop"></textarea>
        <label for="synop">Synopsis</label>
    </div>
    <div class="input-field">
        <label for="ba">Bande annonce</label>
        <input type="text" name="ba" id="movie_ba" placeholder="Lien en streaming pirate..." />
    </div>
    <div class="input-field">
        <select name="movie_category" id="movie_categories">
            <option value="" disabled selected>Choisir une categorie</option>
        </select>
        <label>Catégorie</label>
    </div>
    <div class="input-field">
        <select name="movie_annee">
            <option value="" disabled selected>Choisir une année</option>
            <option value="2000">2000</option>
            <option value="2001">2001</option>
            <option value="2002">2002</option>
            <option value="2003">2003</option>
            <option value="2004">2004</option>
            <option value="2005">2005</option>
            <option value="2006">2006</option>
            <option value="2007">2007</option>
        </select>
        <label>Année de production</label>
    </div>
    <div class="input-field">
        <select name="movie_langue">
            <option value="" disabled selected>Choisir une langue</option>
            <option value="français">Français</option>
            <option value="allemand">Allemand</option>
            <option value="anglais">Anglais</option>
            <option value="portugais">Portugais</option>
            <option value="espagnol">Espagnol</option>
        </select>
        <label>Langue</label>
    </div>
    
    <input type="submit" value="Submit"/>
</form>