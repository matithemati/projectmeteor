let n = document.getElementById("newS");
let p = document.getElementById("posts");
n.addEventListener("click",function(){
    p.innerHTML = '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>';
    $.ajax({
        type: "POST",
        cache: false,
        dataType: 'html',
        contentType: "application/x-www-form-urlencoded; charset=UTF-8",
        url: '../admin/functions/a_posts.php',
        success: function(res){
            p.innerHTML = res;
        }
    });
});
