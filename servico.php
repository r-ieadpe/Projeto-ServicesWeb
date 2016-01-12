<?php
	
	$legiao = array();
	$array = array();
	$label = array();
	$tree = "[";
		
	session_start();

	$base_url = "core-services-webapp.herokuapp.com/";
	$tipos = array("Domain", "Model", "Topic", "Resource");

	function getArray($tipo,$id=0){
		global $base_url, $tipos;
		$url = $base_url;
		switch ($tipo) {
			case 0:
				$url .= $tipos[0];
				break;
			case 1:
				$url .= $tipos[0].'/'.$id;
				break;
			case 2:
				$url .= $tipos[1].'/'.$id.'/hierarchy';
				break;
			case 3:
				$url .= $tipos[2].'/'.$id.'/resources';
				break;
			default:
				$url .= $tipos[0];
				break;
		}
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		// serviço executado e seu resultado foi guardado na variável $curl_response
		$curl_response = curl_exec($curl);

		// decodifica a saída do serviço utilizando a função json_decode. 
		// O segundo parâmetro da função deve ser true para que a função retorne um array.
		$json = json_decode($curl_response, true);
		
		// Recuperando a tag "@Ontology#Domain" do resultado do serviço.
		// Isto retorna um vetor de Domínios.
		return $json["@Ontology#".$tipos[$tipo]];
	}

	function printFilhos($idPai){
		global $tree;
		$label = $_SESSION["label"];
		$legiao = $_SESSION["legiao"];

		
			$tree .= "{text: '$label[$idPai]', href: 'recurso.php?id=$idPai'";
		



		
		//echo "<a href=RecurseOfTopics.php/?id=" . $idPai . ">" . $idPai. " - " . $label[$idPai] . "</a><br>";
			
		//echo "<hr>";
		if(array_key_exists($idPai, $legiao)){
		$array = $legiao[$idPai];
		$tree .= ",nodes: [";
		
		foreach($array as $value){

			printFilhos($value);
			$tree .= ',';
		}

		$tree .= "]}";
		}else{
			$tree .= "}";
		}
		//echo "</blockquote>";
		
	}

?>