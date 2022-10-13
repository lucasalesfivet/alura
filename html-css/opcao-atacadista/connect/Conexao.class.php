<?php

include 'adodb/adodb-exceptions.inc.php';
include 'adodb/adodb.inc.php';

class Conexao{

	public static $dbLink;
	public static $conexao;
	private static $ini_array;

	public static function getConexaoIntra(){

		$testeEmProducao = false;
		//$ipList		 = array( '192.168.1.37', '192.168.1.39' );
		$ipList			 = array();
		$bd				 = null;

		try{
			// CRIA A CONEXÃO
			$cn = &ADONewConnection( 'oci8' );

			if($testeEmProducao === true){

				$ip = '192.168.2.197:1521';
				$bd = 1;
				self::$dbLink = 'wint';

				if(!in_array($_SERVER['REMOTE_ADDR'], $ipList)){

					$ip = '192.168.1.6:1521';
					self::$dbLink = 'teste';
					$bd = 0;
				}
			}
			else{

				if($_SERVER['SERVER_ADDR'] == '192.168.2.203'){

					$ip = '192.168.2.197:1521';
					self::$dbLink = 'wint';
					$bd = 1;
				}
				else{

					$ip = '192.168.1.6:1521';
					self::$dbLink = 'teste';
					$bd = 0;
				}
			}

			$_SESSION['database'] = $bd;
			//ATIVA O DEBUG
			//$CN->DEBUG = TRUE;
			$cn->charSet = 'utf8';
			$cn->Connect( $ip, 'opcaowms', 'wmsopcao1302', 'wms' );   # conecta a um banco específico
			$cn->Execute( "ALTER SESSION SET NLS_LANGUAGE='BRAZILIAN PORTUGUESE'" );
			$cn->Execute( "ALTER SESSION SET NLS_TERRITORY='BRAZIL'" );

			self::$conexao = $cn;

			return self::$conexao;
		}
		catch(Exception $e){
			throw new Exception( "oci-intra" );
		}
	}

	public static function getConexaoPlugin(){

		$cn = &ADONewConnection( 'mysql' );	# cria a conexão
		$cn->Connect( 'dbmy0006.whservidor.com', 'mundialata', '6ys3fuak8', 'mundialata' );   # conecta a um banco específico

		return $cn;
	}

	public static function getDbLink(){
		return self::$dbLink;
	}

	// função para desconectar ao baco de dados
	public function disconnect(){

		$con = $this->getConexaoIntra();
		$con->Disconnect();
	}
}
?>