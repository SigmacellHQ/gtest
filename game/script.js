const canvas = document.getElementById('game');
const ctx = canvas.getContext('2d');

let game = {
    playing: false,
    dead: false
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
player.image.src = 'https://media.discordapp.net/attachments/1124689325330792550/1178372779020664952/image.png?ex=6575e82b&is=6563732b&hm=41b889f40a98c245eb8b988fb49a1ffacfd9fe9c628baf5669fa4762e017e9a7&=&format=webp';

let level = {
    speed: 2,
    objects: [
        { type: "block", x: 0, y: 0, width: 50, height: 50 },
        { type: "block", x: 0, y: 50, width: 50, height: 50 },
        { type: "block", x: 0, y: 100, width: 50, height: 50 },
        { type: "block", x: 0, y: 150, width: 50, height: 50 },
        { type: "block", x: 0, y: 200, width: 50, height: 50 },
        { type: "spike", x: 0, y: 250, width: 50, height: 50 }
    ]
};

function setCanvasSize() {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
}

setCanvasSize();

window.addEventListener('resize', setCanvasSize);

canvas.addEventListener('mousemove', (e) => {
    let y = e.clientY;
    if((y + 50) > window.innerHeight) {
        y = (window.innerHeight - 50);
    }
    player.y = y;
});

function setupAudio(audio) {
    const audioel = new Audio(audio);
    audioel.play();
}

function setupObjects(objects) {
    const allObjects = [
        "block",
        "spike"
    ];
    for (let object of objects) {
        if(!allObjects.includes(object.type)) object.type = "block";
        let img = new Image();
        if(object.type === "block") {
            img.src = "https://static.wikia.nocookie.net/geometry-dash/images/f/fe/Cube004.png/revision/latest?cb=20150220062322";
        } else if(object.type === "spike") {
            img.src = "https://c.tenor.com/TmvqZuZdfqQAAAAC/tenor.gif";
        }
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
        setupAudio("https://cdn.discordapp.com/attachments/1124689325330792550/1178095363903717437/Family_Guy-Iraq_Lobster.mp3?ex=6574e5ce&is=656270ce&hm=b775e6ee7c538c977e78a38e6dddfd507fa7e333a16e70886edc8168c0475ccf&");
        game.playing = true;
        update();
    }
}