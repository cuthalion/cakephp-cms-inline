function Sair(){
		if(confirm('Deseja realmente sair da administração do seu site!')){
			$(window.document.location).attr("href",base_url+'/Users/Logout');
		};
	}