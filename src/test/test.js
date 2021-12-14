var clock = document.createElement("div"),
    date = new Date();

function Clock() {
    clock.innerHTML = `- DIGITAL CLOCK - <br>${date.getHours()}:${date.getMinutes()}:${new Date().getSeconds()}`;
}
document.body.appendChild(clock);
setInterval(Clock, 1000);