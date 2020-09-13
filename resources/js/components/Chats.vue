<template>
<div class="product-page">
    <div class="container">
        <div class="main main-raised main-product" style="margin: -10vh 0px 0px;">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                	<div class="card">
	                <div class="card-body">
	                	<div class="media">
	                		<ul class="list-unstyled" style="height:400px; overflow-y:scroll;" v-chat-scroll>
			                    <li v-for="(message, index) in messages" :key="index">
			                    <a class="pull-left" href="">
		                            <div class="avatar" >
		                                <img class="media-object" alt="64x64" :src="getFoto(message.user.foto)">
		                            </div>
			                    </a>
		                        <div class="">
		                         	<h4 class="media-heading">{{ message.user.fullname }} <small>&middot; {{ message.created_at | myDate }}</small></h4>

		                         	<p>{{message.message}}</p>
		                      	</div>
		                      	</li>
		                    </ul>
	                    </div>
	                    <div class="media media-post">
                            <a class="pull-left author" href="#">
                                <div class="avatar" style="border-radius:inherit !important; box-shadow:inherit !important;">
                                    <img class="media-object" alt="64x64" src="/img/chat/email.svg">
                                </div>
                            </a>
                            <hr class="hrcardpe" />
                            <div class="media-body" style="width: 1000px !important;">
                                <input
                                @keydown="sendTypingEvent"
                                @keyup.enter="sendMessage"
                                v-model="newMessage"
                                type="text" name="message" class="form-control" placeholder="Escriba su mensaje...." >
                                <span class="text-muted" v-if="activeUser" >
                                	<a class="pull-left author" href="#">
		                                <div class="avatar" style="border-radius:inherit !important; box-shadow:inherit !important;">
		                                    <img class="media-object" alt="64x64" src="/img/chat/messenger1.svg">
		                                </div>
		                            </a>
		                            {{ activeUser }} está escribiendo...
                                </span>
                            </div>
                        </div>
	                </div>
	            	</div>
                </div>
                <div class="col-md-4 col-sm-4">
                	<div class="card">
                		<div class="card-body">
	                		<div class="title text-center">Usuarios activos</div>
	                		<hr>
	                		<ul class="list-unstyled">
	                			<li v-for="(user, index) in users" :key="index">
			                        <div class="author">
			                        	<span style="color:green; font-size: 50px;"><b>.</b></span>
			                            <a href="#">
			                               <img :src="getFoto(user.foto)" alt="..." class="avatar img-raised">
			                               <span>{{ user.fullname }}</span>
			                            </a>
			                        </div>
			                        <hr/>
			                    </li>
			                </ul>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
	export default {
		data() {
			return {
				messages: [],
				newMessage: '',
				user:'',
				users: [],
				activeUser: false,
				typingTimer: false
			}
		},
		created(){
			this.fetchMessages();
        	Fire.$on('AfterCreate',() => {
                this.fetchMessages();
            });

			//this.fetchMessages();

			Echo.join('chat')
				.here(user =>{
					//console.log('Aqui');
					//console.log(user);
					this.users = user;
				})
				.joining(user =>{
					//console.log('union');
					//console.log(user);
					this.users.push(user);
				})
				.leaving(user =>{
					//console.log('Salio');
					//console.log(user);
					this.users = this.users.filter(u => u.id != user.id);
				})
				.listen('MessageSent',(event)=>{
					this.messages.push(event.message);
				})
				.listenForWhisper('typing', user => {
					//console.log('Escribiendo...');
					//console.log(user);
					this.activeUser = user;
					if(this.typingTimer){
						clearTimeout(this.typingTimer);
					}
					this.typingTimer = setTimeout(()=>{
						this.activeUser = false;
					}, 3000);
				})
		},
		methods: {
			getFoto(ufoto){
        		let foto = "img/profile/"+ufoto;
                return foto;
        	},
			fetchMessages(){

				axios.get('api/messageuser').then(response => {
					//console.log(response.data.data);
					this.user = response.data.data;
				})

				axios.get('api/messages').then(response => {
					this.messages = response.data;
				})
			},
			sendMessage()
			{
				this.messages.push({
					user: this.user.fullname,
					message: this.newMessage
				});
				axios.post('api/messages', {message: this.newMessage});
				this.newMessage = '';
				Fire.$emit('AfterCreate');
			},
			sendTypingEvent()
			{
				Echo.join('chat')
					.whisper('typing', this.user.fullname);
			}
		}
	};
</script>



