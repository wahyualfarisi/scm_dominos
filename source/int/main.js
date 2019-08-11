$(document).ready(function(){
    $('#logout').click(function(){
        sessionStorage.clear();
        window.location.replace(`${BASE_URL}private`)
    })
})