//for the job openings search in admin
function admin_recruiter_search(str) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }  
    else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("jobs_search").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","http://localhost/git-repos/rm_dtu/admin/admin_main/search_recruiter/"+str,true);
    xmlhttp.send();
}


//for the students search
function admin_student_search(str) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }  
    else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("students_search").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","http://localhost/git-repos/rm_dtu/admin/admin_main/search_students/"+encodeURIComponent(str),true);
    xmlhttp.send();
}


//for the all applications search placements
function admin_all_applications_search(str) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    }  
    else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("applications_search").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("GET","http://localhost/git-repos/rm_dtu/admin/admin_main/all_applications_search/"+encodeURIComponent(str),true);
    xmlhttp.send();
}