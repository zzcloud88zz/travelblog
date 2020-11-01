
$(document).ready(function(){
    $("#editpost").submit(function(){
        if (confirm('Are you sure you wanna edit this post?')){
            return true;
        }
        else {
            return false;
        }
    });
});

$(document).ready(function(){
    $("#deletepost").submit(function(){
        if (confirm('Are you sure you wanna delete this post?')){
            return true;
        }
        else {
            return false;
        }
    });
});

$(document).ready(function(){
    $("#createpost").submit(function(e){
        if($("#postpic").val() == ''){
            e.preventDefault();
            alert("You forgot to upload your picture!");
        }
        if($("#caption").val() == ''){
            e.preventDefault();
            alert("You forgot to add your caption!");
        }
        if($("#story").val() == ''){
            e.preventDefault();
            alert("You forgot to add your story!");
        }
    });
});

$(document).ready(function(){
    $("#editpost").submit(function(e){
        if($("#caption").val() == ''){
            e.preventDefault();
            alert("You forgot to add your caption!");
        }
        if($("#story").val() == ''){
            e.preventDefault();
            alert("You forgot to add your story!");
        }
    });
});
