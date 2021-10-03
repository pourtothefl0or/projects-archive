function myfunc1(){
    if (document.getElementById('SliderCheckDis1').checked == true) {
        document.getElementById('aod_display1').style.display = "unset";
        document.getElementById('aod_display2').style.display = "none";
        document.getElementById('aod_display3').style.display = "none";
    }
}

function myfunc2(){
    if (document.getElementById('SliderCheckDis2').checked == true) {
        document.getElementById('aod_display2').style.display = "unset";
        document.getElementById('aod_display1').style.display = "none";
        document.getElementById('aod_display3').style.display = "none";
    }
}

function myfunc3(){
    if (document.getElementById('SliderCheckDis3').checked == true) {
        document.getElementById('aod_display3').style.display = "unset";
        document.getElementById('aod_display1').style.display = "none";
        document.getElementById('aod_display2').style.display = "none";
    }
}