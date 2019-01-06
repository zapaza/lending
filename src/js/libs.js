$(document).ready(function () {

    var scene = document.getElementById('scene');
    var parallaxInstance = new Parallax(scene, {
        relativeInput: true
    });
    
    var sceneTwo = document.getElementById('scene2');
    var parallaxInstanceTwo = new Parallax(sceneTwo, {
        relativeInput: true
    });

    // parallaxInstance.friction(0.2, 0.2);
});
