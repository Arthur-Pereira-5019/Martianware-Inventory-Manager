const sair = document.querySelector("#btnSair")

sair.addEventListener("click", function() {
    requestBody = {
        "type": "logout"
    }
    fetch("http://localhost:80/server/controller.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(requestBody),
    }).then(res => {
        return res.json();
    }).then(
        data => {
            if(data.status == 7) {
                alert(data.message)
                window.location.pathname = ""
            }
        }
    )
})