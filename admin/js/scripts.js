$(document).ready(function(){
    $('#selectAllBoxes').click(function(event){
        if (this.checked) {
            $('.checkBoxes').each(function(){
                this.checked = true;
            });
        } else {
            $('.checkBoxes').each(function(){
                this.checked = false;
            });
        }
    });
    
    
    var div_box = "<div id='load-screen'><div id='loading'></div></div>";
    
    $("body").prepend(div_box);
    
    $('#load-screen').delay(200).fadeOut(200, function(){
        $(this).remove();
    });

});
//using jquery
//function loadUserOnline() {
//    $.get("functions.php?onlineusers=result",function(data){
//        $("#useronline").text(data);
//    });
//}
//setInterval(function(){
//    loadUserOnline();
//},500);

function loadUser() {
    
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "functions.php?onlineusers=result", true);
    
    xhr.onload = function() {
            let t = this.responseText;
            document.getElementById("useronline").textContent = t;
    }
    xhr.send();
}

setInterval(function(){
    loadUser();
},100);







