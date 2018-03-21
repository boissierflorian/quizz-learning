var config = {
    "navbar": {
        "id" : "topNavBar"
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

window.onscroll = function() {
    onScrollWindow();
}

function onScrollWindow() {
    var navbar = document.getElementById(config.navbar.id);
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar w3-card w3-animate-top w3-white";
    } else {
        navbar.className = navbar.className.replace("w3-card w3-animate-top w3-white", "");
    }
}