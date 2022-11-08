
if (sessionStorage.getItem("darkMode") == null)
    sessionStorage.setItem("darkMode", false);

if (sessionStorage.getItem("darkMode") == 'true'){
    $("html").addClass("dark");
}

$("#theme-button").click(function(){

    $("html").toggleClass("dark");
    var dark = sessionStorage.getItem("darkMode") === 'true'
    sessionStorage.setItem("darkMode", !dark);
})