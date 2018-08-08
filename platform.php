<h2>my platform</h2>

<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId            : '1963540527075698',
            autoLogAppEvents : true,
            xfbml            : true,
            version          : 'v3.1'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function subscribeApp(page_id, page_access_token) {
        console.log("suscrito a la app", page_id);
        FB.api('/'+page_id+"/subscribed_apps",
            'post',
            {access_token: page_access_token},
            function (response) {
            console.log("suscrito ok", response);
        })
    }

    function login() {
        FB.login(function(response) {
            console.log("logeado correctamente in ",response);
            FB.api('/me/accounts', function (response) {
                console.log("paginas recuperadas", response);
                var pages = response.data;
                var ul = document.getElementById('list');
                var len = pages.length;

                for (let i = 0; i < len; i++){
                    let page = pages[i];
                    let li = document.createElement('li');
                    var a = document.createElement('a');
                    a.href = "#";
                    a.onclick = subscribeApp.bind(this,page.id, page.access_token);
                    a.innerHTML = page.name;
                    li.appendChild(a);
                    //li.innerHTML = page.name;
                    ul.appendChild(li);
                }
            })
        },{scope: 'manage_pages'});
    }
</script>

<button onclick="login()">iniciar</button>

<ul id="list"></ul>

<?php

    $csv = file_get_contents('https://www.facebook.com/ads/lead_gen/export_csv/?id=441737826338956&type=form&source_type=graph_api');

$fp = fopen ('https://www.facebook.com/ads/lead_gen/export_csv/?id=441737826338956&type=form&source_type=graph_api', 'r');
$data = fgetcsv ($fp, 1000, "\040");



var_dump($data);