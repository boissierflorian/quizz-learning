var config = {
    "navbar": {
        "id": "topNavbar"
    }
}

function toggleElement(elementID) {
    var x = document.getElementById(elementID);
    if (x.className.indexOf('W3-show') == -1) {
        x.className += "w3-show";
    } else {
        x.className = x.className.replace("w3-show", "");
    }
}