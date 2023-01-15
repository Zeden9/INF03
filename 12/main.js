var id_zamowienia = 0;
braki();

function braki(){  
    var braki = document.querySelectorAll(".ilosc");
    braki.forEach(element => {
        var ilosc = element;
        var iloscInt = parseInt(element.innerHTML);
        console.log(ilosc);
        console.log(iloscInt)

        if(iloscInt == 0){
            element.style.backgroundColor = "Red";
        }
        else if( iloscInt >= 1 && iloscInt <=5){
            element.style.backgroundColor = "Yellow";
        }
        else{
            element.style.backgroundColor = "Honeydew";
        }
    });
}

function aktualizuj(id){
    var dostepnaIlosc = prompt("Podaj nową ilość");
    document.getElementById(id).innerHTML = dostepnaIlosc;
    braki();
}

function zamow(produkt) {
    id_zamowienia +=1;
    alert("Zamówienie nr: " + id_zamowienia + " Produkt: " + document.getElementById(produkt).innerHTML)
}