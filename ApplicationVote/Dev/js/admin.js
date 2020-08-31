

function connectAdmin()  {
		
	$pseudo = $('#pseudo').val();
	$password = $('#password').val();
	
	if($pseudo == '' || $password == ''){
		M.toast({
			html: 'Identifiant ou mot de passe manquant.'
			
		});
	}
	
	else{
	    $.ajax({
	        url : '../controller/connexionAdmin.php', // La ressource ciblée
	        type: 'POST',
	        data : 'pseudo=' + $pseudo + '&password=' + $password,
	        dataType : 'html',
	        success : function(data){ // code_html contient le HTML renvoyé
	            if(data == "connected"){
	            	window.location.href = "index.php";
	            }
	            else {
	        		M.toast({
	        			html: 'Identifiant ou mot de passe erroné.',
	        			classes : 'red'
	        			
	        		});
	            }
	        },
	        error : function(resultat, statut, erreur){
	        	console.log("error");
	        },
	        complete : function(resultat, statut){
	        	console.log("complete");
	        }
	     });
	}
}

function disconnectAdmin(){
	 $.ajax({
	        url : '../controller/deconnexionAdmin.php', // La ressource ciblée
	        type: 'POST',
	        dataType : 'html',
	        success : function(data){ // code_html contient le HTML renvoyé
	           location.reload();
	        }
	     });
	
}

function moveCreateSondage(){
	window.location.href = "creationSondage.php";
}

function moveModifySondage(){
	window.location.href = "modificationSondage.php";
}

function moveHistoricSondage(){
	window.location.href = "historiqueSondage.php";
}

function retourIndex(){
	window.location.href = "index.php";
}

function addOption(){
	window.nbOption = window.nbOption + 1;
	$id = window.nbOption;
	$html = "<div class='row'> <div class='input-field col s6'> <input placeholder='Option' type='text' class='validate option'></div><div class='input-field col s1'> <i class='fas fa-times fa-3x removeOption' style='color: #F44336; cursor : pointer;'></i></div></div>";
	$("#optionForm").append($html);
}



function createSondage(){
	
	$('.creerSondage').addClass("disabled");
	
	$nom = $('#nom').val();
	$options = [];
	$nbOption = 0;
	
	$(".option").each(function() {
			$options[$nbOption] = $(this).val();
			$nbOption = $nbOption +1;

	});
	console.log($options);
	$dataString = $options;
	$jsonString = JSON.stringify($dataString);
	 $.ajax({
	        url : '../controller/createSondage.php', // La ressource ciblée
	        type: 'POST',
	        data : 'nom=' + $nom + '&options=' + $jsonString,
	        dataType : 'html',
	        success : function(data){
	        	//console.log(data);
	    		M.toast({
	    			html: 'Sondage crée ! Redirection dans 3 secondes...',
	    			displayLength: 3000
	    		});
	    		window.setTimeout(function(){
	    			window.location.href = "modificationSondage.php";

	    	    }, 3000);

	        },
	     });
	
}

function resultats(sondageId){
	window.sondageId = sondageId;
	var now = new Date();
	var time = now.getTime();
	time += 3600 * 2000;
	now.setTime(time);
	document.cookie = "sondage=" + sondageId + "; expires= " + now.toUTCString() + ";";
	window.location.href = "resultat.php";
}

function endSondage(){
	 $.ajax({
	        url : '../controller/terminerSondage.php', // La ressource ciblée
	        type: 'POST',
	        data : 'sondageId=' + window.sondageId,
	        dataType : 'html',
	        success : function(data){
	    		M.toast({
	    			html: 'Sondage terminé ! Redirection dans 3 secondes...',
	    			displayLength: 3000
	    		});
	    		window.setTimeout(function(){
	    			window.location.href = "index.php";

	    	    }, 3000);

	        }
	     });
}





