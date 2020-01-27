<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>




</body>
<script>
    const requestURL = 'https://jsonplaceholder.typicode.com/users';
    function sendRequest(method,url,body=null) {
        const headers={
            'Content-Type': 'application/json'
        };
        return fetch(url,{
            method:method,
            body:JSON.stringify(body),
            headers:headers
        }).then(response =>{
            return response.json();

        })
    }

    const body={
        name:'Vlad Kopinets',
        age:22
    };

    sendRequest('POST',requestURL,body)
        .then(data=>console.log(data))
        .catch(err=>console.log(err));







</script>
</html>

