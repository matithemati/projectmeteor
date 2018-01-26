let aUp = '<i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-up" aria-hidden="true"></i> <i class="fa fa-long-arrow-up" aria-hidden="true"></i>';
let aDn = '<i class="fa fa-long-arrow-down" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i> <i class="fa fa-long-arrow-down" aria-hidden="true"></i>';

let b = document.getElementById("atable");
let tb1 = document.getElementById("tb1");
let a = 0;
b.onclick = function(){
    if(a){
        a=0;
        b.innerHTML = aUp;
        tb1.style.display = "block";
    }else{
        a=1;
        b.innerHTML = aDn;
        tb1.style.display = "none";
    }
}