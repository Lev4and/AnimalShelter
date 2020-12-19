function onClickExit() {
    const request = getXmlHttp();
    const url = "/Index.php";
    const params = "action=Выход";

    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.addEventListener("readystatechange", () => {
        if(request.readyState === 4 && request.status === 200){
            console.log(request.responseText)}
    });
    request.send(params);

    window.location = "";
}

function onClickSelectPet(button, userId, petId) {
    const request = getXmlHttp();
    const url = "/Index.php";
    const params = "action=Выбрать питомца&userId=" + userId + "&petId=" + petId;

    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.addEventListener("readystatechange", () => {
        if(request.readyState === 4 && request.status === 200){
            button.setAttribute("disabled", "disabled");

            alert("Поздравляю вас!");

            console.log(request.responseText);
        }
    });
    request.send(params);
}
