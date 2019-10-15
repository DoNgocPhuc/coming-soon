"use strict";
let iTime;
iTime = iDays * 24 * 60 * 60 + iHours * 60 * 60 + iMinutes * 60 + iSeconds * 1;
//Update the count down every 1 second
let fCountdownfunction = setInterval(function () {
    let iDays,iHours,iMinutes,iSeconds;
    iTime = iTime - 1;
    iDays= Math.floor(iTime / (60 * 60 * 24));
    iHours = Math.floor((iTime % (60 * 60 * 24)) / (60 * 60));
    iMinutes = Math.floor((iTime % (60 * 60)) / (60));
    iSeconds = Math.floor((iTime % (60)));
    document.getElementById("comingsoon_day").innerHTML = iDays;
    document.getElementById("comingsoon_hour").innerHTML = iHours;
    document.getElementById("comingsoon_min").innerHTML = iMinutes;
    document.getElementById("comingsoon_sec").innerHTML = iSeconds;
    if (iTime < 0) {
        clearInterval(fCountdownfunction);
        document.getElementById("comingsoon_expired").innerHTML = "EXPIRED";
    }
}, 1000);

