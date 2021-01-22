function fetchWrapped(
    url,
    data,
    resultFunction = () => {
    },
    responseFunction = response => {
        return response.json()
    }
) {
    fetch(url, {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(response => {
        return responseFunction(response)
    }).then(jsonData => {
        resultFunction(jsonData);
    })
}