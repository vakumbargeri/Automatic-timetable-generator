function save_to_pdf(){
                
    //Opens new window and prints required content
    dom = document.getElementById("select");
    var printdivname;

    if(dom.value === "stu_timetable"){
        printdivname = "show_stu_timetable"
    }else if(dom.value === "lec_timetable"){
        printdivname = "show_lec_timetable"
    }else{
        return;
    }
    var headstr = "<html><head><title></title></head><body>";
    var footstr = "</body>";
    var newstr = document.getElementById(printdivname).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = headstr+newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    
}

