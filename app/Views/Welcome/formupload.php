<form method="post" enctype="multipart/form-data" action="/chanson/cree">
    <label>Titre : </label><input type="text" name="nom" placeholder="Le titre"/> <br />
    <label>Style : </label><input type="text" name="style" placeholder="Rock,Rap..."/> <br />
    <label>Artiste : </label><input type="text" name="artist" placeholder="Artiste"/> <br />
    <label>Album : </label><input type="text" name="album" placeholder="Album"/> <br />
    <label>Le fichier : </label><input type="file" name="chanson" placeholder="Le fichier"/> <br />
    <label>La jaquette : </label><input type="file" name="cover" placeholder="Jaquette"/> <br />
    <input type="submit" />
</form>