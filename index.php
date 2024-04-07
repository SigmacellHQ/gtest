<?php
http_response_code(200);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GTest</title>
    <link rel="icon" type="image/png" href="./images/logo_small.png">
    <meta property="og:title" content="GTest">
    <meta property="og:type" content="website">
    <meta property="og:description" content="A Geometry Dash clone">
    <meta property="og:url" content="https://gt.boomlings.xyz">
    <meta property="og:image" content="https://gt.boomlings.xyz/images/logo_small.png">
    <meta property="og:site_name" content="a nolanwhy production">
    <meta property="og:locale" content="en_US">
    <!-- <meta name="twitter:card" content="summary_large_image"> -->
    <meta name="application-name" content="GTest" />
    <meta name="apple-mobile-web-app-title" content="GTest" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <link rel="apple-touch-icon" href="/images/logo_small.png" />
    <style>
    *{
        font-family: "Pusab", Arial;
        font-weight: normal;
        -webkit-text-stroke-color: black;
        -webkit-text-stroke-width: 2.1px;
        text-shadow: 3px 3px 0px rgba(0, 0, 0, 0.3);
        color: white;
    }
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        height: 100vh;
        overflow: hidden;
        background-image: linear-gradient(#0065FD, #002E73);
    }
    .background{
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -9999999;
        filter: sepia(50%) hue-rotate(187deg) saturate(200%) blur(15px) blur(15px);
        transform: scale(1.5);
    }
    button:active{
        animation: bounceButton 0.25s ease-in-out forwards;
    }
    button:not(:active){
        animation: unbounceButton 0.25s ease-in-out forwards;
    }
    .socialBtn{
        width: 55px;
        height: 55px;
        background: transparent;
        border: none;
        cursor: pointer;
        background-size: cover;
        background-position: center;
    }
    .menuBottomBtn{
        width: 114px;
        height: 118px;
        background: transparent;
        border: none;
        cursor: pointer;
        background-size: cover;
        background-position: center;
    }
    @keyframes bounceButton{
        0%{
            transform: scale(1);
        }
        50%{
            transform: scale(1.2);
        }
        75%{
            transform: scale(1.17);
        }
        100%{
            transform: scale(1.2);
        }
    }
    @keyframes unbounceButton{
        0%{
            transform: scale(1.2);
        }
        50%{
            transform: scale(1);
        }
        75%{
            transform: scale(1.07);
        }
        100%{
            transform: scale(1);
        }
    }
    @keyframes introFadeOut{
        0%{
            width: 100%;
            height: 100%;
            opacity: 1;
            user-select: auto;
            pointer-events: auto;
        }
        100%{
            user-select: none;
            pointer-events: none;
            width: 0%;
            height: 0%;
            opacity: 0;
        }
    }
    .introFadeOut{
        animation: introFadeOut 0.2s forwards;
    }
    @keyframes introFadeIn{
        0%{
            width: 0%;
            height: 0%;
            opacity: 0;
        }
        100%{
            user-select: none;
            pointer-events: none;
            user-select: auto;
            pointer-events: auto;
            width: 100%;
            height: 100%;
            opacity: 1;
        }
    }
    .introFadeIn{
        animation: introFadeIn 0.2s forwards;
    }
    @keyframes spin{
        0%{
            transform: rotate(0deg);
        }
        100%{
            transform: rotate(360deg);
        }
    }
    .spinAnimation{
        animation: spin 0.7s infinite linear;
    }
    .page{
        position: fixed;
        width: 100%;
        height: 100%;
        background: linear-gradient(#0065fd, #002e73);
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .backBtn{
        width: 77px;
        height: 77px;
        background: transparent;
        border: none;
        cursor: pointer;
        background-size: cover;
        background-position: center;
    }
    </style>
</head>
<body>
    <center id="loadingGame" style="position: fixed;background-color: black;color: white;width: 100%;height: 100%;left: 0;top: 0;font-size: 50px;z-index: 1000000000;align-items: center;">
        <img src="./images/logo.png" alt="GTest"><br><img src="./images/loading.png" class="spinAnimation" style="width: 120px;height: 120px;" alt="Loading"><br>
        <p style="margin: 0;">Waiting for preloads</p>
    </center>
    <video class="background" autoplay muted loop></video>
    <button style="position: fixed;background-color: black;color: white;width: 100%;height: 100%;left: 0;top: 0;font-size: 50px;z-index: 999999999;opacity: 1;border: none;" onclick='this.remove();setTimeout(() => beginLoad(), 200);'>Launch GTest</button>
    <video class="nolanwhyIntro" style="position: fixed;z-index: 99999999;width: 100%;height: 100%;"></video>
    <div class="nolanwhyIntroBg" style="position: fixed;width: 100%;height: 100%;background-color: black;z-index: 99999998;"></div>
    <!-- Top -->
    <div id="logo" style="position: fixed;top: 0;height: 179px;">
        <img alt="GTest">
        <h1 style="color: white;margin-top: -40px;margin-left: 141px;user-select: none;">pre-v0.3.0 (alpha)</h1>
    </div>
    <!-- Center -->
    <!-- <h1 style="color: white;">More will come in later versions!</h1> -->
    <button class="mainBtn characterEditorBtn" onclick="openPage('characterEditor');"></button>
    <button style="margin-left: 50px;" class="mainBtn mainLevelsBtn" onclick="openPage('mainLevels');"></button>
    <button style="margin-left: 50px;" class="mainBtn onlineLevelsBtn" onclick="openPage('onlineLevels');"></button>
    <!-- Bottom -->
    <div style="position: fixed;bottom: 20px;left: 20px;">
        <div style="display: flex;">
            <!--
                removed cuz useless
                <button class="socialBtn socialBtn-facebook" onclick="alert('We don\'t have Facebook.');"></button>
            -->
            <button class="socialBtn socialBtn-github" onclick="window.open('https://github.com/nolanwhy/gtest', '_blank');"></button>
            <button style="margin-left: 6px;" class="socialBtn socialBtn-twitter" onclick="window.open('https://twitter.com/_nolanwhy', '_blank');"></button>
            <button style="margin-left: 6px;" class="socialBtn socialBtn-youtube" onclick="window.open('https://youtube.com/@nolanwhy', '_blank');"></button>
            <button style="margin-left: 6px;" class="socialBtn socialBtn-twitch" onclick="window.open('https://twitch.tv/nolanwhyherefornoobs', '_blank');"></button>
            <button style="margin-left: 6px;" class="socialBtn socialBtn-discord" onclick="window.open('https://discord.gg/7h2k2DGFcF', '_blank');"></button>
        </div>
        <div style="display: flex;">
            <button style="display: block;" class="socialBtn socialBtn-nolanwhy" onclick="window.open('https://boomlings.xyz', '_blank');"></button>
            <button style="margin-left: 5px;" class="socialBtn socialBtn-untitled" onclick="window.open('https://untitled.boomlings.xyz/user/2', '_blank');"></button>
        </div>
    </div>
    <div style="position: fixed;bottom: 25px;display: flex;">
        <button class="menuBottomBtn menuBottomBtn-achievements" onclick="openPage('achievements');"></button>
        <button style="margin-left: 13px;" class="menuBottomBtn menuBottomBtn-settings" onclick="openPage('settings');"></button>
        <button style="margin-left: 13px;" class="menuBottomBtn menuBottomBtn-stats" onclick="openPage('gameStats');"></button>
        <button style="margin-left: 13px;" class="menuBottomBtn menuBottomBtn-plugins" onclick="openPage('plugins');"></button>
    </div>
    <button style="position: fixed;bottom: 20px;right: 20px;" class="moreGamesBtn" onclick="openPage('moreGames');"></button>
    <div class="page mainLevels">
        <button class="backBtn backBtn-green" style="position: absolute;top: 15px;left: 15px;" onclick="goToMenu();"></button>
        <h1 style="position: absolute;top: 0;">Main Levels</h1>
        <p style="font-size: 40px;">This page is not done, but it will come soon!</p>
    </div>
    <div class="page plugins">
        <button class="backBtn backBtn-pink" style="position: absolute;top: 15px;left: 15px;" onclick="goToMenu();"></button>
        <h1 style="position: absolute;top: 0;">Plugins</h1>
        <p style="font-size: 40px;">This page is not done, but it will come soon!</p>
    </div>
    <div class="page http404" style="background: linear-gradient(#fd1500, #730a00);">
        <button class="backBtn backBtn-green" style="position: absolute;top: 15px;left: 15px;" onclick="goToMenu();"></button>
        <h1 style="position: absolute;top: 0;">404 Not Found</h1>
        <p style="font-size: 40px;">The page you were trying to access was not found.</p>
    </div>
    <script>
        let preloadedAssets = {};

        function random_int(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function modifyURL(url) {
            window.history.replaceState({}, url, url);
        }

        function getURL() {
            return window.location.pathname;
        }

        async function beginLoad() {
            document.querySelector(".nolanwhyIntro").play();
            document.querySelector(".nolanwhyIntro").addEventListener("ended", () => {
                document.querySelector(".nolanwhyIntro").remove();
                document.querySelector(".nolanwhyIntroBg").classList.add("introFadeOut");
                document.querySelector(".nolanwhyIntroBg").addEventListener("animationend", () => {
                    document.querySelector(".nolanwhyIntroBg").remove();
                    menuLoop();
                });
            });
        }

        function loadGame() {
            document.querySelector("#loadingGame").remove();
        }

        async function menuLoop() {
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const analyser = audioContext.createAnalyser();
            const source = audioContext.createMediaElementSource(audio);
            source.connect(analyser);
            analyser.connect(audioContext.destination);
            analyser.fftSize = 256;
            const bufferLength = analyser.frequencyBinCount;
            const dataArray = new Uint8Array(bufferLength);

            audio.pause();
            let playSound = new Audio(await preloadAssetSync("./sounds/menu.mp3"));
            playSound.play();
            setTimeout(() => {
                audio.currentTime = 0;
                audio.play();
            }, 100);

            setInterval(() => {
                analyser.getByteFrequencyData(dataArray);
                
                const average = dataArray.reduce((acc, val) => acc + val, 0) / bufferLength;
                scale = 1.0 + average / 500;
                document.querySelector("#logo").style.transform = "scale(" + scale + ")";
            }, 1);
        }

        async function preloadAsset(url, callback) {
            if(preloadedAssets[url]) return callback(url);
            console.log("Preloading asset \"" + url + "\"...");
            const res = await fetch(url);
            let blobURL = URL.createObjectURL(await res.blob());
            preloadedAssets[url] = blobURL;
            console.log("Finished preloading asset \"" + url + "\".");
            return callback(blobURL);
        }

        async function preloadAssetSync(url) {
            if(preloadedAssets[url]) return preloadedAssets[url];
            console.log("Preloading asset \"" + url + "\"...");
            const res = await fetch(url);
            let blobURL = URL.createObjectURL(await res.blob());
            preloadedAssets[url] = blobURL;
            console.log("Finished preloading asset \"" + url + "\".");
            return blobURL;
        }

        let assetsPreloaded = 0;
        let allAssetsToPreload = 25;
        async function preloadAssetSyncToGameLoad(url) {
            let asset = await preloadAssetSync(url);
            assetsPreloaded++;
            if(assetsPreloaded < allAssetsToPreload) document.querySelector("#loadingGame p").innerText = assetsPreloaded + "/" + allAssetsToPreload + " preloaded assets";
            else document.querySelector("#loadingGame p").innerText = "Finished preloading " + assetsPreloaded + " assets";
            return asset;
        }

        let audio;

        // "./sounds/DJRubRub.mp3"
        preloadAsset("./sounds/menuLoop.mp3", (blobURL) => {
            audio = new Audio(blobURL);
            audio.loop = true;
            audio.preservesPitch = false;
            audio.playbackRate = 0.7; // 1.1, for the DJRubRub.mp3 sound, real!
            // TODO: update the file itself, bugs on mobile (both iOS and Android, probably shit browsers)
        });

        async function loadCSS() {
            const style = document.createElement("style");
            style.innerHTML = `@font-face {
    font-family: Pusab;
    src: url('${await preloadAssetSync("./fonts/Pusab.ttf")}');
}
.socialBtn-nolanwhy{
    width: 238px;
    height: 50px;
    background-image: url("${await preloadAssetSyncToGameLoad("./images/nolanwhy.png?" + random_int(1, 2147483647))}");
}
.socialBtn-facebook{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/facebook.png?" + random_int(1, 2147483647))}");
}
.socialBtn-twitter{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/twitter.png?" + random_int(1, 2147483647))}");
}
.socialBtn-youtube{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/youtube.png?" + random_int(1, 2147483647))}");
}
.socialBtn-twitch{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/twitch.png?" + random_int(1, 2147483647))}");
}
.socialBtn-discord{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/discord.png?" + random_int(1, 2147483647))}");
}
.socialBtn-reddit{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/reddit.png?" + random_int(1, 2147483647))}");
}
.socialBtn-untitled{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/untitled.png?" + random_int(1, 2147483647))}");
}
.socialBtn-github{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/github.png?" + random_int(1, 2147483647))}");
}
.menuBottomBtn-achievements{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/achievements.png?" + random_int(1, 2147483647))}");
}
.menuBottomBtn-settings{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/settings.png?" + random_int(1, 2147483647))}");
}
.menuBottomBtn-stats{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/stats.png?" + random_int(1, 2147483647))}");
}
.menuBottomBtn-plugins{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/plugins.png?" + random_int(1, 2147483647))}");
}
.moreGamesBtn{
    width: 172px;
    height: 140px;
    background: transparent;
    border: none;
    cursor: pointer;
    background-size: cover;
    background-position: center;
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/moregames.png?" + random_int(1, 2147483647))}");
}
.backBtn-blue{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/blue_back.png?" + random_int(1, 2147483647))}");
}
.backBtn-green{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/green_back.png?" + random_int(1, 2147483647))}");
}
.backBtn-pink{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/pink_back.png?" + random_int(1, 2147483647))}");
}
.mainBtn{
    width: 170px;
    height: 170px;
    background: transparent;
    border: none;
    cursor: pointer;
    background-size: cover;
    background-position: center;
}
.characterEditorBtn{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/characterEditor.png?" + random_int(1, 2147483647))}");
}
.mainLevelsBtn{
    width: 230px;
    height: 230px;
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/mainLevels.png?" + random_int(1, 2147483647))}");
}
.onlineLevelsBtn{
    background-image: url("${await preloadAssetSyncToGameLoad("./images/buttons/onlineLevels.png?" + random_int(1, 2147483647))}");
}`;
            document.head.appendChild(style);
        }

        function openPage(page, closeAllOtherPages = true) {
            if(page === "plugins") {
                if(closeAllOtherPages) goToMenu();
                modifyURL("/plugins");
                document.querySelector(".page.plugins").classList.add("introFadeIn");
                document.querySelector(".page.plugins").classList.remove("introFadeOut");
            } else if(page === "mainLevels") {
                if(closeAllOtherPages) goToMenu();
                modifyURL("/mainLevels");
                document.querySelector(".page.mainLevels").classList.add("introFadeIn");
                document.querySelector(".page.mainLevels").classList.remove("introFadeOut");
            } else if(page === "http404") {
                let oldURL = getURL();
                if(closeAllOtherPages) goToMenu();
                modifyURL(oldURL);
                document.querySelector(".page.http404").classList.add("introFadeIn");
                document.querySelector(".page.http404").classList.remove("introFadeOut");
            } else {
                openPage("http404", closeAllOtherPages);
            }
        }

        function goToMenu() {
            modifyURL("/");
            document.querySelectorAll(".page").forEach((page) => {page.classList.remove("introFadeIn");page.classList.add("introFadeOut");});
        }

        document.querySelectorAll(".page").forEach((page) => {page.classList.remove("introFadeIn");page.classList.add("introFadeOut");});

        if(getURL() === "/") console.log("No page requested.");
        else if(getURL() === "/mainLevels") openPage("mainLevels");
        else if(getURL() === "/plugins") openPage("plugins");
        else openPage("http404");
    </script>
    <script type="module">
    await loadCSS();
    document.querySelector(".background").src = await preloadAssetSyncToGameLoad("./videos/menubg.mp4");
    document.querySelector("#logo img").src = await preloadAssetSyncToGameLoad("./images/logo.png");
    document.querySelector(".nolanwhyIntro").src = await preloadAssetSyncToGameLoad("./videos/nolanwhyIntro.mp4");
    await preloadAssetSyncToGameLoad("./sounds/menu.mp3");
    await preloadAssetSyncToGameLoad("./sounds/DJRubRub.mp3");
    loadGame();
    </script>
</body>
</html>
