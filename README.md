## SSO SERVER
Iseng aja buat sso server pake laravel kwkw
ini adalah projek coba coba kode dalam projek ini bener2 acak acakan dan mungkin kurang rapih. Dan protokol oauth2 nya juga belum 100% Sesuai dengan standard  [Oauth2](https://www.rfc-editor.org/rfc/rfc6749.txt)
Ya intinya belajar wkwkw

    Untuk autorize user dan mendapakan authorization code
    [GET] http://localhost:8000/sso/authorize
    parameter:{
	    client_id : String,
	    redirect_uri : String,
	    state : String(Optional)
	}
	contoh: http://localhost:8000/sso/authorize?state=<?=$state?>&client_id=5070e0ff84606f408d33b56facf1a104&redirect_uri=http://localhost/callback.php
	Dari server nanti akan mengirimkan kode & state(Jika request nya pake state) 

yahh kurleb gitu lah
	

