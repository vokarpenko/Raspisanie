<?php defined('INDEX') OR die('Прямой доступ к странице запрещён!');

// MYSQL
	class MyDB 
	{
		var $dblogin = "root"; // ВАШ ЛОГИН К БАЗЕ ДАННЫХ
		var $dbpass = ""; // ВАШ ПАРОЛЬ К БАЗЕ ДАННЫХ
		var $db = "raspisanie"; // НАЗВАНИЕ БАЗЫ ДЛЯ САЙТА
		var $dbhost="localhost";

		var $link;
		var $query;
		var $err;
		var $result;
		var $data;
		var $fetch;
		var $nrows;

		function connect() {
			$this->link = mysqli_connect($this->dbhost, $this->dblogin, $this->dbpass);
			mysqli_select_db($this->link, $this->db); 
			mysqli_query($this->link ,'SET NAMES utf8');
		}

		function close() {
			mysqli_close($this->link);
		}

		function run($query) {
			$this->query = $query;
			$this->result = mysqli_query($this->link,$this->query );
			$this->err = mysqli_error($this->link);
		}
		function row() {
			$this->data = mysqli_fetch_assoc( $this->result);
		}
		function num_row() {
			$this->nrows = mysqli_num_rows( $this->result);
		}
		function decode($escapestr){
			return mysqli_real_escape_string($this->link, $escapestr);
		}
		function fetch() {
			while ($this->data = mysqli_fetch_assoc($this->result)) {

				$this->fetch = $this->data;
				return $this->fetch;
			}
		}
		function stop() {
			unset($this->data);
			unset($this->result);
			unset($this->fetch);
			unset($this->err);
			unset($this->query);
		}
	}
?>