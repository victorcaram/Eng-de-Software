<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Simple API for Eagle's game </title>
<script type="text/javascript" src="jquery-3.3.1.js"></script>
</head>

<body>

<form>
	<span> Digite o enunciado: </span>
	<textarea type="text" id="enunciado" rows="6" cols="100"/> </textarea><br/> 
	<span> Alternativa a: </span>
	<textarea type="text" id="letraA" rows="6" cols="100"/> </textarea><br/> 
	<span> Alternativa b: </span>
	<textarea type="text" id="letraB" rows="6" cols="100"/> </textarea><br/> 
	<span> Alternativa c: </span>
	<textarea type="text" id="letraC" rows="6" cols="100"/> </textarea><br/> 
	<span> Dica (link, video ou coisa parecida): </span>
	<textarea type="text" id="dica" rows="6" cols="100"/> </textarea><br/> 
	<span> A resposta é A B ou C??: </span>
	<select id="resposta">
	  <option value="a">A</option>
	  <option value="b">B</option>
	  <option value="c">C</option>
	</select> <br/>
	<span> Nivel? <br/> 1 = Facil, 2 = Medio, 3 = Dificil: </span>	
	<select id="dificuldade">
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	</select> <br/>
	<input type="button" value="Enviar" onclick="post();"/> <br /> 
	<input type="button" value="Pegar todas as questoes" onclick="get();"/> <br /> 
</form>

<div id="result"> </div>

<script type="text/javascript">

	function post(){
		let funcao = "";
		let enunciado = $("#enunciado").val();
		let a = $("#letraA").val();
		let b = $("#letraB").val();
		let c = $("#letraC").val();
		let dica = $("#dica").val();
		let resposta = $("#resposta").val();
		let dificuldade = $("#dificuldade").val();
		funcao = "post";
		$.post("validate.php", {
			funcao: funcao,
			enunciado: enunciado,
			a: a,
			b: b,
			c: c,
			dica: dica,
			resposta: resposta,
			dificuldade: dificuldade
		 }, function(data){
		 	if(data){
		 		$("#result").html("Adicionado com sucesso");
		 		console.log(data);
		 	}
		 	else{
		 		$("#result").html("Nao foi possivel adicionar");
		 	}
		 });
	}

	function get(){
		let funcao = "get";
		$.post("validate.php", {
			funcao: funcao,
		 }, function(data){
		 	if(data){
		 		$("#result").html(data);
		 		console.log(data);
		 	}
		 	else{
		 		$("#result").html("Nao foi possivel pegar questoes");
		 	}
		 });
	}
</script>

</body>