


    var xArray=[];
    var y1Array=[];
    var y2Array=[];
    var y3Array=[];





var layout = {
    showlegend: false
};

var config = {displaylogo: false, modeBarButtons: [[ "zoom2d", "zoomIn2d", "zoomOut2d", "pan2d","autoScale2d" ]] }
var started=false;

var show = {
    visible:true
};
var hide = {
    visible:"legendonly"
};



function showHide(){


    if(started !== false){
        var sin=(document.getElementById("sinus").checked);
        var cos=(document.getElementById("kosinus").checked);
        var toEdit=document.getElementById('graf');

        if(sin===true){
            Plotly.restyle(toEdit, show, 0);
        }
        else{
            Plotly.restyle(toEdit, hide, 0);
        }
        if(cos===true){
            Plotly.restyle(toEdit, show, 1);
        }
        else{
            Plotly.restyle(toEdit, hide, 1);
        }
    }
}
Plotly.plot('graf', [{
    y: [],
    name:'sin',

}, {
    y: [],
    name:'cos',

},{
        y: [],
        name:'cos+sin',

    }],layout, config);


var source = new EventSource("http://147.175.98.97/Z5/sse.php");
started=true;




function resize(){
    var toResize = document.getElementById('graf');
    var update = {
        width: toResize.clientWidth,
        height:toResize.clientHeight
    };

    Plotly.relayout(toResize, update);
}
















window.onload = (event) => {
    load();
    document.cookie = "y1=" + document.getElementById("sin2").checked;
    document.cookie = "y2=" + document.getElementById("cos2").checked;
    document.cookie = "y3=" + document.getElementById("sin_cos").checked;
};

document.getElementById("sin2").addEventListener("change", function () {
    document.cookie = "y1=" + this.checked;
    localStorage.setItem("sin2", this.checked);
    location.replace("http://147.175.98.97/Z5/")
})

document.getElementById("cos2").addEventListener("change", function () {
    document.cookie = "y2=" + this.checked;
    localStorage.setItem("cos2", this.checked);
    location.replace("http://147.175.98.97/Z5/")
})

document.getElementById("sin_cos").addEventListener("change", function () {
    document.cookie = "y3=" + this.checked;
    localStorage.setItem("sin_cos", this.checked);
    location.replace("http://147.175.98.97/Z5/")
})

source.addEventListener('message', (e) => {
    let data = JSON.parse(e.data);
    document.cookie = "lastID=" + e.lastEventId ;
    document.getElementById("result").innerHTML = "ID: " + e.lastEventId + "<br>";
    document.getElementById("result").innerHTML += "y1: " + data.sin2 + "<br>";
    document.getElementById("result").innerHTML += "y2: " + data.cos2 + "<br>";
    document.getElementById("result").innerHTML += "y3: " + data.sin_cos + "<br>";
    xArray.push(e.lastEventId);
    y1Array.push(data.sin2);
    y2Array.push(data.cos2);
    y3Array.push(data.sin_cos);

    Plotly.extendTraces('graf', {
        y: [[data.sin2], [data.cos2],[data.sin_cos]]
    }, [0,1, 2])
})
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function saveValueToCookie(){
        document.cookie = "coefficient=" + document.getElementById("coefficient").value;
        window.location.replace("https://wt127.fei.stuba.sk/ss3/");
    }

    function load(){
        document.getElementById("sin2").checked = JSON.parse(localStorage.getItem("sin2"));
        document.getElementById("cos2").checked = JSON.parse(localStorage.getItem("cos2"));
        document.getElementById("sin_cos").checked = JSON.parse(localStorage.getItem("sin_cos"));

        document.getElementById("coefficient").value = getCookie("coefficient");
    }




