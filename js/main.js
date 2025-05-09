function validateForm() {
    let no = document.getElementById('mobilenumber');
    let flag = true;
    let number = parseInt(no.value);
    if(number>=6000000000 && number<= 9999999999){
        no.style="";
    }
    else{
        no.style="border-color:red";
        flag = false;
    }

    pwd = document.getElementById("p1").value;
    cpwd = document.getElementById("p2").value;
    if(pwd==cpwd){
        document.getElementById("p1").style('');
        document.getElementById("p2").style('');
    }
    else{
        flag = false;
        document.getElementById("p1").style="border-color:red";
        document.getElementById("p2").style="border-color:red";
    }



    return flag;   
}