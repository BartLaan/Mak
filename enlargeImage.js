function zoom(){
    var NAME = document.getElementById("imgs");

    if (menu == 1) {

        menu = 0;
        $("#imgs").animate(
            {'width': '150px','height':'250px'},150
        );

    } else {
        $("#imgs").animate(
            {'width': '100px','height':'150px'},150
        );
    }
}
