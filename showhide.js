function changeform()
{
	dom = document.getElementById("select");
	sub = document.getElementById("show_sub");
	lab = document.getElementById("show_lab");
	lec = document.getElementById("show_lec");
	stu = document.getElementById("show_stu");
        
	
	
	sub.style.display = (dom.value == "sub") ? "block":"none";
	
	lab.style.display = (dom.value == "lab") ? "block":"none";
	
	lec.style.display = (dom.value == "lec") ? "block":"none";
	
	stu.style.display = (dom.value == "stu") ? "block":"none";
        
}