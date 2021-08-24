
var slideAnimation = [{ $Duration: 1200, x: 0.2, y: -0.1, $Delay: 20, $Cols: 8, $Rows: 4, $Clip: 15, $During: { $Left: [0.3, 0.7], $Top: [0.3, 0.7] }, $Formation: $JssorSlideshowFormations$.$FormationStraightStairs, $Assembly: 260, $Easing: { $Left: $Jease$.$InWave, $Top: $Jease$.$InWave, $Clip: $Jease$.$OutQuad }, $Round: { $Left: 1.3, $Top: 2.5 } },
    { $Duration: 600, x: 1, $Delay: 50, $Cols: 8, $Rows: 4, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad }, $Opacity: 2 },
    { $Duration: 600, x: -1, $Delay: 50, $Cols: 8, $Rows: 4, $SlideOut: true, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad }, $Opacity: 2 },
    { $Duration: 1200, y: 2, $Rows: 2, $Zoom: 11, $Assembly: 2049, $ChessMode: { $Row: 15 }, $Easing: { $Top: $Jease$.$InCubic, $Zoom: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad }, $Opacity: 2 },
    { $Duration: 1000, x: -0.2, $Delay: 40, $Cols: 12, $SlideOut: true, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 260, $Easing: { $Left: $Jease$.$InOutExpo, $Opacity: $Jease$.$InOutQuad }, $Opacity: 2, $Outside: true, $Round: { $Top: 0.5 } },
    { $Duration: 800, y: 1, $Delay: 80, $Cols: 12, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 513, $Easing: { $Top: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad }, $Opacity: 2 },
    { $Duration: 800, x: 1, $Delay: 80, $Rows: 8, $Formation: $JssorSlideshowFormations$.$FormationStraight, $Assembly: 513, $Easing: { $Left: $Jease$.$InCubic, $Opacity: $Jease$.$OutQuad }, $Opacity: 2 },
    { $Duration: 1200, $Opacity: 2 }];
//Swing Inside in Stairs,Fly Right Random,Float Right Random,Zoom VDouble+ in ,Extrude out Stripe,Vertical Fly Stripe,Horizontal Fly Stripe

function GetSlideAnimation(animationMode,duration) {
    var animation = [];
    switch (animationMode) {
        case "4":
            animation[0] = slideAnimation[0];
            break;
        case "5":
            animation[0] = slideAnimation[1];
            break;
        case "6":
            animation[0] = slideAnimation[2];
            break;
        case "7":
            animation[0] = slideAnimation[3];
            break;
        case "8":
            animation[0] = slideAnimation[4];
            break;
        case "9":
            animation[0] = slideAnimation[5];
            break;
        case "10":
            animation[0] = slideAnimation[6];
            break;
        case "3":
            animation[0] = slideAnimation[7];
            break;
    }
    if(animation.length !=0){
        animation[0].$Duration = parseInt(duration);
    }
    return animation;
}
