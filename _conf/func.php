<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
$mysqli = new mysqli("localhost", "root", "", "db1");
if ($mysqli->connect_errno) {
    echo "Erro para conectar ao MySQL: " . $mysqli->connect_error;
    exit();
}
$mysqli->query("SET NAMES 'UTF8'");
class Eventos{
	public $title;
	public $login;
	public $logged;
	public $currentpage;
	//construtor da classe
	function __construct(){
		$this->initialize();
	}
	function initialize(){
		$this->logged = false;
		$this->login = false;
		$this->currentpage = "index";
		if(isset($_SESSION['user']) && isset($_SESSION['pw'])){
			$this->logged = true;
		}
		if ( isset($_GET['p']) && strcasecmp( $_GET['p'], 'admin' ) == 0 && $this->logged == false ){
			$this->title = "Login";
			$this->login = true;
			$this->currentpage = "login";
		}
		else if ( isset($_GET['p']) && strcasecmp( $_GET['p'], 'caduser' ) == 0 && $this->logged == true ){
			$this->title = "Cadastro de Usuário";
			$this->currentpage = "caduser";
		}
		else if ( isset($_GET['p']) && strcasecmp( $_GET['p'], 'cadev' ) == 0 && $this->logged == true ){
			$this->title = "Cadastro de Evento";
			$this->currentpage = "cadev";
		}else{
			$this->title = "Eventos";
			$this->currentpage = "index";
		}
	}
// Util...
	function ArrumarDesc($string){
		if (strlen($string) <=94) {
		  return $string;
		} else {
		  return substr($string, 0, 94) . '...';
		}	
	}
	
	function Alert($text){
		echo '<script type="text/javascript">alert("'.$text.'");</script>';
		return true;
	}
	
	function SafeString($string){
		return preg_replace("/[^a-zA-Z0-9áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ]+/i", "", $string);;
	}
	function SafeString2($string){
		return preg_replace("/[^a-zA-Z0-9áàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ \.\:\-\_]+/i", "", $string);;
	}
// Site ...
	function Login($user,$pw){
		if($user == "" || strlen($user) > 64 || $pw == "" || strlen($pw) > 64){
			return false;
		}
		$user_safe = $this->SafeString($user);
		$pw_safe = $this->SafeString($pw);
		global $mysqli;
		$queryLogin="SELECT user, pw FROM login WHERE user =  '$user_safe' AND pw = CAST( MD5( CONCAT(  '$pw_safe', salt ) ) AS CHAR CHARACTER SET latin1 )";
		$resultLogin = $mysqli->query($queryLogin);
		if($resultLogin && $resultLogin->num_rows == 1 )
		{
			$rowLogin = $resultLogin->fetch_assoc();
			$_SESSION['user'] = $rowLogin['user'];
			$_SESSION['pw'] = md5($rowLogin['pw']);
			return true;
		}else if(!$resultLogin){
			throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
		}
		return false;
	}
	function EnviarImg($file_up){
		$target_file = "_img/" . basename($file_up["name"]);
		$upOk = 1;
		$seguro = array('jpg', 'png', 'gif', 'jpeg');
		$filename = @end(explode('.', strtolower($file_up['name'])));
		if (!in_array($filename, $seguro)) {
			return false;
			//$EvObj->Alert("Bad extension");
		}
		if(!is_array(getimagesize($file_up["tmp_name"]))){
			return false;
		} 
		if (move_uploaded_file($file_up["tmp_name"], $target_file)) {
			//$EvObj->Alert("O arquivo ". basename( $file_up["name"]). "  foi enviado.");
			return true;
		} else {
			//$EvObj->Alert("Erro ao enviar o arquivo.");
			return false;
		}
	}
	
	function CadastroUser($user,$pw){
		if($user == "" || strlen($user) > 64 || $pw == "" || strlen($pw) > 64){
			return false;
		}
		$user_safe = $this->SafeString($user);
		$pw_safe = $this->SafeString($pw);
		global $mysqli;
		$salt = mt_rand(1,99999);
		$queryLogin="SELECT user FROM login WHERE user = '$user_safe'";
		$resultLogin = $mysqli->query($queryLogin);
		if($resultLogin && $resultLogin->num_rows > 0 ){
			return false;
		}
		$queryCad="INSERT INTO login (user, pw, salt, regdate) VALUES ('$user_safe', CAST( MD5( CONCAT(  '$pw_safe', '$salt' ) ) AS CHAR CHARACTER SET latin1 ), '$salt', NOW())";
		$resultCad = $mysqli->query($queryCad);
		if(!$resultCad){
			throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
			return false;
		}
		return true;
	}
	function CadastroEvento($nome,$descr,$local,$dataevento,$horaevento,$status,$imagem){
		if($nome == "" || strlen($nome) > 128 || $descr == "" || strlen($descr) > 4096 ||
		$local == "" || strlen($local) > 64 || $dataevento == "" || strlen($dataevento) > 20 ||
		$horaevento == "" || strlen($horaevento) > 20 || $status == "" || strlen($status) > 1 ||
		$imagem == "" || strlen($imagem) > 64){
			return false;
		}
		$nome = $this->SafeString2($nome);
		$descr = $this->SafeString2($descr);
		$local = $this->SafeString2($local);
		$dataevento = $this->SafeString2($dataevento);
		$horaevento = $this->SafeString2($horaevento);
		$status = (int)$this->SafeString($status);
		$imagem = $this->SafeString2($imagem);				
		global $mysqli;
		$queryCad="INSERT INTO eventos (nome, descr, local, imagem, dataevento, horaevento, status, regdate) VALUES ('$nome', '$descr', '$local' , '$imagem' , '$dataevento' , '$horaevento', $status, NOW())";
		$resultCad = $mysqli->query($queryCad);
		if(!$resultCad){
			throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
			return false;
		}
		return true;
	}
	function DeletarEvento($id){
		$id = (int)$this->SafeString($id);
		global $mysqli;
		$queryCad="DELETE FROM eventos WHERE id=$id";
		$resultCad = $mysqli->query($queryCad);
		if(!$resultCad){
			throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
			return false;
		}
		return true;
	}
	function ListaEventos(){
		global $mysqli;	
		$queryEventos = "SELECT id, imagem, nome, descr, local, regdate, dataevento, horaevento, status FROM eventos WHERE status=1";	
		$resultEventos = $mysqli->query($queryEventos);
		if (!$resultEventos) {
			throw new Exception("Database Error [{$this->database->errno}] {$this->database->error}");
		}
		$contador=0;
		echo '<div class="col-md-12 row">';
		while ($rowEventos = $resultEventos->fetch_assoc()) {
			$contador++;
			$descBig = $rowEventos['descr'].'</br>Local: '.$rowEventos['local'].'</br>Data: '.$rowEventos['dataevento'].'</br>Horário: '.$rowEventos['horaevento'];
			$content = '<div class="col-md-4 portfolio-item">
				<a href="javascript:void(0);" onclick="UpdateDesc('.$rowEventos['id'].',\''.$this->ArrumarDesc($rowEventos['descr']).'\',\''.$descBig.'\');">
					<img class="img-responsive" id="eimg'.$rowEventos['id'].'" src="_img/'.$rowEventos['imagem'].'" alt="">
				</a>
				<h3>
					<a href="javascript:void(0);" onclick="UpdateDesc('.$rowEventos['id'].',\''.$this->ArrumarDesc($rowEventos['descr']).'\',\''.$descBig.'\');">'.$rowEventos['nome'].'</a>
				</h3>'.($this->logged == true ? '<h5>
					<a href="?del='.$rowEventos['id'].'" style="color:#f00">Deletar</a>
				</h5>' : "").'
				<p class="desc" id="edesc'.$rowEventos['id'].'">'.$this->ArrumarDesc($rowEventos['descr']).'</p>
			</div>';
			if (($contador -1) % 3 == 0) {
				echo '</div><div class="col-md-12 row">'.$content;
			}else{
				echo $content;
			}
		}
		echo "</div>";	
	}
}
?>