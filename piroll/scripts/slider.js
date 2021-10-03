function f1(){
    if (document.getElementById('SliderCheck1').checked == true) {
        document.getElementById('outstanding_block-row1').style.display = "unset";
        document.getElementById('outstanding_block-row2').style.display = "none";
        document.getElementById('outstanding_block-row3').style.display = "none";
    }
}

function f2(){
    if (document.getElementById('SliderCheck2').checked == true) {
        document.getElementById('outstanding_block-row2').style.display = "unset";
        document.getElementById('outstanding_block-row1').style.display = "none";
        document.getElementById('outstanding_block-row3').style.display = "none";
    }
}

function f3(){
    if (document.getElementById('SliderCheck3').checked == true) {
        document.getElementById('outstanding_block-row3').style.display = "unset";
        document.getElementById('outstanding_block-row1').style.display = "none";
        document.getElementById('outstanding_block-row2').style.display = "none";
    }
}