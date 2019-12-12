function changeform_timetable(){
    
        dom = document.getElementById("select");
        
	stu_timetable = document.getElementById("show_stu_timetable");
        lec_timetable = document.getElementById("show_lec_timetable");
	download = document.getElementById("download");
        
        stu_timetable.style.display = (dom.value == "stu_timetable") ? "block":"none";
        
        lec_timetable.style.display = (dom.value == "lec_timetable") ? "block":"none";
        
        download.style.display = (dom.value == "sel") ? "none":"block";
}


