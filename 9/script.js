function szary(id){
    var szarak = id + "-szary.jpg"; 
    document.getElementById(id).src = szarak; 
}

function kolorowy(id){
    var kolorak = id + ".jpg";
    document.getElementById(id).src = kolorak; 
}

function miniaturka(id){
    kolorowy(id);
    var miniaturak = id + ".jpg";
    document.getElementById("miniatura").src = miniaturak;
}