<?php

	class MySQL	{

		public $host = "localhost";
		public $user = "root";
		public $password = "usbw";
		public $database = "editora";
		
		public $query;
		public $link;
		public $result;
		
		function MySQL() {
			
            
            
		}

		function connect() {
            
			$this->link=mysql_connect($this->host,$this->user,$this->password);
			
			if(!$this->link)
			{
                
				echo "Falha na conexao com o Banco de Dados!<br/>";
				echo "Erro:" .mysql_error();
				die();
                
			}
			
			elseif(!mysql_select_bd($this->database,$this->link))
			{
                
				echo "O Banco de Dados solicitado não pode ser aberto!<br/>";
				echo "Erro:" .mysql_error();
				die();
                
			}
            
		}
		
		function disconnect() {
            
			return mysql_close($this->link);
            
		}
		
		function runQuery($query) {
            
			$this->conectar();
			$this->query=$query;
			
			if($this->result=mysql_query($this->query))
			{
                
				$this->desconectar();
				return $this->result;
                
			}
			else
			{
                
				echo "Ocorreu um erro na execução do SQL";
				echo "Erro:" .mysql_error();
				echo "SQL:" .$query;
				die();
				disconnect();
                
			}
            
		}
        
	}

?>