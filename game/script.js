const canvas = document.getElementById("game");
const ctx = canvas.getContext("2d");

let game = {
    playing: false,
    dead: false,
    song: null
};
let player = {
    x: 250,
    y: 175,
    width: 50,
    height: 50,
    jumping: false,
    dead: false,
    image: new Image()
};
player.image.src = "https://media.discordapp.net/attachments/1218640497543872694/1226230043156549732/niceyomi.png?ex=662402b8&is=66118db8&hm=664be376823bcf6dba4c36ae883911b864dbde22fd0b357a97bcd35bb7d97202&=&format=webp&quality=lossless";

let level = {
    speed: 2,
    objects: [
        { type: "block", x: 0, y: 0, width: 50, height: 50 },
        { type: "block", x: 0, y: 50, width: 50, height: 50 },
        { type: "block", x: 0, y: 100, width: 50, height: 50 },
        { type: "block", x: 0, y: 150, width: 50, height: 50 },
        { type: "block", x: 0, y: 200, width: 50, height: 50 },
        { type: "spike", x: 0, y: 250, width: 50, height: 50 }
    ],
    songURL: ""
};

function setCanvasSize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

setCanvasSize();

window.addEventListener("resize", setCanvasSize);

canvas.addEventListener("mousemove", (e) => {
    let y = e.clientY;
    if((y + 50) > window.innerHeight) {
        y = (window.innerHeight - 50);
    }
    player.y = y;
});

function startGameSong() {
    try{ game.song.pause(); } catch {}
    game.song = new Audio("https://cdn.discordapp.com/attachments/1218640497543872694/1226230497563246723/Family_Guy_-_Iraq_Lobster.mp3?ex=66240324&is=66118e24&hm=152139c03fb5c389048f5e23859541400d28b9267f78a1b173ef95d778cdaa06&");
    game.song.play();
}

function stopGameSong() {
    try{ game.song.pause(); } catch {}
    game.song = null;
}

function pauseGameSong() {
    try{ game.song.pause(); } catch {}
}

function unpauseGameSong() {
    try{ game.song.unpause(); } catch {}
}

function playAudio(url) {
    new Audio(url).play();
}

function setupObjects(objects) {
    const allObjects = [
        "block",
        "spike"
    ];
    for (let object of objects) {
        if(!allObjects.includes(object.type)) object.type = "block";
        let img = new Image();
        if(object.type === "block") img.src = "https://static.wikia.nocookie.net/geometry-dash/images/f/fe/Cube004.png/revision/latest?cb=20150220062322";
        else if(object.type === "spike") img.src = "https://c.tenor.com/TmvqZuZdfqQAAAAC/tenor.gif";
        ctx.drawImage(img, (object.x + 300), object.y, object.width, object.height);
    }
}

function drawPlayer(plr) {
    ctx.drawImage(plr.image, plr.x, plr.y, plr.width, plr.height);
}

function update() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    drawPlayer(player);

    setupObjects(level.objects);

    requestAnimationFrame(update);
}

function setupGame() {
    if (!game.playing) {
        startGameSong();
        game.playing = true;
        update();
    }
}
