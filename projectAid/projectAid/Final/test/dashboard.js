// Add active class to the current button (highlight it)
var header = document.getElementById("myDIV");
var btns = header.getElementsByClassName("slideSelect");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        // console.log("current before is :", current[0]);
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
        console.log(this.id);
        divFunc(this.id);
        // var test = document.getElementById(this.id).textContent;
        // console.log("Current after is : ", current[0]);
        // console.log(test);
        // console.log(this.className);
        // console.log("id is :", this.id);
    });
}



// function divFunc(divId) {
//     var div = divId.concat("div");
//     var main = document.getElementById("contentDiv");
//     var innerArr = main.getElementsByTagName("div");
//     // console.log("forwareded value :", div);
//     for (var i = 0; i < innerArr.length; i++) {
//         console.log("array value :", innerArr[i]);

//         if (innerArr[i].id == div) {
//             // console.log("Matching pair is :", innerArr[i]);
//             // console.log("And :", div);
//             document.getElementById(innerArr[i].id).style.display = "block";
//             // var x = document.getElementById(div);
//             // x.style.display = "block";
//         } else {
//             document.getElementById(innerArr[i].id).style.display = "none";
//         }

//     }


// }



function divFunc(divId) {
    var divArray = ["Homediv", "Manage Patientdiv", "Manage Staffdiv", "Billingdiv", "Appointmentsdiv", "Inventorydiv", "Monthly Reportsdiv"];
    var div = divId.concat("div");
    document.getElementById(div).style.display = "block";
    for (var i = 0; i < divArray.length; i++) {
        if (divArray[i] != div) {
            document.getElementById(divArray[i]).style.display = "none";
        }

    }
}




// function divFunc(divId) {
//     const divArray = ["Homediv", "Manage Patientdiv", "Manage Staffdiv", "Billingdiv", "Appointmentsdiv", "Inventorydiv", "Monthly Reportsdiv"];
//     var div = divId.concat("div");

//     console.log("div is : ", div);

//     for (var i = 0; i < divArray.length; i++) {
//         if (divArray[i] == div) {
//             document.getElementById(divArray[i]).style.display = "block";
//             console.log("success :", div);
//         } else {
//             document.getElementById(div).style.display = "none";
//             console.log("fail");
//         }

//     }

// }



var closebtn = document.getElementById("closeBtn");
closebtn.addEventListener("click", function() {
    document.getElementById("sideNavbar").style.width = "0";
});


function windowManager(windowId) {
    var windows;

    windows = document.getElementsByClassName("addStaffWindow");
    for (var i = 0; i < windows.length; i++) {
        if (document.getElementById((windows[i].id) = windowId)) {
            document.getElementById(windowId).style.width = "80%";
        }
    }
}