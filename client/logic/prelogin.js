requestBody = {
    "type": "testar"
}
fetch("http://localhost:80/server/controller.php", {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(requestBody),
}).then(res => {
    return res.json()
}).then(data => {
    if (data.status == 5) {
        alert(data.message)
        if(!window.location.pathname == "/client/produtos.html") {
            window.location.pathname = "client/produtos.html"
        }
    } else if(window.location.pathname == "/client/produtos.html") {
        alert("Faça login primeiro!")
        window.location.pathname = "client"
    }
})