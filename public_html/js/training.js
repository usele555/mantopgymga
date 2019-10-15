console.log("training");
let exp = document.getElementsByClassName('exp');
let anm = document.getElementsByClassName('anm');
let parent = document.getElementsByClassName('parent');

function pass(stat1, stat2, stat3) {
    for (var i = 0; i < exp.length; i += 1) {
        exp[i].style.display = stat1;
    }

    for (var i = 0; i < anm.length; i += 1) {
        anm[i].style.display = stat2;
    }
    
    for (var i = 0; i < parent.length; i += 1) {
        parent[i].style.display = stat3;
    }
}

pass('flex', 'none', 'none');
