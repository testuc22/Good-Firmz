<template>
	<div>
		<h1>{{ message }}</h1>
		<button v-on:click="btn_clicked"></button>
	</div>
</template>
<script>
	export default{
		data(){
			return{
				message:"Hii"
			}
		},
		methods:{
			btn_clicked(){
				this.message = "Button Clicked!!"
			}
		}
	};
</script>
<style type="text/css"></style>

