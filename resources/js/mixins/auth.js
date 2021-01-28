let user = document.head.querySelector('meta[name="user"]');
	//console.log(JSON.parse(user.content).fullname);
module.exports = {
	computed: {
		isAuth(){//Si el usuario esta authenticado
			return !! user.content; //Devuelve boolean si el usuario esta logueado o no
		},
		currentUser(){//llamo al usuario
			if(this.isAuth){
				return JSON.parse(user.content);
			}else{
				return 'INGRESA';
			}
		},
		isAdmin(){
			if(this.isAuth){
				if(JSON.parse(user.content).tipo === 'Super-Admin' || JSON.parse(user.content).tipo === 'Administrador' || JSON.parse(user.content).tipo === 'Vendedora')
				{
					return !! user.content;
				}
			}
		},
		isCliente(){
			if(this.isAuth){
				if(JSON.parse(user.content).tipo === 'Cliente'){
					return !! user.content;
				}
			}
		},
		isDelivery(){
			if(this.isAuth){
				if(JSON.parse(user.content).tipo === 'Delivery'){
					return !! user.content;
				}
			}
		},
		guest(){
			return ! this.isAuth
		}
	}
};

